<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | CyberShield</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-white text-slate-950">

<header class="border-b border-slate-100 bg-white sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ route('shop.index') }}" class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold">CyberShield</h1>
                <p class="text-xs text-slate-500">Enterprise Security Solutions</p>
            </div>
        </a>

        <nav class="hidden md:flex items-center gap-10 text-sm font-semibold text-slate-700">
            <a href="{{ route('shop.index') }}#products" class="hover:text-blue-600">Products</a>
            <a href="{{ route('solutions') }}" class="hover:text-blue-600">Solutions</a>
            <a href="{{ route('about') }}" class="text-blue-600">About Us</a>
            <a href="{{ route('shop.index') }}#contact" class="hover:text-blue-600">Contact</a>
        </nav>
    </div>
</header>

<main>
    <section class="bg-gradient-to-r from-blue-50 via-white to-white">
        <div class="max-w-7xl mx-auto px-6 py-20">
            <p class="text-blue-600 font-bold mb-4">ABOUT CYBERSHIELD</p>

            <h1 class="text-5xl font-extrabold max-w-3xl leading-tight">
                Built for organizations that take security seriously.
            </h1>

            <p class="text-slate-600 mt-6 max-w-2xl text-lg leading-relaxed">
                CyberShield delivers enterprise-grade cybersecurity products for modern businesses,
                helping teams protect infrastructure, data, identities and mission-critical operations.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="rounded-3xl border border-slate-200 p-6">
                <p class="text-4xl font-bold text-blue-600">1000+</p>
                <p class="text-slate-500 mt-2">Organizations protected</p>
            </div>

            <div class="rounded-3xl border border-slate-200 p-6">
                <p class="text-4xl font-bold text-blue-600">24/7</p>
                <p class="text-slate-500 mt-2">Security support</p>
            </div>

            <div class="rounded-3xl border border-slate-200 p-6">
                <p class="text-4xl font-bold text-blue-600">AI</p>
                <p class="text-slate-500 mt-2">Threat monitoring</p>
            </div>

            <div class="rounded-3xl border border-slate-200 p-6">
                <p class="text-4xl font-bold text-blue-600">ISO</p>
                <p class="text-slate-500 mt-2">Security standards</p>
            </div>
        </div>
    </section>
</main>

<footer class="border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-6 py-6 text-sm text-slate-500 flex justify-between">
        <p>© 2026 CyberShield.</p>
        <a href="{{ route('shop.index') }}" class="hover:text-blue-600">Back to Store</a>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) lucide.createIcons();
    });
</script>

</body>
</html>