<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ], [
            'name.required' => 'El nombre del permiso es obligatorio.',
            'name.unique' => 'El nombre del permiso ya está en uso.',
        ]);
        $permission = Permission::create($request->all());

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El permiso se creó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
        return redirect()->route('admin.permissions.index', $permission);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ], [
            'name.required' => 'El nombre del permiso es obligatorio.',
            'name.unique' => 'El nombre del permiso ya está en uso.',
        ]);
        // $permission = Permission::find($permission);

        $permission->update($request->all());
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El permiso se editó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
        return redirect()->route('admin.permissions.index', $permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        
        // $permission = Permission::find($id);
        $permission->delete();
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El permiso se eliminó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
        return redirect()->route('admin.permissions.index');
    }
}
