<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Inventory | Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body
x-data="{ sidebarOpen: true }"
class="bg-slate-50 min-h-screen text-slate-900">

    <div class="flex min-h-screen">

    <aside class="w-72 bg-white border-r border-slate-200 flex flex-col">

        <div class="p-6 border-b border-slate-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 bg-slate-900 rounded-xl text-white flex items-center justify-center font-bold">
                    E
                </div>

                <div>
                    <h2 class="font-bold">Enterprise OS</h2>
                    <p class="text-xs text-slate-500">
                        Inventory Platform
                    </p>
                </div>

            </div>

        </div>

        <div class="p-4 space-y-2">

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-900 text-white font-medium">
                📊 Dashboard
            </a>

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 transition">
                📦 Products
            </a>

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 transition">
                📈 Analytics
            </a>

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 transition">
                🤖 AI Assistant
            </a>

            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-100 transition">
                ⚙ Settings
            </a>

        </div>

        <div class="mt-auto p-4">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full py-3 rounded-xl bg-red-50 text-red-600 font-medium hover:bg-red-100 transition">

                    Sign Out

                </button>

            </form>

        </div>

    </aside>

    <div class="flex-1">

    <main class="max-w-7xl mx-auto px-6 py-12" x-data="{ 
        openModal: false, 
        selectedProduct: {}, 
        searchQuery: '', 
        selectedCategory: 'All' 
    }">
        
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-10">

    <div>
        <p class="text-sm font-medium text-indigo-600 mb-2">
            Enterprise Inventory Management
        </p>

        <h1 class="text-4xl font-bold tracking-tight text-slate-900">
            Dashboard Overview
        </h1>

        <p class="mt-3 text-slate-500 max-w-2xl">
            Monitor inventory performance, manage assets, track stock levels and
            gain operational insights across your organization.
        </p>
    </div>

    <div class="flex gap-3 mt-6 lg:mt-0">

        <button
            class="px-5 py-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition font-medium">

            Export Report

        </button>

        <button
            class="px-5 py-3 rounded-xl bg-slate-900 text-white hover:bg-slate-800 transition font-medium">

            + Add Product

        </button>

    </div>

</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">

    <div class="
bg-white
rounded-3xl
border
border-slate-200
p-6
shadow-sm
hover:shadow-lg
hover:-translate-y-1
transition-all
duration-300
">
        <p class="text-sm text-slate-500">Total Products</p>
        <h3 class="text-3xl font-bold mt-2">{{ count($products) }}</h3>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <p class="text-sm text-slate-500">Inventory Units</p>
        <h3 class="text-3xl font-bold mt-2 text-emerald-600">
            {{ $products->sum('stock') }}
        </h3>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <p class="text-sm text-slate-500">Categories</p>
        <h3 class="text-3xl font-bold mt-2">
    {{ $products->pluck('category')->unique()->count() }}
</h3>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <p class="text-sm text-slate-500">Inventory Value</p>
        <h3 class="text-3xl font-bold mt-2 text-indigo-600">
            ${{ number_format($products->sum(fn($item) => $item->price * $item->stock), 0) }}
        </h3>
    </div>

</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">

        <div class="flex justify-between items-start mb-5">
            <div>
                <p class="text-sm text-slate-500">
                    Inventory Health
                </p>

                <h2 class="text-4xl font-bold text-slate-900 mt-2">
                    85%
                </h2>
            </div>

            <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-xs font-semibold">
                Excellent
            </span>
        </div>

        <div class="w-full bg-slate-100 rounded-full h-2">
            <div class="bg-emerald-500 h-2 rounded-full w-[85%]"></div>
        </div>

        <p class="mt-4 text-sm text-slate-500">
            Inventory operating normally. No critical shortages detected.
        </p>

    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">

        <div class="flex justify-between items-start mb-5">
            <div>
                <p class="text-sm text-slate-500">
                    Stock Distribution
                </p>

                <h2 class="text-4xl font-bold text-slate-900 mt-2">
                    70%
                </h2>
            </div>

            <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold">
                Stable
            </span>
        </div>

        <div class="w-full bg-slate-100 rounded-full h-2">
            <div class="bg-indigo-500 h-2 rounded-full w-[70%]"></div>
        </div>

        <p class="mt-4 text-sm text-slate-500">
            Most products currently have healthy stock levels.
        </p>

    </div>

</div>
        <div class="flex flex-col md:flex-row justify-between gap-6 mb-8">
            <input type="text" x-model="searchQuery" placeholder="Search assets by name..." 
                   class="
