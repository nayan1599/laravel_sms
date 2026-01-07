  <aside class="sidebar">
      <div class="sidebar-start">
          @auth
          @php
          $user = auth()->user();
          @endphp
          <div class="sidebar-head">
              <a href="{{ route('student.dashboard') }}" class="logo-wrapper gap-3" title="Home">
                  <span class="sr-only">Home</span>
                  @if($user->photo)
                  <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}" class="rounded-circle" style="width:40px; height:40px; object-fit:cover;">
                  @else
                  {{-- Default avatar --}}
                  <img src="{{ asset('img/avatar/avatar-illustrated-01.png') }}" alt="Default Avatar" class="rounded-circle" style="width:40px; height:40px;">
                  @endif
                  <div class="logo-text">
                      <span class="logo-title">{{ $user->name }}</span>
                      <span class="logo-subtitle">Dashboard</span>
                  </div>
              </a>
              <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                  <span class="sr-only">Toggle menu</span>
                  <span class="icon menu-toggle" aria-hidden="true"></span>
              </button>
          </div>
          @endauth
          <div class="sidebar-body">
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('student.dashboard') }}">
                          <span class="icon home" aria-hidden="true"></span>Dashboard
                      </a>
                  </li>
              </ul>
              <ul class="sidebar-body-menu">

                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-graduation-cap"></i> Students
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li><a class="{{ request()->is('students') || request()->is('students/*') ? 'active' : '' }}" href="{{ route('students.index') }}">All Students</a></li>
                      </ul>
                  </li>
              </ul>


              <span class="system-menu__title"><i class="fa-solid fa-square-poll-vertical icon"></i> Exam Result</span>
              <ul class="sidebar-body-menu">
                  <!-- exam section -->
                  <li> <a class="{{ request()->is('marks') || request()->is('marks/*') ? 'active' : '' }}" href="{{route('student.results')}}">Mark List</a> </li>
              </ul>





              <span class="system-menu__title">** Fees</span>
              <ul class="sidebar-body-menu">
                  <li> <a class="{{ request()->is('fees') ? 'active' : '' }}" href="{{route('student.fee')}}">Fees</a> </li>
              </ul>
          </div>
      </div>


      @php
      use App\Models\OrganizationSetting;
      $settings = OrganizationSetting::all();
      @endphp



      @forelse($settings as $setting)
      <div class="sidebar-footer">
          <a href="" class="sidebar-user d-flex align-items-center text-decoration-none">
              <span class="sidebar-user-img me-2">
                  @if($setting->logo)
                  <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->organization_name }}" class="rounded-circle" style="width:40px; height:40px; object-fit:cover;">
                  @else
                  {{-- Default avatar --}}
                  <img src="{{ asset('img/avatar/avatar-illustrated-01.png') }}" alt="Default Avatar" class="rounded-circle" style="width:40px; height:40px;">
                  @endif
              </span>
              <div class="sidebar-user-info">
                  <span class="sidebar-user__title fw-bold">{{ $setting->organization_name }}</span>
                  <span class="sidebar-user__subtitle light-text">
                      {{-- ধরছি এখানে তোমার মডেলে কোনো পজিশন বা ডেসিগনেশন আছে, নাইলে অন্য কিছু দেখাও --}}
                      {{ $setting->email ?? 'Owner name not set' }}
                  </span>
              </div>
          </a>
      </div>
      @empty
      <p>No organization settings found.</p>
      @endforelse

  </aside>