@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="hk-pg-wrapper">
	<div class="container-xxl">
		<div class="hk-pg-header d-flex justify-content-between align-items-center">
			<h4 class="hk-pg-title">Edit Testimonial</h4>
			<a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">Back</a>
		</div>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul class="mb-0">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row g-3">
						<div class="col-md-3">
							<label class="form-label">Star (1-5)</label>
							<input type="number" name="star" class="form-control" value="{{ old('star', $testimonial->star) }}" min="1" max="5" required>
						</div>
						<div class="col-md-9">
							<label class="form-label">Title</label>
							<input type="text" name="title" class="form-control" value="{{ old('title', $testimonial->title) }}" required>
						</div>
					</div>

					<div class="mb-3 mt-3">
						<label class="form-label">Comment</label>
						<textarea name="comment" class="form-control" rows="5" required>{{ old('comment', $testimonial->comment) }}</textarea>
					</div>

					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">Name</label>
							<input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Designation</label>
							<input type="text" name="designation" class="form-control" value="{{ old('designation', $testimonial->designation) }}">
						</div>
					</div>

					<div class="row g-3 mt-1">
						<div class="col-md-6">
							<label class="form-label">Profile Image</label>
							<input type="file" name="profile" class="form-control" accept="image/*">
							@if ($testimonial->profile)
								<div class="mt-2">
									<img src="{{ asset('storage/'.$testimonial->profile) }}" alt="Profile" height="60" class="rounded">
								</div>
							@endif
						</div>
						<div class="col-md-3">
							<label class="form-label">Position</label>
							<input type="number" name="position" class="form-control" value="{{ old('position', $testimonial->position) }}" min="0">
						</div>
						<div class="col-md-3 d-flex align-items-center">
							<div class="form-check mt-4">
								<input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
								<label class="form-check-label" for="is_active">Active</label>
							</div>
						</div>
					</div>

					<div class="mt-4">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
