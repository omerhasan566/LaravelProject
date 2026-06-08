<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solutions | CyberShield</title>
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
            <a href="{{ route('solutions') }}" class="text-blue-600">Solutions</a>
            <a href="{{ route('about') }}" class="hover:text-blue-600">About Us</a>
            <a href="{{ route('shop.index') }}#contact" class="hover:text-blue-600">Contact</a>
        </nav>
    </div>
</header>

<main>
    <section class="bg-gradient-to-r from-blue-50 via-white to-white">
        <div class="max-w-7xl mx-auto px-6 py-20">
            <p class="text-blue-600 font-bold mb-4">SECURITY SOLUTIONS</p>

            <h1 class="text-5xl font-extrabold max-w-3xl leading-tight">
                Protection layers designed for modern enterprise infrastructure.
            </h1>

            <p class="text-slate-600 mt-6 max-w-2xl text-lg leading-relaxed">
                CyberShield helps organizations secure networks, identities, hardware systems and AI-powered threat detection workflows.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="rounded-3xl border border-slate-200 p-8 bg-white shadow-sm">
                <i data-lucide="shield" class="w-10 h-10 text-blue-600 mb-6"></i>
                <h3 class="font-bold text-xl">Network Security</h3>
                <p class="text-slate-500 mt-3 leading-relaxed">
                    Firewalls, secure routers and access control solutions for business networks.
                </p>
            </div>

            <div class="rounded-3xl border border-slate-200 p-8 bg-white shadow-sm">
                <i data-lucide="brain-circuit" class="w-10 h-10 text-blue-600 mb-6"></i>
                <h3 class="font-bold text-xl">AI Threat Detection</h3>
                <p class="text-slate-500 mt-3 leading-relaxed">
                    AI-powered monitoring systems for real-time analysis and risk detection.
                </p>
            </div>

            <div class="rounded-3xl border border-slate-200 p-8 bg-white shadow-sm">
                <i data-lucide="fingerprint" class="w-10 h-10 text-blue-600 mb-6"></i>
                <h3 class="font-bold text-xl">Identity Protection</h3>
                <p class="text-slate-500 mt-3 leading-relaxed">
                    Biometric and hardware-based identity security for modern organizations.
                </p>
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