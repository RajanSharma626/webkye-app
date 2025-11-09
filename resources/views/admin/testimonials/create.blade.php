@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
<div class="hk-pg-wrapper">
	<div class="container-xxl">
		<div class="hk-pg-header d-flex justify-content-between align-items-center">
			<h4 class="hk-pg-title">Add Testimonial</h4>
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
				<form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
					@csrf

					<div class="row g-3">
						<div class="col-md-3">
							<label class="form-label">Star (1-5)</label>
							<input type="number" name="star" class="form-control" value="{{ old('star') }}" min="1" max="5" required>
						</div>
						<div class="col-md-9">
							<label class="form-label">Title</label>
							<input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
						</div>
					</div>

					<div class="mb-3 mt-3">
						<label class="form-label">Comment</label>
						<textarea name="comment" class="form-control" rows="5" required>{{ old('comment') }}</textarea>
					</div>

					<div class="mb-3">
						<label class="form-label">Related Case Study</label>
						<select name="case_study_id" class="form-select">
							<option value="">-- None --</option>
							@foreach ($caseStudies as $caseStudy)
								<option value="{{ $caseStudy->id }}" {{ old('case_study_id') == $caseStudy->id ? 'selected' : '' }}>
									{{ $caseStudy->title }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">Name</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Designation</label>
							<input type="text" name="designation" class="form-control" value="{{ old('designation') }}">
						</div>
					</div>

					<div class="row g-3 mt-1">
						<div class="col-md-6">
							<label class="form-label">Profile Image</label>
							<input type="file" name="profile" class="form-control" accept="image/*">
						</div>
						<div class="col-md-3">
							<label class="form-label">Position</label>
							<input type="number" name="position" class="form-control" value="{{ old('position', 0) }}" min="0">
						</div>
						<div class="col-md-3 d-flex align-items-center">
							<div class="form-check mt-4">
								<input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
								<label class="form-check-label" for="is_active">Active</label>
							</div>
						</div>
					</div>

					<div class="mt-4">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
