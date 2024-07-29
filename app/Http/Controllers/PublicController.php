<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $products = Product::paginate(15);
        return view('website.index', compact('products')); */
        $latestProducts = Product::orderBy('created_at', 'desc')->take(4)->get();
        return view('website.index', compact('latestProducts'));
    }

    public function products(Request $request)
{
    // Se definen las variables que reciben los distintos filtros y se instancia la función query
    $searchTerm = $request->input('search');
    $selectedCategories = $request->input('category', []);
    $selectedBrands = $request->input('brand', []);
    $query = Product::query();

    // Validaciones para verificar bajo qué filtros se hará la consulta
    if ($searchTerm) {
        // Si el término de búsqueda tiene solo una letra, buscar productos que comiencen con esa letra
        if (strlen($searchTerm) == 1) {
            $query->where('name', 'LIKE', "{$searchTerm}%");
        } else {
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }
    }

    if (!empty($selectedCategories)) {
        $query->whereIn('category_id', $selectedCategories);
    }

    if (!empty($selectedBrands)) {
        $query->whereIn('brand_id', $selectedBrands);
    }

    $productCount = $query->count();
    $products = $query->paginate(15);
    $categories = Category::all();
    $brands = Brand::all();

    return view('website.products', compact('products', 'categories', 'brands', 'productCount'));
}

    


    //product detail
    public function productDetail($id)
    {
        $product = Product::find($id);
        return view('website.productDetail', compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
