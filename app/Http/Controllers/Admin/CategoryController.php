<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|string|max:255',
        ]);

        Category::create($request->all());
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "La categoría se creó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show' , compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "La categoría se actualizó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.categories.index', $category);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $products = Product::where('category_id', $category->id)->exists();
        if($products){
            session()->flash('swal', [
                'position' => "center",
                'icon' => "error",
                'title' => "La categoría no se puede eliminar porque tiene productos asociados",
                'showConfirmButton' => false,
                'timer' => 1500
            ]);
            return redirect()->route('admin.categories.index', $category);
        }

        $category->delete();

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "La marca se eliminó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.categories.index');
    }
}
