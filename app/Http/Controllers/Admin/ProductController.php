<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->paginate();

        return view('admin.product.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        $brands = Brand::all();
        $categories = Category::all();
        $product = new Product();
        return view('admin.product.create', compact('brands', 'categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = Product::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public/product');
            
            Log::info('Image stored at: ' . $path); // Log para verificar la ruta de almacenamiento
    
            $product->image = $path;
            $product->save();
    
            Log::info('Product image URL: ' . Storage::url($path)); // Log para verificar la URL de la imagen
        }
    
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El producto se guardó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500,
        ]);
    
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();

        
        return view('admin.product.show', compact('product', 'brands', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //

        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->except(['image']);
    // Verificar si hay una nueva imagen y manejar el almacenamiento
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($product->image) {
            Storage::delete($product->image);
        }

        // Subir la nueva imagen y guardar la ruta
        $path = $request->file('image')->store('public/product');
        $data['image'] = $path;
    }
        $product->update($data);

        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El producto se actualizó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.products.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //

        $product->delete();
        
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "El producto se eliminó correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);

        return redirect()->route('admin.products.index');
    }
}
