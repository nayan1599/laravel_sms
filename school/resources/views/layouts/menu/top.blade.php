    <nav class="main-nav--bg">
      <div class="container main-nav">
        <div class="main-nav-start">
          
        </div>
        <div class="main-nav-end">
          <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
            <span class="sr-only">Toggle menu</span>
            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
          </button>
      
          <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
            <span class="sr-only">Switch theme</span>
            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
          </button>
          <div class="notification-wrapper">
            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
              <span class="sr-only">To messages</span>
              <span class="icon notification active" aria-hidden="true"></span>
            </button>
            <ul class="users-item-dropdown notification-dropdown dropdown">
              <li>
                <a href="##">
                  <div class="notification-dropdown-icon info">
                    <i data-feather="check"></i>
                  </div>
                  <div class="notification-dropdown-text">
                    <span class="notification-dropdown__title">System just updated</span>
                    <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                      here.</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="notification-dropdown-icon danger">
                    <i data-feather="info" aria-hidden="true"></i>
                  </div>
                  <div class="notification-dropdown-text">
                    <span class="notification-dropdown__title">The cache is full!</span>
                    <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                      interfere ...</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="notification-dropdown-icon info">
                    <i data-feather="check" aria-hidden="true"></i>
                  </div>
                  <div class="notification-dropdown-text">
                    <span class="notification-dropdown__title">New Subscriber here!</span>
                    <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
                  </div>
                </a>
              </li>
              <li>
                <a class="link-to-page" href="##">Go to Notifications page</a>
              </li>
            </ul>
          </div>
          <div class="nav-user-wrapper">

            @auth
            @php
            $user = auth()->user();
            @endphp
            <!-- {{$user->photo}} -->
            <button class="nav-user-btn dropdown-btn" title="My profile" type="button">
              <span class="sr-only">My profile</span>

              <span class="nav-user-img">
                @if($user->photo)

                <img src="{{ asset($user->photo) }}"
                  alt="{{ $user->name }}"
                  style="height:40px; width:40px; border-radius:50%; object-fit:cover;">
                @else
                <img src="{{ asset('images/default-user.png') }}"
                  alt="Default User"
                  style="height:40px; width:40px; border-radius:50%;">
                @endif
              </span>
            </button>

            <ul class="users-item-dropdown nav-user-dropdown dropdown">

              {{-- Profile --}}
              <li>
                <a href="{{ route('users.show', encrypt($user->id)) }}">
                  <i data-feather="user"></i>
                  <span>{{ $user->name }}</span>
                </a>
              </li>

              {{-- Account Settings --}}

              @if($user->role =='admin')


              <li>
                <a href="{{ route('organization_settings.index') }}">
                  <i data-feather="settings"></i>
                  <span>Account settings</span>
                </a>
              </li>
              <li>
                <a href="{{ route('users.index') }}">
                  <i data-feather="user"></i>
                  <span> Settings</span>
                </a>
              </li>
              @endif

              {{-- Account Settings --}}
              <li>
                <a href="{{ route('users.edit',encrypt($user->id)) }}">
                  <i class="fa-solid fa-pen-to-square"></i>  
                  <span class="m-2"> User Settings</span>
                </a>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              {{-- Logout (POST required) --}}
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">
                    <i data-feather="log-out"></i>
                    <span>Log out</span>
                  </button>
                </form>
              </li>

            </ul>
            @endauth

          </div>

        </div>
      </div>
    </nav>