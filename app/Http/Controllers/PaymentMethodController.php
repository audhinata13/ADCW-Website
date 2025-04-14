<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $items = PaymentMethod::orderBy('name')->get();
        return view('pages.payment-method.index', [
            'title' => 'Payment Method',
            'items' => $items
        ]);
    }
    public function create()
    {
        $items = PaymentMethod::orderBy('name')->get();
        return view('pages.payment-method.create', [
            'title' => 'Create Payment Method',
            'items' => $items,
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'type' => ['required'],
            'number' => ['required'],
            'note' => ['required'],
            'image' => ['required', 'image']
        ]);
        DB::beginTransaction();
        try {
            $data = request()->all();
            $data['image'] = request()->file('image')->store('events', 'public');
            PaymentMethod::create($data);
            DB::commit();
            return redirect()->route('payment-methods.index')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $item = PaymentMethod::findOrFail($id);
        return view('pages.payment-method.edit', [
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
            'fee' => ['required'],
            'description' => ['required'],
            'terms' => ['required'],
            'status' => ['required'],
            'image' => ['image']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();
            $item = PaymentMethod::findOrFail($id);
            if (request()->file('image')) {
                Storage::disk('public')->delete($item->image);
                $data['image'] = request()->file('image')->store('events', 'public');
            }
            $item->update($data);
            DB::commit();
            return redirect()->route('payment-methods.index')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            PaymentMethod::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('payment-methods.index')->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
