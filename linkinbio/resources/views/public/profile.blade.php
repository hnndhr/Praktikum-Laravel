<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $profile['name'] }} — Link in Bio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-white to-[#fdf6f0] min-h-screen text-gray-800">

    <div class="max-w-md mx-auto px-4 pt-12 text-center">
        <img src="{{ $profile['photo'] }}" class="w-24 h-24 rounded-full mx-auto mb-4 shadow-md object-cover">
        <h1 class="text-2xl font-semibold">{{ $profile['name'] }}</h1>
        <p class="text-sm text-gray-500 mb-6">{{ $profile['bio'] }}</p>

        @foreach($links as $link)
            <a href="{{ $link->url }}" target="_blank"
               class="block w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-4 rounded-xl shadow mb-4 transition">
                {{ $link->title }}
            </a>
        @endforeach

        @if($links->isEmpty())
            <p class="text-gray-400">Belum ada link ditambahkan.</p>
        @endif
    </div>

</body>
</html>
