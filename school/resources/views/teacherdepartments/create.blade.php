@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Create Teacher Department</div>

				<div class="card-body">
					<form method="POST" action="{{ route('teacherdepartments.store') }}">
						@csrf

						<div class="form-group mb-3">
							<label for="name">Department Name</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>

						<button type="submit" class="btn btn-primary">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
