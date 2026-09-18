<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $user = Auth::user();
            $data = $request->all();

            if ($user->fill($data)->isDirty()) {
                $user->save();

                return Redirect::route('profile')
                    ->with('success', 'Profil erfolgreich aktualisiert!');
            } else {
                return Redirect::route('profile')
                    ->with('success', 'Keine Änderungen erkannt.');
            }
        } catch (\Exception $e) {
            return Redirect::route('profile')
                ->with('error', 'Fehler beim Aktualisieren des Profils: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Das alte Passwort ist falsch.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return Redirect::route('profile')->with('status', 'Passwort erfolgreich aktualisiert!');
    }
}
