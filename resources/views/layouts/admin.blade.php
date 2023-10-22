<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larisco | Admin | {{ ucfirst($title) }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex">
        <div class="fixed z-30" id="sidebar-btn">
            @include('components.admin.sidebar')
            <button class="font-bold text-2xl px-2 py-1 rounded-e-full mt-10" style="background-color: #F2FAF1;">
                >
            </button>
        </div>

        <div class="w-full lg:ml-72">
            @yield('content')
        </div>
    </div>
</body>

</html>
