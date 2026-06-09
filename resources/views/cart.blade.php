<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | CyberShield</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50 text-slate-950">

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

        <a href="{{ route('shop.index') }}"
           class="px-5 py-3 rounded-xl border border-slate-200 bg-white font-semibold hover:bg-slate-50 transition">
            Continue Shopping
        </a>

    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-14">

    <div class="mb-10">
        <p class="text-blue-600 font-bold mb-2">SHOPPING CART</p>
        <h1 class="text-4xl font-extrabold">Your Selected Products</h1>
        <p class="text-slate-500 mt-3">
            Review your selected cybersecurity products before contacting sales.
        </p>
    </div>

    @php
        $total = 0;
    @endphp

    @if(count($cart) > 0)

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-4">

                @foreach($cart as $item)
                    @php
                        $lineTotal = $item['price'] * $item['quantity'];
                        $total += $lineTotal;
                    @endphp

                    <div class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm flex flex-col md:flex-row md:items-center gap-5">

                        <div class="w-full md:w-32 h-28 rounded-2xl overflow-hidden bg-slate-50 shrink-0">
                            <img
                                src="{{ asset('images/' . match(true) {
    str_contains(strtolower($item['name']), 'neurallink') => 'neurallink.png',
    str_contains(strtolower($item['name']), 'firewall') => 'firewall.png',
    str_contains(strtolower($item['name']), 'biosecure') => 'biosecure.png',
    str_contains(strtolower($item['name']), 'budgetai') => 'budgetai.png',
    str_contains(strtolower($item['name']), 'zerotrust') => 'zerotrust.png',
    str_contains(strtolower($item['name']), 'cryptovault') => 'cryptovault.png',
    str_contains(strtolower($item['name']), 'threathunter') => 'threathunter.png',
    str_contains(strtolower($item['name']), 'blackbox') => 'blackbox.png',
    default => 'product.png',
}) }}"
                                alt="{{ $item['name'] }}"
                                class="w-full h-full object-cover"
                            >
                        </div>

                        <div class="flex-1">
                            <h2 class="font-bold text-lg">
                                {{ $item['name'] }}
                            </h2>

                            <div class="flex items-center gap-3 mt-3">

    <form method="POST" action="{{ route('cart.decrease', $item['id']) }}">
        @csrf
        <button
            type="submit"
            class="w-9 h-9 rounded-xl border border-slate-200 hover:bg-slate-100 transition"
        >
            -
        </button>
    </form>

    <span class="font-bold text-lg">
        {{ $item['quantity'] }}
    </span>

    <form method="POST" action="{{ route('cart.increase', $item['id']) }}">
        @csrf
        <button
            type="submit"
            class="w-9 h-9 rounded-xl border border-slate-200 hover:bg-slate-100 transition"
        >
            +
        </button>
    </form>

</div>

                            <p class="text-sm text-slate-500 mt-1">
    Unit Price: ${{ number_format($item['price'], 2) }}
</p>
                        </div>

                        <div class="flex md:flex-col items-center md:items-end justify-between gap-4">
                            <p class="text-xl font-bold text-blue-600">
                                ${{ number_format($lineTotal, 2) }}
                            </p>

                            <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition"
                                >
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    Remove
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>

            <aside class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm h-fit">
                <h2 class="text-xl font-bold mb-6">Order Summary</h2>

                <div class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Subtotal</span>
                        <span class="font-semibold">${{ number_format($total, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-slate-500">Estimated Support</span>
                        <span class="font-semibold">Included</span>
                    </div>

                    <div class="border-t border-slate-100 pt-4 flex justify-between text-lg">
                        <span class="font-bold">Total</span>
                        <span class="font-bold text-blue-600">${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <a
    href="{{ route('checkout') }}"
    class="mt-6 w-full inline-flex justify-center py-4 rounded-2xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
>
    Request Quote
</a>

                <a href="{{ route('shop.index') }}"
                   class="mt-3 w-full inline-flex justify-center py-4 rounded-2xl border border-slate-200 font-semibold hover:bg-slate-50 transition">
                    Continue Shopping
                </a>
            </aside>

        </div>

    @else

        <div class="bg-white border border-slate-200 rounded-3xl p-12 text-center shadow-sm">
            <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5">
                <i data-lucide="shopping-cart" class="w-8 h-8"></i>
            </div>

            <h2 class="text-2xl font-bold">Your cart is empty</h2>

            <p class="text-slate-500 mt-3">
                Browse our products and add cybersecurity solutions to your cart.
            </p>

            <a href="{{ route('shop.index') }}"
               class="mt-6 inline-flex px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                Browse Products
            </a>
        </div>

    @endif

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) {
            lucide.createIcons();
        }
    });
</script>

</body>
</html>