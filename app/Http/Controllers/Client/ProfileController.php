<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('client.profiles.show', compact('user', 'profile'));
    }

    // Mostrar el formulario de edición del perfil
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('client.profiles.edit', compact('user', 'profile'));
    }

    // Actualizar el perfil del usuario
    public function update( Request $request)
    {
        $user = Auth::user();
    
    // Validaciones
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed', // Validación de la contraseña
        'address' => 'nullable|string|max:255',
        'street' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'house_number' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:255',
        'dni' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'profile_photo' => 'nullable|image|max:2048',
        'card_information' => 'nullable|string|max:255',
    ]);

    // Datos del perfil
    $profileData = $request->only([
        'dni',
        'date_of_birth',
        'card_information',
    ]);

    // Manejo de la foto de perfil
    if ($request->hasFile('profile_photo')) {
        $profileData['profile_photo'] = $request->file('profile_photo')->store('profile_pictures', 'public');
    }

    // Actualizar datos del usuario
    $user->update($request->only([
        'name',
        'email',
        'address',
        'street',
        'state',
        'house_number',
        'postal_code',
        'city',
        'phone_number',
    ]));

    // Actualizar contraseña si se proporciona
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
        $user->save();
    }

    // Actualizar o crear perfil
    $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);

    // Configuración de la sesión flash
    session()->flash('swal', [
        'position' => "center",
        'icon' => "success",
        'title' => "El perfil se actualizó correctamente",
        'showConfirmButton' => false,
        'timer' => 1500
    ]);
    
        return redirect()->route('client.profiles.show');
    }
}
