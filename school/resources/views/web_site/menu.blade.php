 @php
 use App\Models\Menu;
 $menus = Menu::where('status', 'active')->orderBy('order')->get();
 use App\Models\OrganizationSetting;
 $setting = OrganizationSetting::first(); // প্রথম রেকর্ড
 @endphp


 <section class="menu_area">
     <div class="container">
         <nav class="navbar navbar-expand-lg ">
             <div class="container-fluid">

<a class="navbar-brand" href="#">
    @if ($setting && $setting->logo)
        <img src="{{ asset('storage/' . $setting->logo) }}" 
             alt="{{ $setting->organization_name ?? 'Logo' }}" 
             style="height:40px; width:40px; border-radius:50%; object-fit:cover;">
    @else
        <picture>
            <source srcset="{{ asset('img/avatar/avatar-illustrated-02.webp') }}" type="image/webp">
            <img src="{{ asset('img/avatar/avatar-illustrated-02.png') }}" 
                 alt="Default Logo" 
                 style="height:40px; width:40px; border-radius:50%;">
        </picture>
    @endif
</a>





                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
                     <ul class="navbar-nav">
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
     </div>
 </section>