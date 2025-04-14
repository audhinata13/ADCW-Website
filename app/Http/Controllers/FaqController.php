<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index()
    {
        $items = Faq::get();
        return view('pages.faq.index', [
            'title' => 'Faq',
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.faq.create', [
            'title' => 'Create Faq',
        ]);
    }

    public function store()
    {
        request()->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $data = request()->all();
            Faq::create($data);
            DB::commit();
            return redirect()->route('faqs.index')->with('success', 'Faq berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {

        $item = Faq::findOrFail($id);
        return view('pages.faq.edit', [
            'title' => 'Edit Faq',
            'item' => $item,
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $item = Faq::findOrFail($id);
            $data = request()->all();
            $item->update($data);
            DB::commit();
            return redirect()->route('faqs.index')->with('success', 'Faq berhasil diupdate.');
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
            Faq::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('faqs.index')->with('success', 'Faq berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