w-full
md:w-96
px-5
py-4
bg-white
border
border-slate-200
rounded-2xl
shadow-sm
focus:ring-4
focus:ring-indigo-100
focus:border-indigo-500
outline-none
transition">
            
            <div class="flex gap-2">
                <template x-for="cat in ['All', 'Network Security', 'FinTech AI', 'Hardware Security', 'Uncategorized']">
                    <button @click="selectedCategory = cat" 
                            :class="selectedCategory === cat ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-gray-200 hover:bg-gray-50'"
                            class="px-5 py-2 rounded-lg text-[11px] font-bold uppercase tracking-wider transition" x-text="cat"></button>
                </template>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr class="text-[10px] uppercase tracking-widest text-gray-500">
                        <th class="px-8 py-5">Product Name</th>
                        <th class="px-8 py-5">Category</th>
                        <th class="px-8 py-5">Price</th>
                        <th class="px-8 py-5 text-center">Stock</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($products as $product)
                        @php
                            // Gelişmiş Kategori Eşleştirme Mantığı
                            $name = strtolower($product->name);
                            if (!empty($product->category) && $product->category !== 'Uncategorized') {
                                $cat = $product->category;
                            } elseif (str_contains($name, 'firewall') || str_contains($name, 'network') || str_contains($name, 'router')) {
                                $cat = 'Network Security';
                            } elseif (str_contains($name, 'ai') || str_contains($name, 'engine') || str_contains($name, 'budget')) {
                                $cat = 'FinTech AI';
                            } elseif (str_contains($name, 'hardware') || str_contains($name, 'neurallink') || str_contains($name, 'hsm')) {
                                $cat = 'Hardware Security';
                            } else {
                                $cat = 'Uncategorized';
                            }
                        @endphp
                        <tr
    class="hover:bg-slate-50 cursor-pointer transition-all duration-200 hover:shadow-sm"
    x-show="(selectedCategory === 'All' || selectedCategory === '{{ $cat }}') && '{{ strtolower($product->name) }}'.includes(searchQuery.toLowerCase())"
    @click="selectedProduct = { name: '{{ addslashes($product->name) }}', price: '{{ number_format($product->price, 2) }}', desc: '{{ addslashes($product->description) }}', cat: '{{ $cat }}' }; openModal = true;"
>
                            <td class="px-8 py-6">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-lg">
            📦
        </div>
<div>
    <p class="font-semibold text-slate-800">
        {{ $product->name }}
    </p>

    <p class="text-xs text-slate-400 mt-1">
        {{ Str::limit($product->description, 45) }}
    </p>
</div>
    </div>

</td>
                            <td class="px-8 py-6 text-xs text-slate-500 uppercase tracking-wide">{{ $cat }}</td>
                            <td class="px-8 py-6 font-mono font-medium text-emerald-600">${{ number_format($product->price, 2) }}</td>
                            <td class="px-8 py-6 text-center">
                                @if($product->stock > 20)
    <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold">
        In Stock
    </span>
@elseif($product->stock > 10)
    <span class="bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-semibold">
        Medium
    </span>
@else
    <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
        Low Stock
    </span>
@endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/20 backdrop-blur-sm" x-cloak>
            <div
    @click.away="openModal = false"
    class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-200 overflow-hidden">
                <div class="p-8 border-b border-slate-100">

    <p class="text-xs font-semibold uppercase tracking-widest text-indigo-600"
       x-text="selectedProduct.cat"></p>

    <h2 class="text-3xl font-bold mt-2"
       x-text="selectedProduct.name"></h2>

</div>

<div class="p-8">

    <div class="grid grid-cols-2 gap-4 mb-8">

        <div class="bg-slate-50 rounded-2xl p-4">
            <p class="text-xs text-slate-500">Price</p>
            <p class="text-xl font-bold text-emerald-600"
               x-text="'$' + selectedProduct.price"></p>
        </div>

        <div class="bg-slate-50 rounded-2xl p-4">
            <p class="text-xs text-slate-500">Status</p>
            <p class="text-xl font-bold text-emerald-600">
                Active
            </p>
        </div>

    </div>

    <h3 class="font-semibold mb-3">
        Description
    </h3>

    <p class="text-slate-600 leading-relaxed mb-8"
       x-text="selectedProduct.desc"></p>

    <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-5 mb-6">

        <h4 class="font-semibold text-indigo-900 mb-2">
            AI Analysis
        </h4>

        <p class="text-sm text-indigo-700">
            AI review indicates stable inventory activity.
Current stock levels support operational demand.
No immediate replenishment action required.
        </p>

    </div>

    <button
        @click="openModal = false"
        class="w-full py-4 bg-slate-900 text-white rounded-2xl font-semibold hover:bg-slate-800 transition">

        Close Details

    </button>

</div>
            </div>
        </div>
    </main>
    </div>
    <button
    x-data
    @click="alert('AI Assistant module coming soon')"
    class="
    fixed
    bottom-6
    right-6
    px-5
    py-3
    rounded-2xl
    bg-slate-900
    text-white
    shadow-xl
    hover:scale-105
    transition-all
    duration-200
    z-50">

    🤖 AI Assistant

</button>
</body>
</html>