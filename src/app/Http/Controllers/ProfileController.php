<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'profile' => $request->user()->profile,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_address' => 'required',
        ]);
        
        $profile = new Profile;
        $profile->user_id = Auth::id();
        $profile->current_address = $request->input('current_address');
        $profile->save();

        return Redirect::route('profile.edit')->with('success', '現在地を追加しました');
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'current_address' => 'required',
        ]);
        
        $profile = Auth::user()->profile;
        $profile->current_address = $request->input('current_address');
        $profile->save();

        return Redirect::route('profile.edit')->with('success', '現在地を変更しました');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'プロフィールを更新しました');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
