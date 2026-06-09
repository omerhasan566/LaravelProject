<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberShield | Security Products</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body
x-data="{
    searchQuery: '',
    selectedCategory: 'All'
}"
class="bg-white text-slate-950">

<header class="border-b border-slate-100 bg-white/95 backdrop-blur-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center shadow-sm">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
            </div>

            <div>
                <h1 class="text-xl font-bold leading-tight">CyberShield</h1>
                <p class="text-xs text-slate-500">Enterprise Security Solutions</p>
            </div>
        </div>

        <nav class="hidden md:flex items-center gap-10 text-sm font-semibold text-slate-700">
    <a href="#products" class="hover:text-blue-600 transition">Products</a>

<a href="{{ route('solutions') }}"
   class="hover:text-blue-600 transition">
    Solutions
</a>

<a href="{{ route('about') }}"
   class="hover:text-blue-600 transition">
    About Us
</a>
<a href="{{ route('cart.index') }}"
   class="relative hover:text-blue-600 transition inline-flex items-center gap-2">
    <i data-lucide="shopping-cart" class="w-4 h-4"></i>
    Cart

    @php
        $cartCount = collect(session('cart', []))->sum('quantity');
    @endphp

    @if($cartCount > 0)
        <span class="absolute -top-3 -right-4 min-w-5 h-5 px-1 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center">
            {{ $cartCount }}
        </span>
    @endif
</a>

<a href="#contact"
   class="hover:text-blue-600 transition">
    Contact
</a>
</nav>

        <a href="{{ route('login') }}"
           class="px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow-sm">
            Admin Login
        </a>

    </div>
</header>

<!-- Hero -->
<section class="relative overflow-hidden bg-white">

    <div class="absolute inset-y-0 right-0 w-[62%] hidden lg:block">
        <img
            src="{{ asset('images/hero.png') }}"
            alt="CyberShield security products"
            class="w-full h-full object-cover object-center brightness-90"
        >

        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/35 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 lg:py-28">
        <div class="max-w-xl">

            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-600 border border-blue-100 text-sm font-bold mb-6">
                <i data-lucide="shield" class="w-4 h-4"></i>
                NEXT GENERATION SECURITY
            </span>

            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight">
                Protect What Matters.
                <span class="block text-blue-600">
                    Secure Your Future.
                </span>
            </h1>

            <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                Enterprise-grade cybersecurity products designed to protect your infrastructure,
                data and digital assets.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="#products"
                   class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    Browse Products
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>

                <a href="#products"
                   class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl border border-slate-200 bg-white font-semibold hover:bg-slate-50 transition">
                    View Solutions
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Trust Bar -->
<section class="border-y border-slate-100 bg-white">
    <div class="max-w-7xl mx-auto px-6 py-7 grid grid-cols-2 md:grid-cols-5 gap-6 text-center">

        <div>
            <i data-lucide="shield-check" class="w-7 h-7 text-blue-600 mx-auto mb-2"></i>
            <p class="font-bold text-sm">Enterprise Grade</p>
            <p class="text-slate-500 text-xs mt-1">Built for organizations</p>
        </div>

        <div>
            <i data-lucide="lock" class="w-7 h-7 text-blue-600 mx-auto mb-2"></i>
            <p class="font-bold text-sm">Advanced Security</p>
            <p class="text-slate-500 text-xs mt-1">AI-powered protection</p>
        </div>

        <div>
            <i data-lucide="headphones" class="w-7 h-7 text-blue-600 mx-auto mb-2"></i>
            <p class="font-bold text-sm">24/7 Support</p>
            <p class="text-slate-500 text-xs mt-1">Always here to help</p>
        </div>

        <div>
            <i data-lucide="badge-check" class="w-7 h-7 text-blue-600 mx-auto mb-2"></i>
            <p class="font-bold text-sm">ISO 27001</p>
            <p class="text-slate-500 text-xs mt-1">Global standards</p>
        </div>

        <div>
            <i data-lucide="globe-2" class="w-7 h-7 text-blue-600 mx-auto mb-2"></i>
            <p class="font-bold text-sm">Trusted Worldwide</p>
            <p class="text-slate-500 text-xs mt-1">1000+ organizations</p>
        </div>

    </div>
</section>

<!-- Products -->
<section id="products" class="max-w-7xl mx-auto px-6 py-16">

    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
        <div>
            <h2 class="text-3xl font-bold">Our Security Products</h2>
            <div class="mt-6">
    <input
        type="text"
        x-model="searchQuery"
        placeholder="Search products..."
        class="w-full md:w-96 px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
    <div class="mt-4 flex flex-wrap gap-3">

    <button
    @click="selectedCategory='All'"
    :class="selectedCategory === 'All'
        ? 'bg-blue-600 text-white border-blue-600'
        : 'bg-white text-slate-700 border-slate-200'"
    class="px-4 py-2 rounded-xl border text-sm transition">
    All
</button>

    <button
    @click="selectedCategory='Network Security'"
    :class="selectedCategory === 'Network Security'
        ? 'bg-blue-600 text-white border-blue-600'
        : 'bg-white text-slate-700 border-slate-200'"
    class="px-4 py-2 rounded-xl border text-sm transition">
    Network
</button>

    <button
    @click="selectedCategory='AI Security'"
    :class="selectedCategory === 'AI Security'
        ? 'bg-blue-600 text-white border-blue-600'
        : 'bg-white text-slate-700 border-slate-200'"
    class="px-4 py-2 rounded-xl border text-sm transition">
    AI
