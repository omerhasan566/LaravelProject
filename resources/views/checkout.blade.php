<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Quote | CyberShield</title>

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

        <a href="{{ route('cart.index') }}"
           class="px-5 py-3 rounded-xl border border-slate-200 bg-white font-semibold hover:bg-slate-50 transition">
            Back to Cart
        </a>

    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-14">

    <div class="mb-10">
        <p class="text-blue-600 font-bold mb-2">REQUEST QUOTE</p>
        <h1 class="text-4xl font-extrabold">Complete Your Quote Request</h1>
        <p class="text-slate-500 mt-3">
            Fill in your contact details and our enterprise sales team will contact you shortly.
        </p>
    </div>

    @php
        $total = 0;
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <section class="lg:col-span-2 bg-white border border-slate-200 rounded-3xl p-6 shadow-sm">

            <h2 class="text-xl font-bold mb-6">Contact Information</h2>

            <form method="POST" action="{{ route('checkout.submit') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                    <input
                        type="text"
                        name="name"
                        required
                        placeholder="John Smith"
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Company Name</label>
                    <input
                        type="text"
                        name="company"
                        required
                        placeholder="ABC Technologies"
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="john@company.com"
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                        <input
                            type="text"
                            name="phone"
                            required
                            placeholder="+90 555 000 00 00"
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Additional Notes</label>
                    <textarea
                        name="notes"
                        rows="5"
                        placeholder="Tell us about your security needs..."
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    ></textarea>
                </div>

                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
                >
                    Submit Quote Request
                </button>
            </form>

        </section>

        <aside class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm h-fit">

            <h2 class="text-xl font-bold mb-6">Quote Summary</h2>

            <div class="space-y-4">

                @foreach($cart as $item)
                    @php
                        $lineTotal = $item['price'] * $item['quantity'];
                        $total += $lineTotal;
                    @endphp

                    <div class="flex justify-between gap-4 text-sm border-b border-slate-100 pb-4">
                        <div>
                            <p class="font-semibold">{{ $item['name'] }}</p>
                            <p class="text-slate-500 mt-1">Qty: {{ $item['quantity'] }}</p>
                        </div>

                        <p class="font-bold text-blue-600">
                            ${{ number_format($lineTotal, 2) }}
                        </p>
                    </div>
                @endforeach

                <div class="pt-2 flex justify-between text-lg">
                    <span class="font-bold">Estimated Total</span>
                    <span class="font-bold text-blue-600">${{ number_format($total, 2) }}</span>
                </div>

                <p class="text-xs text-slate-500 leading-relaxed pt-2">
                    Final pricing may vary based on licensing, support level, deployment size and enterprise requirements.
                </p>

            </div>

        </aside>

    </div>

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