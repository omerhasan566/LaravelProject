<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-3xl border border-slate-200 shadow-sm p-8">

        <h1 class="text-3xl font-bold text-slate-900 mb-2">
            Create Account
        </h1>

        <p class="text-slate-500 mb-8">
            Register to access the inventory dashboard.
        </p>

        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <input
                type="text"
                name="name"
                placeholder="Full Name"
                required
                class="w-full px-4 py-3 rounded-2xl border border-slate-200 outline-none focus:ring-4 focus:ring-indigo-100"
            >

            <input
                type="email"
                name="email"
                placeholder="Email Address"
                required
                class="w-full px-4 py-3 rounded-2xl border border-slate-200 outline-none focus:ring-4 focus:ring-indigo-100"
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
                class="w-full px-4 py-3 rounded-2xl border border-slate-200 outline-none focus:ring-4 focus:ring-indigo-100"
            >

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                required
                class="w-full px-4 py-3 rounded-2xl border border-slate-200 outline-none focus:ring-4 focus:ring-indigo-100"
            >

            <button
                type="submit"
                class="w-full py-3 rounded-2xl bg-slate-950 text-white font-semibold hover:bg-slate-800 transition"
            >
                Create Account
            </button>
        </form>

        <p class="text-sm text-slate-500 mt-6 text-center">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 font-semibold">
                Login
            </a>
        </p>

    </div>

</body>
</html> 