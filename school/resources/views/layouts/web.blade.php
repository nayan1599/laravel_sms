{{-- resources/views/layouts/layouts.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My School')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Optional Custom CSS -->
    <style>
        body {
            padding-top: 70px; /* navbar fixed height */
        }
    </style>
</head>
<body>

@php
    use App\Models\Menu;
    $menus = Menu::where('status', 'active')->orderBy('order')->get();
@endphp




<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">My School</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        @if ($menu->url)
                            <a href="{{ url($menu->url) }}" class="nav-link {{ request()->is($menu->url) ? 'active' : '' }}">
                                {{ $menu->title }}
                            </a>
                        @elseif ($menu->route_name)
                            <a href="{{ route($menu->route_name) }}" class="nav-link {{ request()->routeIs($menu->route_name) ? 'active' : '' }}">
                                {{ $menu->title }}
                            </a>
                        @else
                            <span class="nav-link disabled">{{ $menu->title }}</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<main class="container my-4">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    &copy; {{ date('Y') }} My School. All rights reserved.
</footer>

<!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
