@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="hk-pg-wrapper">
	<div class="container-xxl">
		<div class="hk-pg-header d-flex justify-content-between align-items-center">
			<h4 class="hk-pg-title">Testimonials</h4>
			<div class="d-flex gap-2">
				<a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">Add Testimonial</a>
			</div>
		</div>

		@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped align-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Star</th>
								<th>Title</th>
								<th>Name</th>
								<th>Active</th>
								<th>Position</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($testimonials as $t)
							<tr>
								<td>{{ $t->id }}</td>
								<td>{{ $t->star }}</td>
								<td>{{ $t->title }}</td>
								<td>{{ $t->name }}</td>
								<td>
									<span class="badge {{ $t->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $t->is_active ? 'Yes' : 'No' }}</span>
								</td>
								<td>{{ $t->position }}</td>
								<td class="d-flex gap-2">
									<a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-outline-primary">Edit</a>
									<form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial?')">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="7" class="text-center">No testimonials found.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="mt-3">{{ $testimonials->links() }}</div>
			</div>
		</div>
	</div>
</div>
@endsection
