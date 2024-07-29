<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $sesion= Auth::user();
       $aux = $sesion->id;
       $user = User::find($aux);


         $cart = $user->carts()->where('state', 1)->first();

         $total=0;

         if(!$cart){
            $cart=$this->create($user);
            $products =collect();
         }else{
            $products = $cart->products()->orderBy('name')->get();

            foreach($cart->products as $product){
                $total+=$product->pivot->quantity*$product->price;
            }
         }

             // Obtén productos recomendados
          $recommendedProducts = Product::inRandomOrder()->take(4)->get();


        return view('cart.show',compact('products','total','cart', 'recommendedProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user)
    {
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->state = 1;
        $cart->save();
    }

    public function updateQuantity(Request $request, $productId)
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $sesion= Auth::user();
        $aux = $sesion->id;
       $user = User::find($aux);

        $cart = $user->carts()->where('id', $request->input('cart_id'))->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'No se encontró el carrito activo');
        }

        if($request->action === 'update'){
            $cart->products()->updateExistingPivot($request->input('product_id'), ['quantity' => $request->input('quantity')]);
            return redirect()->back()->with('success', 'Cantidad actualizada correctamente');
        }elseif($request->action === 'remove'){
            $cart->products()->detach($request->input('product_id'));
            return redirect()->back()->with('success', 'Producto eliminado del carrito');
        }

        return redirect()->back()->with('error', 'Acción no válida');


    }

    public function eliminateProduct(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $sesion= Auth::user();
        $aux = $sesion->id;
       $user = User::find($aux);

        $cart = $user->carts()->where('id', $request->input('cart_id'))->first();

        if ($cart) {
            $cart->products()->updateExistingPivot($request->input('product_id'), ['quantity' => $request->input('quantity')]);
            return redirect()->back()->with('success', 'Cantidad actualizada correctamente');
        } else {
            return redirect()->back()->with('error', 'Carrito no encontrado');
        }
    }


    public function finished()
    {
        $sesion = Auth::user();
        $user = User::find($sesion->id);

        $cart = $user->carts()->where('state', 1)->first();

       // $cart = Cart::find($aux->id);

        if($cart){
            $cart->state = 0;
            $cart->save();
        }

    }

    public function list(){

        $products = Product::paginate(15);
        return view('cart.change', compact('products'));

    }

    public function add($productId){
        $sesion= Auth::user();
        $aux = $sesion->id;
        $user = User::find($aux);
    
        $cart = $user->carts()->where('state', 1)->first();
    
        if(!$cart){
            $cart=$this->create($user);
        }
    
        $cartProduct = $cart->products()->where('product_id',$productId)->first();
    
        if($cartProduct){
            $cart->products()->updateExistingPivot($productId, ['quantity' => $cartProduct->pivot->quantity + 1 ]);
        }else{
            $cart->products()->attach($productId,['quantity'=>1]);
        }
    
        session()->flash('swal', [
            'position' => "center",
            'icon' => "success",
            'title' => "Producto añadido al carrito correctamente",
            'showConfirmButton' => false,
            'timer' => 1500
        ]);
    
        return redirect()->back()->with('success','producto agregado');
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
         $user=User::find(1);
        $cart = $user->carts()->where('state', 1)->with('products')->first();

         return response()->json($cart,200);
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
