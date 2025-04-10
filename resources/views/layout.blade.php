<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('style')

</head>
<body>

    <div class="flex flex-col items-center justify-center w-screen min-h-screen overflow-x-hidden">
        @include('component.header')
        @yield('content')
    </div>
    
    @yield('script')

    @include('component.footer')
</body>
</html>