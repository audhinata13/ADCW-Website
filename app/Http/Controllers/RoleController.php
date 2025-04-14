<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'can:role index', only: ['index']),
            new Middleware(middleware: 'can:role create', only: ['create', 'store']),
            new Middleware(middleware: 'can:role edit', only: ['edit', 'update']),
            new Middleware(middleware: 'can:role delete', only: ['destroy']),
        ];
    }
    public function index()
    {
        $items = Role::orderBy('name')->get();
        return view('pages.role.index', [
            'title' => 'Role',
            'items' => $items
        ]);
    }
    public function create()
    {
        DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name', 'id')->groupBy('name')->get();
        $custom_permission = array();
        foreach ($role_permission as $per) {
            $space_index = strpos($per->name, " ");
            if ($space_index !== false) {
                $key = substr($per->name, 0, $space_index);
            } else {
                $key = $per->name;
            }
            $custom_permission[$key][] = $per;
        }
        $items = Role::orderBy('name')->get();
        return view('pages.role.create', [
            'title' => 'Create Role',
            'items' => $items,
            'permissions' => $custom_permission
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'unique:roles,name'],
            'permissions' => ['required', 'array']
        ]);
        DB::beginTransaction();
        try {
            $permissions = request('permissions');
            $data = request()->only(['name']);
            $role  = Role::create($data);
            $role->givePermissionTo($permissions);
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        DB::statement("SET SQL_MODE=''");
        $role_permission = Permission::select('name', 'id')->groupBy('name')->get();

        $custom_permission = array();
        foreach ($role_permission as $per) {
            $space_index = strpos($per->name, " ");
            if ($space_index !== false) {
                $key = substr($per->name, 0, $space_index);
            } else {
                $key = $per->name;
            }
            $custom_permission[$key][] = $per;
        }
        $item = Role::findById($id);
        if ($item->name === 'superadmin')
            return redirect()->back()->with('error', 'Tidak Ada Akses!');
        return view('pages.role.edit', [
            'title' => 'Edit Role',
            'item' => $item,
            'permissions' => $custom_permission
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required', 'unique:roles,name,' . $id . ''],
            'permissions' => ['required', 'array']
        ]);
        DB::beginTransaction();
        try {
            $item = Role::findOrFail($id);
            $data = request()->only(['name']);
            $permissions = request('permissions');
            $item->update($data);
            $item->syncPermissions($permissions);
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role berhasil diupdate.');
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
            Role::findOrFail($id)->delete();
            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
