@include('web_site.top_area')

@php
use App\Models\Menu;
$menus = Menu::where('status', 'active')->orderBy('order')->get();
@endphp




<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">My School</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
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