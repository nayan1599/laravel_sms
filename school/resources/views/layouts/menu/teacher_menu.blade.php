  <aside class="sidebar">
      <div class="sidebar-start">
          @auth
          @php
          $user = auth()->user();
          @endphp
          <div class="sidebar-head">

              <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                  <span class="sr-only">Toggle menu</span>
                  <span class="icon menu-toggle" aria-hidden="true"></span>
              </button>
          </div>
          @endauth
          <div class="sidebar-body">
           <ul class="sidebar-body-menu">

    <!-- Dashboard -->
    <li>
        <a class="{{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}"
           href="{{ route('teacher.dashboard') }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
    </li>

    <!-- My Classes -->
    <li>
        <a class="{{ request()->routeIs('teacher.classlist*') ? 'active' : '' }}"
           href="{{ url('teacher/classes') }}">
            <i class="bi bi-easel-fill me-2"></i> My Classes
        </a>
    </li>

    <!-- Student List -->
    <li>
        <a class="{{ request()->routeIs('teacher.studentlist*') ? 'active' : '' }}"
           href="{{ url('teacher/studentlist') }}">
            <i class="bi bi-people-fill me-2"></i> Student List
        </a>
    </li>

    <!-- Attendance -->
    <li>
        <a class="{{ request()->routeIs('attendance.create*') ? 'active' : '' }}"
           href="{{ url('attendance/create') }}">
            <i class="bi bi-calendar-check-fill me-2"></i> Attendance
        </a>
    </li>

    <!-- Marks Entry -->
    <li>
        <a class="{{ request()->routeIs('marks*') ? 'active' : '' }}"
           href="{{ url('marks') }}">
            <i class="bi bi-pencil-square me-2"></i> Marks Entry
        </a>
    </li>

    <!-- Leave Approval -->
    <li>
        <a class="{{ request()->routeIs('leave.index*') ? 'active' : '' }}"
           href="{{ url('leave/index') }}">
            <i class="bi bi-envelope-check-fill me-2"></i> Leave Approval
        </a>
    </li>

    <!-- Profile -->
    <li>
        <a class="{{ request()->routeIs('users.show*') ? 'active' : '' }}"
           href="{{ route('users.show', encrypt($user->id))}}">
            <i class="bi bi-person-circle me-2"></i> Profile
        </a>
    </li>

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