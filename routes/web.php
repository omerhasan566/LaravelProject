<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// 1. Giriş Sayfası Rotası
Route::get('/login', function () {
    return view('login');
})->name('login');

// 2. Giriş İşlemi
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect('/');
    }
    return back()->withErrors(['email' => 'Hatalı giriş bilgileri.']);
});

// 3. Ana Sayfa (Sadece giriş yapanlar görebilir)
Route::get('/', function () {
    $products = Product::all();
    return view('index', compact('products'));
})->middleware('auth');

Route::post('/products', function (Request $request) {
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => null,
    ]);

    return redirect('/');
})->middleware('auth')->name('products.store');

Route::put('/products/{product}', function (Request $request, Product $product) {
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => null,
    ]);

    return redirect('/');
})->middleware('auth')->name('products.update');

Route::delete('/products/{product}', function (Product $product) {
    $product->delete();

    return redirect('/');
})->middleware('auth')->name('products.destroy');

// 4. Çıkış İşlemi
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');