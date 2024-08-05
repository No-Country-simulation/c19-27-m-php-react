<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;

class BillController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener las facturas del usuario autenticado
        $bills = $user->bills()->get();

        // Pasar las facturas a la vista
        return view('client.bills.index', compact('bills'));
    }
}
