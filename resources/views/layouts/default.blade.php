<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larisco | {{ ucfirst($title) }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex">
        <div id="sidebar-btn" class="fixed z-30">
            @include('components.sidebar')
            <button class="font-bold text-2xl px-2 py-1 rounded-e-full mt-10" style="background-color: #F2FAF1;">
                >
            </button>
        </div>
        <div class="w-full lg:ml-72">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('snap.js') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="{{ asset('/app.js') }}"></script>
</body>

</html>
