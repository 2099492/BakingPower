<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function index() {
        return view('admin.users.index', ['users' => User::all()]);
    }

    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user) {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user->update([
            'name' => request('name'),
            'description' => request('description'),
            'role' => request('role')
        ]);

        return redirect('/admin/users');
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role' => request('role')
        ]);
        return redirect('/admin/users');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect('/admin/users');
    }
}
