<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate();

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|string|max:255',
        ]);

        Brand::create($request->all());

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "La marca se creó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand->update($request->all());

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "La marca se actualizó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.brands.index', $brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {       

        $products = Product::where('brand_id', $brand->id)->exists();
        if($products){
            session()->flash('swal', [
                'position' => "center",
                'icon' => "error",
                'title' => "La marca no se puede eliminar porque tiene productos asociados",
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
            return redirect()->route('admin.brands.index', $brand);
        }
        
            $brand->delete();
       
            session()->flash('swal', [
                'position' => "center",
                'icon' => "success",
                'title' => "La marca se eliminó correctamente",
                'showConfirmButton' => false,
                'timer' => 1500
            ]);


            return redirect()->route('admin.brands.index', $brand);
    }
}
