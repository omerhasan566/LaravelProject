<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberShield | Security Products</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-white text-slate-950">

    <!-- Navbar -->
    <header class="border-b border-slate-100 bg-white/90 backdrop-blur-xl sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>

                <div>
                    <h1 class="text-xl font-bold leading-tight">CyberShield</h1>
                    <p class="text-xs text-slate-500">Enterprise Security Solutions</p>
                </div>
            </div>

            <nav class="hidden md:flex items-center gap-10 text-sm font-semibold text-slate-700">
                <a href="#products" class="hover:text-blue-600 transition">Products</a>
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

    <!-- Hero -->
    <section class="bg-gradient-to-br from-blue-50 via-white to-slate-50">
        <div class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-600 border border-blue-100 text-sm font-bold mb-6">
                    <i data-lucide="shield" class="w-4 h-4"></i>
                    NEXT GENERATION SECURITY
                </span>

                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
                    Protect What Matters.
                    <span class="text-blue-600 block">Secure Your Future.</span>
                </h1>

                <p class="mt-6 text-lg text-slate-600 max-w-xl leading-relaxed">
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

                <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i data-lucide="badge-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">Enterprise Grade</p>
                            <p class="text-xs text-slate-500">Built for organizations</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">Advanced Security</p>
                            <p class="text-xs text-slate-500">AI-powered protection</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i data-lucide="headphones" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">24/7 Support</p>
                            <p class="text-xs text-slate-500">Always here to help</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl p-10">
                    <div class="aspect-[4/3] rounded-3xl bg-gradient-to-br from-blue-100 via-white to-slate-100 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-28 h-28 mx-auto rounded-3xl bg-blue-600 text-white flex items-center justify-center shadow-lg">
                                <i data-lucide="shield-check" class="w-14 h-14"></i>
                            </div>
                            <p class="mt-6 text-xl font-bold">CyberShield Protection</p>
                            <p class="text-slate-500 text-sm mt-2">Secure infrastructure solutions</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Products -->
    <section id="products" class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
            <div>
                <h2 class="text-3xl font-bold">Our Security Products</h2>
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
                        $icon = 'shield';
                    } elseif (str_contains($name, 'ai') || str_contains($name, 'engine') || str_contains($name, 'budget')) {
                        $cat = 'AI Security';
                        $icon = 'brain-circuit';
                    } elseif (str_contains($name, 'hardware') || str_contains($name, 'neurallink') || str_contains($name, 'hsm')) {
                        $cat = 'Hardware Security';
                        $icon = 'cpu';
                    } elseif (str_contains($name, 'biosecure') || str_contains($name, 'biometric')) {
                        $cat = 'Biometric Security';
                        $icon = 'fingerprint';
                    } else {
                        $cat = 'Enterprise Security';
                        $icon = 'box';
                    }
                @endphp

                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-lg transition group">

                    <div class="h-44 rounded-2xl bg-gradient-to-br from-slate-50 to-blue-50 border border-slate-100 flex items-center justify-center mb-6">
                        <div class="w-20 h-20 rounded-3xl bg-white text-blue-600 shadow-sm border border-blue-100 flex items-center justify-center">
                            <i data-lucide="{{ $icon }}" class="w-10 h-10"></i>
                        </div>
                    </div>

                    <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-50 text-blue-600 text-xs font-semibold mb-4">
                        {{ $cat }}
                    </span>

                    <h3 class="text-lg font-bold mb-3">
                        {{ $product->name }}
                    </h3>

                    <p class="text-sm text-slate-500 leading-relaxed min-h-[66px]">
                        {{ Str::limit($product->description, 95) }}
                    </p>

                    <p class="text-xl font-bold mt-6">
                        ${{ number_format($product->price, 2) }}
                    </p>

                    <button class="mt-5 inline-flex items-center justify-center gap-2 w-full py-3 rounded-xl border border-slate-200 font-semibold hover:bg-blue-600 hover:text-white hover:border-blue-600 transition">
                        View Product
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>

                </div>
            @endforeach

        </div>
    </section>

    <!-- Footer -->
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