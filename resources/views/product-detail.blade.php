<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | CyberShield</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-white text-slate-950">

<header class="border-b border-slate-100 bg-white/90 backdrop-blur-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <a href="{{ route('shop.index') }}" class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
            </div>

            <div>
                <h1 class="text-xl font-bold leading-tight">CyberShield</h1>
                <p class="text-xs text-slate-500">Enterprise Security Solutions</p>
            </div>
        </a>

        <nav class="hidden md:flex items-center gap-10 text-sm font-semibold text-slate-700">
            <a href="{{ route('shop.index') }}" class="hover:text-blue-600 transition">Products</a>
            <a href="#" class="hover:text-blue-600 transition">Solutions</a>
            <a href="#" class="hover:text-blue-600 transition">About Us</a>
            <a href="#" class="hover:text-blue-600 transition">Contact</a>
        </nav>

        <a href="{{ route('login') }}"
           class="px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
            Admin Login
        </a>

    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-16">

    <a href="{{ route('shop.index') }}"
       class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-blue-600 mb-10">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Back to products
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        <div class="bg-slate-50 rounded-[2rem] border border-slate-200 p-8">
            <div class="rounded-3xl overflow-hidden bg-white border border-slate-100">
                <img
                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/' . match(true) {
    str_contains(strtolower($product->name), 'neurallink') => 'neurallink.png',
    str_contains(strtolower($product->name), 'firewall') => 'firewall.png',
    str_contains(strtolower($product->name), 'biosecure') => 'biosecure.png',
    str_contains(strtolower($product->name), 'budgetai') => 'budgetai.png',
    str_contains(strtolower($product->name), 'zerotrust') => 'zerotrust.png',
    str_contains(strtolower($product->name), 'cryptovault') => 'cryptovault.png',
    str_contains(strtolower($product->name), 'threathunter') => 'threathunter.png',
    str_contains(strtolower($product->name), 'blackbox') => 'blackbox.png',
    default => 'product.png',
}) }}"
                    alt="{{ $product->name }}"
                    class="w-full h-[430px] object-cover"
                >
            </div>
        </div>

        <div>
            <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-50 text-blue-600 text-sm font-semibold mb-5">
                Enterprise Security
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight leading-tight">
                {{ $product->name }}
            </h1>

            <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                {{ $product->description }}
            </p>

            <div class="mt-8 flex items-end gap-4">
                <div>
                    <p class="text-sm text-slate-500">Price</p>
                    <p class="text-4xl font-bold text-slate-950">
                        ${{ number_format($product->price, 2) }}
                    </p>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="rounded-2xl border border-slate-200 p-4">
                    <i data-lucide="shield-check" class="w-6 h-6 text-blue-600 mb-3"></i>
                    <p class="font-semibold">Enterprise Grade</p>
                    <p class="text-sm text-slate-500 mt-1">Built for business security.</p>
                </div>

                <div class="rounded-2xl border border-slate-200 p-4">
                    <i data-lucide="lock" class="w-6 h-6 text-blue-600 mb-3"></i>
                    <p class="font-semibold">Advanced Protection</p>
                    <p class="text-sm text-slate-500 mt-1">Designed for secure operations.</p>
                </div>

                <div class="rounded-2xl border border-slate-200 p-4">
                    <i data-lucide="headphones" class="w-6 h-6 text-blue-600 mb-3"></i>
                    <p class="font-semibold">Support Ready</p>
                    <p class="text-sm text-slate-500 mt-1">Professional support workflow.</p>
                </div>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <button
                    class="px-7 py-4 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    Contact Sales
                </button>

                <a href="{{ route('shop.index') }}"
                   class="px-7 py-4 rounded-xl border border-slate-200 font-semibold hover:bg-slate-50 transition text-center">
                    Continue Browsing
                </a>
            </div>
        </div>

    </div>

</main>

<footer class="border-t border-slate-100 mt-10">
    <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between gap-4 text-sm text-slate-500">
        <p>© 2026 CyberShield. All rights reserved.</p>
        <p>Enterprise Security Solutions</p>
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