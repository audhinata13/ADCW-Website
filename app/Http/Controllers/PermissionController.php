<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'can:permission index', only: ['index']),
            new Middleware(middleware: 'can:permission create', only: ['create', 'store']),
            new Middleware(middleware: 'can:permission edit', only: ['edit', 'update']),
            new Middleware(middleware: 'can:permission delete', only: ['destroy']),
        ];
    }
    public function index()
    {
        $items = Permission::orderBy('name')->get();
        return view('pages.permission.index', [
            'title' => 'Permissions',
            'items' => $items
        ]);
    }
    public function create()
    {
        $items = Permission::orderBy('name')->get();
        return view('pages.permission.create', [
            'title' => 'Create Permissions',
            'items' => $items
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:permissions,name'
        ]);
        DB::beginTransaction();
        try {
            Permission::create([
                'name' => request('name'),
                'guard_name' => 'web'
            ]);
            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $item = Permission::findById($id);
        return view('pages.permission.edit', [
            'title' => 'Edit Permission',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required|unique:permissions,name,' . $id
        ]);
        DB::beginTransaction();
        try {
            Permission::findOrFail($id)->update([
                'name' => request('name'),
                'guard_name' => 'web'
            ]);
            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Permission::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
