@php
use App\Models\Student;   
use App\Models\Teachers;
use App\Models\Employee;

$totalStudents = Student::count();
$totalTeachers = Teachers::count();
$totalEmployees = Employee::count();
$activeClasses = 12; // ডায়নামিক হলে এখানে কোড বসান
@endphp

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">📊 Student - Teacher Interaction</h2>
            <p class="text-muted">A quick overview of your school statistics</p>
        </div>

        <div class="row g-4">
            <!-- Total Students -->
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm border-0 text-center p-4 rounded-4 h-100">
                    <div class="card-body">
                        <div class="display-4 text-primary mb-2">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h5 class="card-title">Total Students</h5>
                        <h3 class="fw-bold text-dark">{{ $totalStudents ?? '0' }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Teachers -->
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm border-0 text-center p-4 rounded-4 h-100">
                    <div class="card-body">
                        <div class="display-4 text-success mb-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <h5 class="card-title">Total Teachers</h5>
                        <h3 class="fw-bold text-dark">{{ $totalTeachers ?? '0' }}</h3>
                    </div>
                </div>
            </div>

            <!-- Active Classes -->
            <div class="col-md-4 col-sm-12">
                <div class="card shadow-sm border-0 text-center p-4 rounded-4 h-100">
                    <div class="card-body">
                        <div class="display-4 text-warning mb-2">
                            <i class="bi bi-journal-bookmark-fill"></i>
                        </div>
                        <h5 class="card-title">Total Employees</h5>
                        <h3 class="fw-bold text-dark">{{ $totalEmployees ?? '0' }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap Icon CDN -->
