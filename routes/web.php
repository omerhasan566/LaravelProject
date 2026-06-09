<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')->with('success', 'Account created successfully. Please login.');
})->name('register.store');

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

Route::get('/shop', function () {
    $products = Product::all();

    return view('shop', compact('products'));
})->name('shop.index');

Route::get('/shop/product/{product}', function (Product $product) {
    return view('product-detail', compact('product'));
})->name('shop.product.show');

Route::get('/solutions', function () {
    return view('solutions');
})->name('solutions');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::post('/cart/add/{product}', function (Product $product) {
    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity']++;
    } else {
        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index');
})->name('cart.add');

Route::get('/cart', function () {
    $cart = session()->get('cart', []);

    return view('cart', compact('cart'));
})->name('cart.index');

Route::delete('/cart/remove/{id}', function ($id) {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    session()->put('cart', $cart);

    return back();
})->name('cart.remove');

Route::post('/cart/increase/{id}', function ($id) {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    }

    session()->put('cart', $cart);

    return back();
})->name('cart.increase');

Route::post('/cart/decrease/{id}', function ($id) {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return back();
})->name('cart.decrease');

Route::get('/checkout', function () {
    $cart = session()->get('cart', []);

    if (count($cart) === 0) {
        return redirect()->route('cart.index');
    }

    return view('checkout', compact('cart'));
})->name('checkout');

Route::post('/cart/increase/{id}', function ($id) {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    }

    session()->put('cart', $cart);

    return back();
})->name('cart.increase');

Route::post('/cart/decrease/{id}', function ($id) {
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return back();
})->name('cart.decrease');

Route::get('/checkout', function () {
    $cart = session()->get('cart', []);

    if (count($cart) === 0) {
        return redirect()->route('cart.index');
    }

    return view('checkout', compact('cart'));
})->name('checkout');

Route::post('/checkout/submit', function () {
    session()->forget('cart');

    return redirect()->route('checkout.success');
})->name('checkout.submit');

Route::get('/checkout/success', function () {
    return view('checkout-success');
})->name('checkout.success');