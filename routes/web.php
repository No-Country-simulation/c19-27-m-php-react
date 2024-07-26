<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CartController;

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
])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.dashboard');
    //Dashboard
    //Crud de usuarios
    Route::resource('/users', UserController::class)->names('admin.users');
    //Crud Marcas
    Route::resource('/brands', BrandController::class)->names('admin.brands');

    //Crud Productos
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    //Crud categorías
    Route::resource('/categories', CategoryController::class)->names('admin.categories');

    //Carrito de compras
    Route::get('/cart', [CartController::class, 'index'])->name('cart.show.cart');
    Route::post('/cart/updateOrRemove/{productId}', [CartController::class, 'updateQuantity'])->name('cart.uOr');
    Route::get('/cart/change', [CartController::class, 'finished'])->name('cart.finished');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/user/productlist', [CartController::class, 'list'])->name('user.list');






});

//Rutas publicas
Route::get('/', [PublicController::class, 'index'])->name('website.index');
Route::get('/productlist', [PublicController::class, 'products'])->name('website.products');









