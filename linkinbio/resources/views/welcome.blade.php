<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Link in Bio — Stylish & Simple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=manrope:400,700|lora:400,700" rel="stylesheet" />
    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
    </style>

</head>
<body class="bg-[#F5F5F1] text-[#221F1F]">

    <div class="min-h-screen flex flex-col justify-center items-center px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
            Link in Bio Manager
        </h1>

        <p class="text-lg text-[#4B4B4B] max-w-xl mb-8">
            Buat satu halaman profil dengan semua link penting kamu. Tampil lebih rapi, profesional, dan estetik 
        </p>

        <div class="flex gap-4 flex-wrap justify-center">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="bg-primary hover:bg-accent text-white px-6 py-3 font-semibold rounded-xl shadow transition">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="bg-primary hover:bg-accent text-white px-6 py-3 font-semibold rounded-xl shadow transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="border hover:border-primary border-zinc-200 bg-zinc-200 hover:bg-zinc-100 hover:text-primary text-black font-semibold px-6 py-3 rounded-xl transition">
                    Register
                </a>
            @endauth
        </div>
    </div>

</body>
</html>