</button>

    <button
    @click="selectedCategory='Hardware Security'"
    :class="selectedCategory === 'Hardware Security'
        ? 'bg-blue-600 text-white border-blue-600'
        : 'bg-white text-slate-700 border-slate-200'"
    class="px-4 py-2 rounded-xl border text-sm transition">
    Hardware
</button>

    <button
    @click="selectedCategory='Biometric Security'"
    :class="selectedCategory === 'Biometric Security'
        ? 'bg-blue-600 text-white border-blue-600'
        : 'bg-white text-slate-700 border-slate-200'"
    class="px-4 py-2 rounded-xl border text-sm transition">
    Biometric
</button>

</div>
</div>
            <p class="text-slate-500 mt-2">
                Advanced solutions for every layer of your security infrastructure.
            </p>
        </div>

        <a href="#products" class="text-blue-600 font-semibold text-sm inline-flex items-center gap-2">
            View all products
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        @foreach($products as $product)
    @php
        $name = strtolower($product->name);

        if (str_contains($name, 'firewall') || str_contains($name, 'network') || str_contains($name, 'router') || str_contains($name, 'blackbox') || str_contains($name, 'penetration')) {
            $cat = 'Network Security';
        } elseif (str_contains($name, 'ai') || str_contains($name, 'engine') || str_contains($name, 'budget')) {
            $cat = 'AI Security';
        } elseif (str_contains($name, 'hardware') || str_contains($name, 'neurallink') || str_contains($name, 'hsm')) {
            $cat = 'Hardware Security';
        } elseif (str_contains($name, 'biosecure') || str_contains($name, 'biometric')) {
            $cat = 'Biometric Security';
        } else {
            $cat = 'Enterprise Security';
        }

        $image = match (true) {
            str_contains($name, 'neurallink') => 'neurallink.png',
            str_contains($name, 'firewall') => 'firewall.png',
            str_contains($name, 'biosecure') => 'biosecure.png',
            str_contains($name, 'budgetai') => 'budgetai.png',
            str_contains($name, 'zerotrust') => 'zerotrust.png',
            str_contains($name, 'cryptovault') => 'cryptovault.png',
            str_contains($name, 'threathunter') => 'threathunter.png',
            str_contains($name, 'blackbox') => 'blackbox.png',
            default => 'product.png',
        };
    @endphp

    <div
        x-show="
            (
                searchQuery === '' ||
                '{{ strtolower($product->name) }}'.includes(searchQuery.toLowerCase())
            )
            &&
            (
                selectedCategory === 'All' ||
                selectedCategory === '{{ $cat }}'
            )
        "
        class="bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
    >
        <div class="h-52 rounded-2xl overflow-hidden bg-slate-50 mb-6">
    <img
        src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/' . $image) }}"
        alt="{{ $product->name }}"
        class="w-full h-full object-cover"
    >
</div>

        <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-50 text-blue-600 text-xs font-semibold mb-4">
            {{ $cat }}
        </span>

        <h3 class="text-lg font-bold mb-3 leading-snug">
            {{ $product->name }}
        </h3>

        <p class="text-sm text-slate-500 leading-relaxed min-h-[66px]">
            {{ Str::limit($product->description, 95) }}
        </p>

        <p class="text-xl font-bold mt-6">
            ${{ number_format($product->price, 2) }}
        </p>

        <form method="POST" action="{{ route('cart.add', $product) }}">
            @csrf

            <button
                type="submit"
                class="mt-5 inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
            >
                <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                Add to Cart
            </button>
        </form>

        <a
            href="{{ route('shop.product.show', $product) }}"
            class="mt-3 inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl border border-slate-200 font-semibold hover:bg-blue-600 hover:text-white hover:border-blue-600 transition"
        >
            View Product
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>
@endforeach

    </div>
</section>

<footer id="contact" class="border-t border-slate-100 bg-white mt-12">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">

        <div class="md:col-span-2">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-2xl bg-blue-600 text-white flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>

                <div>
                    <h3 class="font-bold text-slate-950">CyberShield</h3>
                    <p class="text-xs text-slate-500">Enterprise Security Solutions</p>
                </div>
            </div>

            <p class="text-sm text-slate-500 max-w-md leading-relaxed">
                Advanced cybersecurity products for modern organizations, built to protect infrastructure,
                data and digital operations.
            </p>
        </div>

        <div>
            <h4 class="font-bold text-slate-950 mb-4">Company</h4>

            <div class="space-y-3 text-sm text-slate-500">
                <a href="#products" class="hover:text-blue-600 transition">Products</a>
<a href="{{ route('solutions') }}" class="hover:text-blue-600 transition">Solutions</a>
<a href="{{ route('about') }}" class="hover:text-blue-600 transition">About Us</a>
<a href="#contact" class="hover:text-blue-600 transition">Contact</a>
            </div>
        </div>

        <div>
            <h4 class="font-bold text-slate-950 mb-4">Contact</h4>

            <div class="space-y-3 text-sm text-slate-500">
                <p>omerhsn566@cybershield.com</p>
                <p>+90 212 513 31 95</p>
                <p>Istanbul, Türkiye</p>
            </div>
        </div>

    </div>

    <div class="border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col md:flex-row justify-between gap-3 text-xs text-slate-400">
            <p>© 2026 CyberShield. All rights reserved.</p>
            <p>Built for enterprise security operations.</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) {
            lucide.createIcons();
        }
    });
</script>

</body>
</html>