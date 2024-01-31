<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $allUsers = User::all();

        return view('models.user.user-index', compact('user', 'allUsers'));
    }

    public function create()
    {
        return view('models.user.user-create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        if ($user) {
            return redirect()->route('user.index')->with('status', 'Berhasil menambah data');
        }
    }

    public function show(User $user)
    {
        return view('models.user.user-show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('models.user.user-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        if ($user) {
            return redirect()->route('user.index')->with('status', 'Berhasil mengedit data');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('status', 'Berhasil menghapus data');
    }
}
