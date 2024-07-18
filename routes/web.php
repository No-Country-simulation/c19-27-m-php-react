<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('welcome');
// });


//Rutas privadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard.dashboard');
});

//Rutas publicas
Route::get('/', [PublicController::class, 'index'])->name('website.index');
Route::get('/products', [PublicController::class, 'products'])->name('website.products');






//Productos
Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');



    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard.dashboard');
});

//Rutas publicas
Route::get('/', [PublicController::class, 'index'])->name('website.index');
Route::get('/productslist', [PublicController::class, 'products'])->name('website.products');


//Productos
Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');



