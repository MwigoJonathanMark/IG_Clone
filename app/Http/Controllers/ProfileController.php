<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount = Cache::remember('user.posts' . $user->id, now()->addSeconds(30), function () use($user)
        {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('user.followers' . $user->id, now()->addSeconds(30), function () use($user)
        {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('user.following' . $user->id, now()->addSeconds(30), function () use($user)
        {
            return $user->following->count();
        });

        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
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
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000)->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));

        return redirect("/profile/{$user->id}");
    }
}
