<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
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


// Rutas privadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.dashboard');
    // Dashboard
    // Crud de usuarios
    Route::resource('/users', UserController::class)->names('admin.users');
    // Crud Marcas
    Route::resource('/brands', BrandController::class)->names('admin.brands');
    // Crud Productos
    Route::resource('/products', ProductController::class)->names('admin.products');
    // Crud categorías
    Route::resource('/categories', CategoryController::class)->names('admin.categories');
});

// Rutas públicas
Route::get('/', [PublicController::class, 'index'])->name('website.index');
Route::get('/productlist', [PublicController::class, 'products'])->name('website.products');









