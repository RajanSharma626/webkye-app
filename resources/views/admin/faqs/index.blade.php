@extends('admin.layouts.app')

@section('title', 'FAQs')

@section('content')
<div class="hk-pg-wrapper">
	<div class="container-xxl">
		<div class="hk-pg-header d-flex justify-content-between align-items-center">
			<h4 class="hk-pg-title">FAQs</h4>
			<div class="d-flex gap-2">
				<a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">Add FAQ</a>
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
								<th>Question</th>
								<th>Active</th>
								<th>Position</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($faqs as $faq)
							<tr>
								<td>{{ $faq->id }}</td>
								<td>{{ $faq->question }}</td>
								<td>
									<span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-secondary' }}">
										{{ $faq->is_active ? 'Yes' : 'No' }}
									</span>
								</td>
								<td>{{ $faq->position }}</td>
								<td class="d-flex gap-2">
									<a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">Edit</a>
									<form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" onsubmit="return confirm('Delete this FAQ?')">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5" class="text-center">No FAQs found.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="mt-3">{{ $faqs->links() }}</div>
			</div>
		</div>
	</div>
</div>
@endsection


