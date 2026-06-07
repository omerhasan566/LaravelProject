<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Inventory | Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
x-data="{
    openModal: false,
    openAddProduct: false,
    openAI: false,
    openDeleteModal: false,
deleteProduct: {},
openEditProduct: false,
editProduct: {},
    selectedProduct: {},
    searchQuery: '',
    selectedCategory: 'All'
}"
class="bg-slate-50 min-h-screen text-slate-900">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-white border-r border-slate-200 flex flex-col fixed left-0 top-0 bottom-0 z-30">

        <div class="p-6 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl bg-indigo-600 text-white flex items-center justify-center shadow-sm">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                </div>

                <div>
                    <h2 class="font-bold text-slate-900 leading-tight">
                        Enterprise Inventory
                    </h2>
                    <p class="text-xs text-slate-500">
                        Asset Management
                    </p>
                </div>
            </div>
        </div>

        <nav class="p-4 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-indigo-50 text-indigo-700 font-semibold">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                Dashboard
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                <i data-lucide="package" class="w-5 h-5"></i>
                Products
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                Analytics
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                <i data-lucide="bot" class="w-5 h-5"></i>
                AI Assistant
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                <i data-lucide="settings" class="w-5 h-5"></i>
                Settings
            </a>
        </nav>

        <div class="mt-auto p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
    type="submit"
    class="w-full flex items-center justify-center gap-2 py-3 rounded-2xl border border-red-100 bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition"
>
    <i data-lucide="log-out" class="w-4 h-4"></i>
    Sign Out
</button>
            </form>
        </div>

    </aside>

    <!-- Main Content -->
    <main class="ml-72 flex-1 px-8 py-10">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

            <div>
                <p class="text-sm font-semibold text-indigo-600 mb-2">
                    Inventory Control Center
                </p>

                <h1 class="text-4xl font-bold tracking-tight text-slate-950">
                    Dashboard
                </h1>

                <p class="mt-3 text-slate-500 max-w-2xl">
                    Monitor inventory performance, manage assets, track stock levels and review product insights from a single workspace.
                </p>
            </div>

            <div class="flex gap-3">
                <button
                    class="px-5 py-3 rounded-2xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 transition font-semibold shadow-sm"
                >
                    Export Report
                </button>

                <button
    @click="openAddProduct = true"
    class="px-5 py-3 rounded-2xl bg-slate-950 text-white hover:bg-slate-800 transition font-semibold shadow-sm"
>
    + Add Product
