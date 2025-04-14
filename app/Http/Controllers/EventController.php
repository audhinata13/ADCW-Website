<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class EventController extends Controller
{
    public function index()
    {
        $items = Event::orderBy('name')->get();
        return view('pages.event.index', [
            'title' => 'Events',
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.event.create', [
            'title' => 'Create Events'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'location' => ['required'],
            'pic' => ['required'],
            'date' => ['required'],
            'end_date' => ['required'],
            'fee' => ['required'],
            'description' => ['required'],
            'terms' => ['required'],
            'status' => ['required'],
            'image' => ['required', 'image']
        ]);
        DB::beginTransaction();
        try {
            $data = request()->all();
            $data['image'] = request()->file('image')->store('events', 'public');
            $data['slug'] = \Str::slug(request('name'));
            Event::create($data);
            DB::commit();
            return redirect()->route('events.index')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $item = Event::findOrFail($id);
        return view('pages.event.edit', [
            'title' => 'Edit Event',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required',
            'location' => ['required'],
            'pic' => ['required'],
            'date' => ['required'],
            'end_date' => ['required'],
            'fee' => ['required'],
            'description' => ['required'],
            'terms' => ['required'],
            'status' => ['required'],
            'image' => ['image']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            $item = Event::findOrFail($id);
            if (request()->file('image')) {
                Storage::disk('public')->delete($item->image);
                $data['image'] = request()->file('image')->store('events', 'public');
            }
            $data['slug'] = \Str::slug(request('name'));
            $item->update($data);
            DB::commit();
            return redirect()->route('events.index')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Event::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('events.index')->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
