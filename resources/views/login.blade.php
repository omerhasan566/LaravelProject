<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-2xl shadow-xl w-96 border border-gray-100">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Login</h2>
        
        @if($errors->any())
            <p class="text-red-500 mb-4 text-sm text-center">Invalid credentials!</p>
        @endif

        <form method="POST" action="/login">
            @csrf
            <input type="email" name="email" placeholder="Email Address" class="w-full border-gray-300 border p-3 mb-4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            <input type="password" name="password" placeholder="Password" class="w-full border-gray-300 border p-3 mb-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            
            <div class="flex justify-between items-center mb-6 text-sm">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2"> Remember me
                </label>
                <a href="#" class="text-blue-600 hover:underline">Forgot password?</a>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                Sign In
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? <a href="#" class="text-blue-600 font-bold hover:underline">Sign up</a>
        </p>
    </div>
</body>
</html>