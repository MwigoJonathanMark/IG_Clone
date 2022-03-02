<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;

class ProfileController extends Controller
{
    public function index($user)
    {
        // $user = User::find($user);
        $user = User::findOrFail($user);
        return view(
            'profiles.index', [
                'user' => $user,
            ]
        );
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'image' => 'image',
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',php
        ]);

        auth()->user()->profile->update($data);

        return redirect("/profile/$user->id");
    }
}
