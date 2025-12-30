 <h3>Welcome {{ auth()->user()->student->name }}</h3>

<a href="{{ route('student.result') }}">My Result</a> |
<a href="{{ route('student.fees') }}">My Fees</a>
