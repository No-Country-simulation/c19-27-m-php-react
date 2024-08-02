<?php

namespace App\Http\Controllers\Client;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
    
        $user = Auth::user();

        // Obtiene todas las facturas asociadas al usuario
        $bills = Bill::with('products')->where('user_id', $user->id)->get();

        // Convertir fechas manualmente
         $bills->each(function ($bill) {
        $bill->date = \Carbon\Carbon::parse($bill->date);
        });
        // Retorna la vista con las compras del usuario
        return view('client.purchase.index', compact('bills'));
    }
}
