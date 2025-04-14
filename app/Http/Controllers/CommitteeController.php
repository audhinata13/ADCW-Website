<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\PreviousEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class CommitteeController extends Controller
{
    public function index()
    {
        $previous_events = PreviousEvent::latest()->get();
        $previous_event_id = request('previous_event_id', null);
        if ($previous_event_id) {
            $items = Committee::where('previous_event_id', $previous_event_id)->get();
        } else {
            $items = Committee::whereNull('previous_event_id')->get();
        }
        return view('pages.committee.index', [
            'title' => 'Committee',
            'items' => $items,
            'previous_events' => $previous_events
        ]);
    }
    public function create()
    {
        return view('pages.committee.create', [
            'title' => 'Create Committee',
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'role' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);
        DB::beginTransaction();
        try {
            $data = request()->all();
            $data['image'] = request()->file('image')->store('committees', 'public');
            Committee::create($data);
            DB::commit();
            return redirect()->route('committees.index', [
                'previous_event_id' => request('previous_event_id')
            ])->with('success', 'Committee berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $item = Committee::findOrFail($id);
        return view('pages.committee.edit', [
            'title' => 'Edit Committee',
            'item' => $item,
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required'],
            'role' => ['required'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);
        DB::beginTransaction();
        try {
            $data = request()->all();
            $item = Committee::findOrFail($id);
            if (request()->file('image')) {
                Storage::disk('public')->store($item->image);
                $data['image'] = request()->file('image')->store('committees', 'public');
            }
            $item->update($data);
            DB::commit();
            return redirect()->route('committees.index', [
                'previous_event_id' => $item->previous_event_id
            ])->with('success', 'Committee berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $item = Committee::findOrFail($id);
            $prev_id = $item->previous_event_id;
            DB::commit();
            return redirect()->route('committees.index', [
                'previous_event_id' => $prev_id
            ])->with('success', 'Committee berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
