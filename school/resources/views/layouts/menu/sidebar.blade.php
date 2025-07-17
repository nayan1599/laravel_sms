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
                          <span class="icon paper" aria-hidden="true"></span>Pages
                          <span class="category__btn transparent-btn" title="Open list">
                              <span class="sr-only">Open list</span>
                              <span class="icon arrow-down" aria-hidden="true"></span>
                          </span>
                      </a>
                      <ul class="cat-sub-menu">
                          <li>
                              <a href="pages.html">All pages</a>
                          </li>
                          <li>
                              <a href="new-page.html">Add new page</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="comments.html">
                          <span class="icon message" aria-hidden="true"></span>
                          Comments
                      </a>
                      <span class="msg-counter">7</span>
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


                          <li> <a href="users-02.html">Add New Exams</a> </li>
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
                      </ul>
                  </li>



                  <li> <a href="{{route('fees.index')}}"><span class="icon setting" aria-hidden="true"></span>Fees</a> </li>
              </ul>
          </div>
      </div>
      <div class="sidebar-footer">
          <a href="##" class="sidebar-user">
              <span class="sidebar-user-img">
                  <picture>
                      <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                  </picture>
              </span>
              <div class="sidebar-user-info">
                  <span class="sidebar-user__title">Nafisa Sh.</span>
                  <span class="sidebar-user__subtitle">Support manager</span>
              </div>
          </a>
      </div>
  </aside>