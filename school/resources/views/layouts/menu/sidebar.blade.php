  <aside class="sidebar">
      <div class="sidebar-start">
          <div class="sidebar-head">
              <a href="/" class="logo-wrapper" title="Home">
                  <span class="sr-only">Home</span>
                  <span class="icon logo" aria-hidden="true"></span>
                  <div class="logo-text">
                      <span class="logo-title">Elegant</span>
                      <span class="logo-subtitle">Dashboard</span>
                  </div>

              </a>
              <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                  <span class="sr-only">Toggle menu</span>
                  <span class="icon menu-toggle" aria-hidden="true"></span>
              </button>
          </div>
          <div class="sidebar-body">
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                          <span class="icon home" aria-hidden="true"></span>Dashboard
                      </a>
                  </li>
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon document" aria-hidden="true"></span>Students
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li>
                              <a class="{{ request()->is('students') || request()->is('students/*') ? 'active' : '' }}" href="{{ route('students.index') }}">All Students</a>
                          </li>
                          <li>
                              <a class="{{ request()->is('students/create') ? 'active' : '' }}" href="{{ route('students.create') }}">Add new Student</a>
                          </li>
                      </ul>
                  </li>

                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon folder" aria-hidden="true"></span>Tachers
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li>
                              <a href="{{ route('teachers.index')}}">All Teacher</a>
                          </li>
                          <li>
                              <a href="{{ route('teachers.create')}}">Add New Teacher</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon image" aria-hidden="true"></span>Employees
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li>
                              <a href="{{ route('employees.index')}}">All Employees</a>
                          </li>
                          <li>
                              <a href="{{ route('employees.create')}}">Add Employees</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon paper" aria-hidden="true"></span>Web Site
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('menus.index')}}">Menu</a> </li>
                          <li> <a href="{{route('banners.index')}}">Banner</a></li>
                          <li> <a href="{{route('categories.index')}}">categories</a></li>
                          <li> <a href="{{route('posts.index')}}">Pages</a></li>
                          <li> <a href="{{route('notices.index')}}">Notices</a> </li>
                          <li> <a href="{{route('committees.index')}}">Committees</a> </li>
                          <!-- <li> <a href="#">About</a></li> -->
                      </ul>
                  </li>

              </ul>
              <span class="system-menu__title">Class Setting</span>
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon category" aria-hidden="true"></span>Class & Exam
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('subjects.index')}}">Subjects List</a> </li>
                          <li> <a href="{{route('sections.index')}}">Section List</a> </li>
                          <li> <a href="{{route('classes.index')}}">Class List</a> </li>
                          <li> <a href="{{route('exams.index')}}">Exams List</a> </li>
                          <li> <a href="{{route('marks.index')}}">Mark List</a> </li>
                      </ul>
                  </li>
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon user-3" aria-hidden="true"></span>attendance
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('teacherattendance.index')}}">Teachers Attendance</a> </li>
                          <li> <a href="{{route('attendance.index')}}">Students Attendance</a> </li>
                      </ul>
                  </li>
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon user-3" aria-hidden="true"></span>Report
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{ route('attendance.report') }}">Attendance Students</a></li>
                          <li> <a href="{{ route('attendance.monthly') }}"> Date Attendance Students </a></li>
                      </ul>
                  </li>

                  <!-- setting section  -->
                  <li>
                      <a class="show-cat-btn" href="##">
                          <span class="icon setting" aria-hidden="true"></span>Setting
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('departments.index')}}">Departments List</a> </li>
                          <li> <a href="{{route('blood-groups.index')}}">Blood Groups</a> </li>
                          <li> <a href="{{route('fee-types.index')}}">Fee Types</a> </li>

                      </ul>
                  </li>
                  <li> <a href="{{route('fees.index')}}"><span class="icon setting" aria-hidden="true"></span>Fees</a> </li>
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
                  <span class="sidebar-user__title fw-bold">{{ $setting->owner_name }}</span>
                  <span class="sidebar-user__subtitle text-muted">
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