<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ], [
            'name.required' => 'El nombre del rol es obligatorio.',
            'name.unique' => 'El nombre del rol ya está en uso.',
        ]);
        $role = Role::create($request->all());

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El rol se creó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);
        $role->update($request->all());
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El rol se actualizo correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //buscame en mi modelo rol este id y lo elimine
        // $role = Role::find($role);
        

        $role->delete();

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El rol se eliminó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.roles.index');
    

    }
}