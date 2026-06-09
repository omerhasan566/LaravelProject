<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Request Sent | CyberShield</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50 text-slate-950">

<main class="min-h-screen flex items-center justify-center px-6">

    <div class="max-w-xl w-full bg-white border border-slate-200 rounded-3xl p-10 text-center shadow-sm">

        <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-50 text-blue-600 flex items-center justify-center mb-6">
            <i data-lucide="check-circle-2" class="w-10 h-10"></i>
        </div>

        <p class="text-blue-600 font-bold mb-2">REQUEST SENT</p>

        <h1 class="text-4xl font-extrabold">
            Quote Request Submitted
        </h1>

        <p class="text-slate-500 mt-4 leading-relaxed">
            Thank you for your interest in CyberShield. Our enterprise sales team will review your request and contact you shortly.
        </p>

        <a href="{{ route('shop.index') }}"
           class="mt-8 inline-flex justify-center px-6 py-4 rounded-2xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
            Back to Products
        </a>

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