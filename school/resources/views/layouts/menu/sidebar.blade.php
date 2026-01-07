  <aside class="sidebar">
      <div class="sidebar-start">
          <div class="sidebar-head">

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
              </ul>
              <!-- Students -->
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
                          <li><a href="{{ route('students.index') }}">All Students</a></li>
                           <li><a href="{{ route('students.create') }}">Add Students</a></li>
                          <li> <a href="{{ url('student_applications') }}">Online apply</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- Teachers -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-person-chalkboard"></i> Teachers
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li><a href="{{ route('teachers.index') }}"> All Teachers</a></li>
                           <li><a href="{{ route('teachers.create') }}"> Add Teachers</a></li>
                          <li><a href="{{ route('employees.index')}}"> All Employees</a></li>
                           <li><a href="{{ route('employees.create')}}"> Add Employees</a></li>
                      </ul>
                  </li>
              </ul>

              <!-- Classes -->

              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-landmark"></i> Classes
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('classes.index')}}">Class List</a> </li>


                      </ul>
                  </li>
              </ul>

              <!-- Sections -->


              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-puzzle-piece"></i> Sections
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">

                          <li> <a href="{{route('sections.index')}}">Section List</a> </li>

                      </ul>
                  </li>
              </ul>

              <!-- Subjects -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-diagram-next"></i> Subjects
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">

                          <li> <a href="{{route('subjects.index')}}">Subjects List</a> </li>

                      </ul>
                  </li>
              </ul>
              <!-- Attendance -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-clipboard-user"></i> Attendance
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
              </ul>

              <!-- Exams & Marks -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-flask-vial"></i> Exams & Marks
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{ url('marksheet') }}"> Mark Sheets</a> </li>
                          <li> <a href="{{ route('certificates.index') }}"> Certificates</a> </li>
                          <li> <a href="{{route('marks.index')}}">Mark List</a> </li>
                          <li> <a href="{{route('marks.create')}}">Mark Add</a> </li>
                          <li> <a href="{{route('exams.index')}}">Exams List</a> </li>
                          <li> <a href="{{route('marks.index')}}">Mark List</a> </li>
                          <li> <a href="{{route('marks.create')}}">Mark Add</a> </li>
                      </ul>
                  </li>
              </ul>

              <!-- Fees Management -->

              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-money-bill-1"></i> Fees Management
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('fee-types.index')}}">Fee Types</a> </li>
                          <li> <a href="{{route('fees.index')}}">Fees</a> </li>
                      </ul>
                  </li>
              </ul>
              <!-- Leave Applications -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-person-walking-arrow-right"></i> Leave Applications
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('leave.index')}}">Leave List</a> </li>
                      </ul>
                  </li>
              </ul>

              <!-- Users & Roles -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-user-lock"></i> Users & Roles
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{ route('users.index') }}">User List</a> </li>

                      </ul>
                  </li>
              </ul>
              <!-- setting  -->

              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-screwdriver-wrench"></i> Setting
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li> <a href="{{route('departments.index')}}">Departments List</a> </li>
                          <li> <a href="{{route('blood-groups.index')}}">Blood Groups</a> </li>
                      </ul>
                  </li>
              </ul>
              <!-- report -->
              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-calculator"></i> Reports
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
              </ul>






              <ul class="sidebar-body-menu">
                  <li>
                      <a class="show-cat-btn" href="##">
                          <i class="fa-solid fa-earth-oceania"></i> Web Site
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
                          <!-- <li> <a href="#">About</a></li> -->
                      </ul>
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
                  <span class="sidebar-user__title fw-bold">{{ $setting->owner_name }}</span>
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