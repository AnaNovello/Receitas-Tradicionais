<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use SebastianBergmann\CodeCoverage\Report\Html\painelDeControle;
use App\Models\User;
use App\Models\Receita;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show(){
        $user = Auth::user();

        $receitasSalvas = Receita::whereHas('salvas', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
    
        return view('painelDeControle', compact('user', 'receitasSalvas'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'foto' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],
        ]);

        // Atualizar nome e email
        $user->name = $request->name;
        $user->email = $request->email;

        // Processar upload de imagem
        if ($request->hasFile('foto')) {
            // Apagar a imagem antiga, se existir
            if ($user->foto) {
                Storage::delete('public/' . $user->foto);
            }

            // Salvar nova imagem
            $path = $request->file('foto')->store('profile_pictures', 'public');
            $user->foto = $path;
        }
        $user = Auth::user();
        /** @var User $user */

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
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
}
