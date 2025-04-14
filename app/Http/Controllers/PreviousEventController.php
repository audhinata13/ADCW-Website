<?php

namespace App\Http\Controllers;

use App\Models\PreviousEvent;
use DB;
use Illuminate\Http\Request;
use Storage;

class PreviousEventController extends Controller
{
    public function index()
    {
        $items = PreviousEvent::orderBy('name')->get();
        return view('pages.previous-event.index', [
            'title' => 'Events',
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.previous-event.create', [
            'title' => 'Create Events'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => ['required'],
            'image' => ['required', 'image']
        ]);
        DB::beginTransaction();
        try {
            $data = request()->all();
            $data['image'] = request()->file('image')->store('previous-events', 'public');
            $data['slug'] = \Str::slug(request('name'));
            PreviousEvent::create($data);
            DB::commit();
            return redirect()->route('previous-events.index')->with('success', 'Prevous Event created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $item = PreviousEvent::findOrFail($id);
        return view('pages.previous-event.edit', [
            'title' => 'Edit Event',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required',
            'description' => ['required'],
            'image' => ['image']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            $item = PreviousEvent::findOrFail($id);
            if (request()->file('image')) {
                Storage::disk('public')->delete($item->image);
                $data['image'] = request()->file('image')->store('events', 'public');
            }
            $data['slug'] = \Str::slug(request('name'));
            $item->update($data);
            DB::commit();
            return redirect()->route('previous-events.index')->with('success', 'Prevous Event updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            PreviousEvent::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('previous-events.index')->with('success', 'Prevous Event deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
