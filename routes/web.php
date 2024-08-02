<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\PurchaseController;
use App\Http\Controllers\Admin\PermissionController;


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

// Rutas de Jetstream
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::get('admin/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');
});

// Rutas públicas
Route::get('/', [PublicController::class, 'index'])->name('website.index');
Route::get('/home', [PublicController::class, 'index'])->name('website.index.2');
Route::get('/productlist', [PublicController::class, 'products'])->name('website.products');




// Rutas privadas
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {


    // Dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->middleware(['can:dashboard-access'])->name('dashboard.dashboard');
    });


    // CRUR PRODUCTOS
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->middleware(['can:product-access'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // CRUD  CATEGORIAS
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->middleware(['can:category-access'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    // CRUD ROLES
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->middleware(['can:role-access'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/{role}', [RoleController::class, 'show'])->name('roles.show');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    // CRUD PERMISOS
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', [PermissionController::class, 'index'])->middleware(['can:permission-access'])->name('permissions.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
        Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::put('/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    });

    // CRUD USUARIOS
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware(['can:user-access']);
        Route::get('/{user}', [UserController::class, 'show'])->middleware(['can:user-show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->middleware(['can:user-edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->middleware(['can:user-delete'])->name('users.destroy');
    });

    // CRUD MARCAS
    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [BrandController::class, 'index'])->middleware(['can:brand-access'])->name('brands.index');
        Route::get('/create', [BrandController::class, 'create'])->middleware(['can:brand-create'])->name('brands.create');
        Route::post('/', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/{brand}', [BrandController::class, 'show'])->name('brands.show');
        Route::get('/{brand}/edit', [BrandController::class, 'edit'])->middleware(['can:brand-edit'])->name('brands.edit');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->middleware(['can:brand-delete'])->name('brands.destroy');
    });
});

Route::group([ 'middleware' => ['auth']], function () {

// profile
Route::get('/profile', [ProfileController::class, 'show'])->name('client.profiles.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('client.profiles.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('client.profiles.update');

//Carrito de compras
Route::get('/cart', [CartController::class, 'index'])->name('cart.show.cart');
Route::get('/confirmcart', [CartController::class, 'confirmarCompra'])->name('cart.confirm.cart');
Route::post('/cart/updateOrRemove/{productId}', [CartController::class, 'updateQuantity'])->name('cart.uOr');
Route::get('/cart/finished', [CartController::class, 'finished'])->name('cart.finished');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/user/productlist', [CartController::class, 'list'])->name('user.list');
Route::get('/bill/{bill}', [CartController::class, 'showBill'])->name('bill.show');


Route::get('/my-purchases', [PurchaseController::class, 'index'])->name('client.purchase.index');
});








