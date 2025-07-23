{{-- resources/views/layouts/layouts.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My School')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/website.css') }}" />
    <!-- Font Awesome CDN -->
 <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}" />


</head>

<body>
    <!-- menu section  -->
    @include('web_site.top_area')
    @include('web_site.menu')
@include('web_site.banner')
    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        &copy; {{ date('Y') }} My School. All rights reserved.
    </footer>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>