<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Salary Module</title>
    @livewireStyles
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Salary Module</h1>
        @if(session()->has('success'))
            <div class="bg-green-100 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        {{ $slot ?? null }}
    </div>
    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
