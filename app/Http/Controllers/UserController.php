<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'can:user index', only: ['index']),
            new Middleware(middleware: 'can:user create', only: ['create', 'store']),
            new Middleware(middleware: 'can:user edit', only: ['edit', 'update']),
            new Middleware(middleware: 'can:user delete', only: ['destroy']),
        ];
    }
    public function index()
    {
        $items  = User::orderBy('name', 'ASC')->get();
        return view('pages.user.index', [
            'title' => 'User Data',
            'items' => $items
        ]);
    }

    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->pluck('name');
        return view('pages.user.create', [
            'title' => 'User Create',
            'roles' => $roles
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'roles' => ['required', 'array']
        ]);

        try {
            $data = request()->only('name', 'email');
            $data['password'] = bcrypt(request('password'));
            $roles = request('roles');
            $user = User::create($data);
            $user->assignRole($roles);
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->pluck('name', 'name');
        $userRoles = $item->roles->pluck('name', 'name')->toArray();

        return view('pages.user.edit', [
            'title' => 'User Edit',
            'item' => $item,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $id],
            'password' => ['nullable', 'min:6'],
            'password_confirmation' => ['nullable', 'same:password'],
            'roles' => ['required', 'array']
        ]);

        try {
            $item = User::findOrFail($id);
            $roles = request('roles');
            $data = request()->only('name', 'email');
            if (request()->password) {
                $data['password'] = bcrypt(request()->password);
            }
            $item->update($data);
            $item->syncRoles($roles);
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);
        try {
            $item->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('error', $th->getMessage());
        }
    }
}
