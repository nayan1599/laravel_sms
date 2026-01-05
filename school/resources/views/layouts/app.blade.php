<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'My Laravel App')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <!-- Custom CSS -->
</head>

<body>
  <div class="layer"></div>
  <!-- ! Body -->
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- ! Sidebar -->
    @if(auth()->user()->role === 'admin')
    @include('layouts.menu.sidebar')
    @elseif(auth()->user()->role === 'teacher')
    @include('layouts.menu.teacher_menu')
    @elseif(auth()->user()->role === 'student')
    @include('layouts.menu.student_menu')
    @endif
    <div class="main-wrapper">
      <!-- ! Main nav -->
      @include('layouts.menu.top')
      <!-- ! Main -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          @yield('content')
        </div>
      </main>
      <!-- ! Footer -->
      @include('layouts.menu.footer')
    </div>
  </div>


  <!-- Scripts -->

  <!-- Custom JS -->
  <script src="{{ asset('plugins/chart.min.js') }}"></script>
  <script src="{{ asset('plugins/feather.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>