</button>
            </div>

        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

            <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Total Products
                        </p>

                        <h3 class="text-3xl font-bold mt-3 text-slate-950">
                            {{ count($products) }}
                        </h3>
                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                        <i data-lucide="boxes" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Inventory Units
                        </p>

                        <h3 class="text-3xl font-bold mt-3 text-emerald-600">
                            {{ $products->sum('stock') }}
                        </h3>
                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i data-lucide="warehouse" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Categories
                        </p>

                        <h3 class="text-3xl font-bold mt-3 text-slate-950">
                            4
                        </h3>
                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center">
                        <i data-lucide="tags" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Inventory Value
                        </p>

                        <h3 class="text-3xl font-bold mt-3 text-indigo-600">
                            ${{ number_format($products->sum(fn($item) => $item->price * $item->stock), 0) }}
                        </h3>
                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <i data-lucide="wallet" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>

        </div>
                <!-- Search and Filters -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 mb-6">

            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">

                <div class="relative w-full xl:w-96">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"></i>

                    <input
                        type="text"
                        x-model="searchQuery"
                        placeholder="Search products..."
                        class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                    >
                </div>

                <div class="flex flex-wrap gap-2">
                    <template x-for="cat in ['All', 'Network Security', 'FinTech AI', 'Hardware Security', 'Biometric Security', 'Uncategorized']">
                        <button
                            @click="selectedCategory = cat"
                            :class="selectedCategory === cat
                                ? 'bg-slate-950 text-white border-slate-950'
                                : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'"
                            class="px-4 py-2 rounded-2xl text-xs font-semibold border transition"
                            x-text="cat"
                        ></button>
                    </template>
                </div>

            </div>

        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-slate-950">
                        Product Catalog
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Browse, filter and inspect active inventory assets.
                    </p>
                </div>

                <span class="hidden md:inline-flex items-center gap-2 text-xs font-semibold text-slate-500 bg-slate-50 border border-slate-200 rounded-full px-3 py-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    System Online
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr class="text-[11px] uppercase tracking-widest text-slate-500">
                            <th class="px-6 py-4 font-semibold">Product</th>
                            <th class="px-6 py-4 font-semibold">Category</th>
                            <th class="px-6 py-4 font-semibold">Price</th>
                            <th class="px-6 py-4 font-semibold text-center">Stock Status</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach($products as $product)

                            @php
                                $name = strtolower($product->name);

                                if (!empty($product->category) && $product->category !== 'Uncategorized') {
                                    $cat = $product->category;
                                } elseif (str_contains($name, 'firewall') || str_contains($name, 'network') || str_contains($name, 'router') || str_contains($name, 'blackbox') || str_contains($name, 'penetration')) {
                                    $cat = 'Network Security';
                                } elseif (str_contains($name, 'ai') || str_contains($name, 'engine') || str_contains($name, 'budget')) {
                                    $cat = 'FinTech AI';
                                } elseif (str_contains($name, 'hardware') || str_contains($name, 'neurallink') || str_contains($name, 'hsm')) {
                                    $cat = 'Hardware Security';
                                } elseif (str_contains($name, 'biosecure') || str_contains($name, 'biometric')) {
                                    $cat = 'Biometric Security';
                                } else {
                                    $cat = 'Uncategorized';
                                }

                                if ($cat === 'Network Security') {
                                    $icon = 'shield';
                                    $iconBg = 'bg-indigo-50';
                                    $iconText = 'text-indigo-600';
                                } elseif ($cat === 'FinTech AI') {
                                    $icon = 'brain-circuit';
                                    $iconBg = 'bg-violet-50';
                                    $iconText = 'text-violet-600';
                                } elseif ($cat === 'Hardware Security') {
                                    $icon = 'cpu';
                                    $iconBg = 'bg-slate-100';
                                    $iconText = 'text-slate-700';
                                } elseif ($cat === 'Biometric Security') {
                                    $icon = 'fingerprint';
                                    $iconBg = 'bg-emerald-50';
                                    $iconText = 'text-emerald-600';
                                } else {
                                    $icon = 'package';
                                    $iconBg = 'bg-slate-100';
                                    $iconText = 'text-slate-600';
                                }
                            @endphp

                            <tr
                                class="hover:bg-slate-50 cursor-pointer transition"
                                x-show="(selectedCategory === 'All' || selectedCategory === '{{ $cat }}') && '{{ strtolower(addslashes($product->name)) }}'.includes(searchQuery.toLowerCase())"
                                @click="selectedProduct = {
                                    name: '{{ addslashes($product->name) }}',
                                    price: '{{ number_format($product->price, 2) }}',
                                    desc: '{{ addslashes($product->description) }}',
                                    cat: '{{ $cat }}',
                                    stock: '{{ $product->stock }}'
                                }; openModal = true;"
                            >

                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">

                                        <div class="w-11 h-11 rounded-2xl {{ $iconBg }} {{ $iconText }} flex items-center justify-center">
                                            <i data-lucide="{{ $icon }}" class="w-5 h-5"></i>
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-900">
                                                {{ $product->name }}
                                            </p>

                                            <p class="text-xs text-slate-400 mt-1 max-w-sm truncate">
                                                {{ Str::limit($product->description, 60) }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-50 text-slate-600 border border-slate-200 text-xs font-semibold">
                                        {{ $cat }}
                                    </span>
                                </td>

                                <td class="px-6 py-5">
                                    <span class="font-semibold text-emerald-600">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                </td>

                                <td class="px-6 py-5 text-center">
                                    @if($product->stock > 20)
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-xs font-semibold">
                                            In Stock
                                        </span>
                                    @elseif($product->stock > 10)
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-amber-50 text-amber-600 text-xs font-semibold">
                                            Medium
                                        </span>
                                    @else
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-semibold">
                                            Low Stock
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-right">

    <div class="flex justify-end gap-2">

        <button
            type="button"
            @click.stop="
                editProduct = {
                    id: '{{ $product->id }}',
                    name: '{{ addslashes($product->name) }}',
                    description: '{{ addslashes($product->description) }}',
                    price: '{{ $product->price }}',
                    stock: '{{ $product->stock }}'
                };
                openEditProduct = true;
            "
            class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-indigo-100 text-indigo-600 hover:bg-indigo-50 transition"
        >
            <i data-lucide="pencil" class="w-4 h-4"></i>
        </button>

        <button
            type="button"
            @click.stop="deleteProduct = { id: '{{ $product->id }}', name: '{{ addslashes($product->name) }}' }; openDeleteModal = true"
            class="inline-flex items-center justify-center w-10 h-10 rounded-xl border border-red-100 text-red-500 hover:bg-red-50 transition"
        >
            <i data-lucide="trash-2" class="w-4 h-4"></i>
        </button>

    </div>

</td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>

        </div>
                <!-- Add Product Modal -->
                 <!-- Edit Product Modal -->
<div
    x-show="openEditProduct"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/40 backdrop-blur-sm"
>
    <div
        @click.away="openEditProduct = false"
        class="bg-white rounded-3xl w-full max-w-xl shadow-2xl border border-slate-200 overflow-hidden"
    >
        <div class="p-6 border-b border-slate-100">
            <h2 class="text-2xl font-bold text-slate-950">
                Edit Product
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Update product information and inventory values.
            </p>
        </div>

        <form method="POST" :action="'/products/' + editProduct.id" class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    x-model="editProduct.name"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    x-model="editProduct.description"
                    required
                    rows="3"
                    class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                ></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Price
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        x-model="editProduct.price"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Stock
                    </label>

                    <input
                        type="number"
                        name="stock"
                        x-model="editProduct.stock"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                    >
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button
                    type="button"
                    @click="openEditProduct = false"
                    class="flex-1 py-3 rounded-2xl border border-slate-200 font-semibold hover:bg-slate-50 transition"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="flex-1 py-3 rounded-2xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition"
                >
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
<div
    x-show="openAddProduct"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/40 backdrop-blur-sm"
>
    <div
        @click.away="openAddProduct = false"
        class="bg-white rounded-3xl w-full max-w-xl shadow-2xl border border-slate-200 overflow-hidden"
    >
        <div class="p-6 border-b border-slate-100">
            <h2 class="text-2xl font-bold text-slate-950">
                Add New Product
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Create a new inventory product.
            </p>
        </div>

        <form method="POST" action="{{ route('products.store') }}" class="p-6 space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Product Name
                </label>
                <input
                    type="text"
                    name="name"
                    required
                    class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                    placeholder="Example: Secure Router Pro"
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Description
                </label>
                <textarea
                    name="description"
                    required
                    rows="3"
                    class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                    placeholder="Product description..."
                ></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Price
                    </label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                        placeholder="999.99"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Stock
                    </label>
                    <input
                        type="number"
                        name="stock"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 outline-none"
                        placeholder="25"
                    >
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button
                    type="button"
                    @click="openAddProduct = false"
                    class="flex-1 py-3 rounded-2xl border border-slate-200 font-semibold hover:bg-slate-50 transition"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="flex-1 py-3 rounded-2xl bg-slate-950 text-white font-semibold hover:bg-slate-800 transition"
                >
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>
        <div
            x-show="openModal"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/40 backdrop-blur-sm"
        >
            <div
                @click.away="openModal = false"
                class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl border border-slate-200 overflow-hidden"
            >

                <div class="p-8 border-b border-slate-100 flex items-start justify-between gap-6">

                    <div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold mb-4"
                            x-text="selectedProduct.cat"
                        ></span>

                        <h2
                            class="text-3xl font-bold text-slate-950"
                            x-text="selectedProduct.name"
                        ></h2>

                        <p class="text-sm text-slate-500 mt-2">
                            Product detail and inventory intelligence summary.
                        </p>
                    </div>

                    <button
                        @click="openModal = false"
                        class="w-10 h-10 rounded-2xl bg-slate-50 hover:bg-slate-100 text-slate-500 flex items-center justify-center transition"
                    >
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>

                </div>

                <div class="p-8">

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                            <p class="text-xs text-slate-500 mb-1">
                                Price
                            </p>

                            <p
                                class="text-xl font-bold text-emerald-600"
                                x-text="'$' + selectedProduct.price"
                            ></p>
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                            <p class="text-xs text-slate-500 mb-1">
                                Stock
                            </p>

                            <p
                                class="text-xl font-bold text-slate-950"
                                x-text="selectedProduct.stock + ' Units'"
                            ></p>
                        </div>

                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                            <p class="text-xs text-slate-500 mb-1">
                                Status
                            </p>

                            <p class="text-xl font-bold text-emerald-600">
                                Active
                            </p>
                        </div>

                    </div>

                    <div class="mb-8">
                        <h3 class="font-semibold text-slate-950 mb-3">
                            Description
                        </h3>

                        <p
                            class="text-slate-600 leading-relaxed"
                            x-text="selectedProduct.desc"
                        ></p>
                    </div>

                    <div class="bg-indigo-50 border border-indigo-100 rounded-3xl p-5">

                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-2xl bg-white text-indigo-600 flex items-center justify-center">
                                <i data-lucide="sparkles" class="w-5 h-5"></i>
                            </div>

                            <div>
                                <h4 class="font-semibold text-indigo-950">
                                    AI Inventory Insight
                                </h4>

                                <p class="text-xs text-indigo-600">
                                    Automated inventory review
                                </p>
                            </div>
                        </div>

                        <ul class="space-y-2 text-sm text-indigo-700">
                            <li>✓ Inventory activity appears stable.</li>
                            <li>✓ No critical stock warning detected.</li>
                            <li>✓ Product is suitable for continued distribution.</li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>

        <!-- AI Assistant Panel -->
        <div
            x-show="openAI"
            x-cloak
            @click.away="openAI = false"
            class="fixed bottom-24 right-8 w-96 bg-white rounded-3xl border border-slate-200 shadow-2xl overflow-hidden z-50"
        >
            <div class="p-5 border-b border-slate-100 bg-slate-950 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-bold">
                            AI Copilot
                        </h3>

                        <p class="text-xs text-slate-300 mt-1">
                            Inventory assistant preview
                        </p>
                    </div>

                    <button
                        @click="openAI = false"
                        class="w-8 h-8 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center"
                    >
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <div class="p-5 space-y-3">

                <button class="w-full text-left p-4 rounded-2xl bg-slate-50 hover:bg-slate-100 transition">
                    <p class="font-semibold text-sm">
                        Find low stock products
                    </p>
                    <p class="text-xs text-slate-500 mt-1">
                        Detect products that may require replenishment.
                    </p>
                </button>

                <button class="w-full text-left p-4 rounded-2xl bg-slate-50 hover:bg-slate-100 transition">
                    <p class="font-semibold text-sm">
                        Summarize inventory value
                    </p>
                    <p class="text-xs text-slate-500 mt-1">
                        Review current inventory value and stock distribution.
                    </p>
                </button>

                <button class="w-full text-left p-4 rounded-2xl bg-slate-50 hover:bg-slate-100 transition">
                    <p class="font-semibold text-sm">
                        Recommend category cleanup
                    </p>
                    <p class="text-xs text-slate-500 mt-1">
                        Identify uncategorized or inconsistent products.
                    </p>
                </button>

            </div>
        </div>
<!-- Delete Product Modal -->
<div
    x-show="openDeleteModal"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/40 backdrop-blur-sm"
>
    <div
        @click.away="openDeleteModal = false"
        class="bg-white rounded-3xl w-full max-w-md shadow-2xl border border-slate-200 overflow-hidden"
    >
        <div class="p-6 border-b border-slate-100">
            <h2 class="text-2xl font-bold text-slate-950">
                Delete Product
            </h2>

            <p class="text-sm text-slate-500 mt-2">
                This action cannot be undone.
            </p>
        </div>

        <div class="p-6">
            <div class="bg-red-50 border border-red-100 rounded-2xl p-4 mb-6">
                <p class="text-sm text-red-600 font-semibold">
                    Are you sure you want to delete this product?
                </p>

                <p class="text-slate-900 font-bold mt-2" x-text="deleteProduct.name"></p>
            </div>

            <div class="flex gap-3">
                <button
                    type="button"
                    @click="openDeleteModal = false"
                    class="flex-1 py-3 rounded-2xl border border-slate-200 font-semibold hover:bg-slate-50 transition"
                >
                    Cancel
                </button>

                <form method="POST" :action="'/products/' + deleteProduct.id" class="flex-1">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full py-3 rounded-2xl bg-red-600 text-white font-semibold hover:bg-red-700 transition"
                    >
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
        <!-- Floating AI Button -->
        <button
            @click="openAI = !openAI"
            class="fixed bottom-6 right-8 inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-slate-950 text-white shadow-xl hover:bg-slate-800 hover:scale-105 transition-all duration-200 z-50"
        >
            <i data-lucide="bot" class="w-5 h-5"></i>
            AI Copilot
        </button>

    </main>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.lucide) {
            lucide.createIcons();
        }
    });
</script>

</body>
</html>