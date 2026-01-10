<aside class="sidebar">
    <div class="sidebar-start">

        @auth
        @php
            $user = auth()->user();
        @endphp

        <!-- Sidebar Header -->
        <div class="sidebar-head">
            <a href="{{ route('student.dashboard') }}" class="logo-wrapper gap-3">
                @if($user->photo)
                    <img src="{{ asset($user->photo) }}" class="rounded-circle"
                         style="width:40px;height:40px;object-fit:cover;">
                @else
                    <img src="{{ asset('img/avatar/avatar-illustrated-01.png') }}"
                         class="rounded-circle" style="width:40px;height:40px;">
                @endif

                <div class="logo-text">
                    <span class="logo-title">{{ $user->name }}</span>
                    <span class="logo-subtitle">Student</span>
                </div>
            </a>
        </div>
        @endauth

        <!-- Sidebar Menu -->
        <div class="sidebar-body">

            <!-- Dashboard -->
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}"
                       href="{{ route('student.dashboard') }}">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>
            </ul>

            <!-- Profile -->
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->routeIs('users.edit', $user->id) ? 'active' : '' }}"
                       href="{{ route('users.edit', $user->id) }}">
                        <i class="fa-solid fa-user"></i> My Profile
                    </a>
                </li>
            </ul>

            <!-- Attendance -->
 

            <!-- Exam Results -->
            <span class="system-menu__title">Exam</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->routeIs('student.results') ? 'active' : '' }}"
                       href="{{ route('student.results') }}">
                        <i class="fa-solid fa-file-lines"></i> Exam Results
                    </a>
                </li>
            </ul>

            <!-- Fees -->
            <span class="system-menu__title">Fees</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->routeIs('student.fee') ? 'active' : '' }}"
                       href="{{ route('student.fee') }}">
                        <i class="fa-solid fa-dollar-sign"></i> Fees
                    </a>
                </li>
            </ul>

            <!-- Leave -->
            <span class="system-menu__title">Leave</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->routeIs('student.userlist.*') ? 'active' : '' }}"
                       href="{{ route('student.userlist') }}">
                        <i class="fa-solid fa-pen-to-square"></i> Leave Application
                    </a>
                </li>
            </ul>

            <!-- Notices -->
       

        </div>
    </div>

    <!-- Footer -->
    @php
        use App\Models\OrganizationSetting;
        $setting = OrganizationSetting::first();
    @endphp

    @if($setting)
    <div class="sidebar-footer">
        <div class="sidebar-user d-flex align-items-center">
            <img src="{{ asset('storage/'.$setting->logo) }}"
                 class="rounded-circle me-2" style="width:40px;height:40px;">
            <div>
                <strong>{{ $setting->organization_name }}</strong><br>
                <small>{{ $setting->email }}</small>
            </div>
        </div>
    </div>
    @endif
</aside>
