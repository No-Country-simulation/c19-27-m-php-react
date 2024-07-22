<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate();
        // $user = User::find(1);

        // // Verificar si el usuario tiene el permiso 'user-access'
        // $hasPermission = $user->can('user-access');
        // // Depurar los resultados
        // dd([
        //     'user' => $user,
        //     'hasPermission' => $hasPermission,
        //     'roles' => $user->roles,
        //     'permissions' => $user->getAllPermissions(),
        // ]);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $roles = Role::all();
        
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        // Actualización de los datos del usuario
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'house_number' => $request->input('house_number'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postal_code' => $request->input('postal_code'),
        ]);

        $user->roles()->sync($request->roles);

        // Flash message de éxito
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El usuario se actualizó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        $user->delete();

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El usuario se eliminó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);


        return redirect()->route('admin.users.index');

    }
}
