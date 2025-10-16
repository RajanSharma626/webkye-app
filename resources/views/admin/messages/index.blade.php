@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="hk-pg-wrapper">
	<div class="container-xxl">
		<div class="hk-pg-header d-flex justify-content-between align-items-center">
			<h4 class="hk-pg-title">Contact Messages</h4>
		</div>

		@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
                    <table class="table align-middle" id="messagesTable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Company</th>
                                <th>Message</th>
							</tr>
						</thead>
						<tbody>
                            @forelse ($messages as $m)
                            <tr class="{{ $m->is_read ? '' : 'table-success' }}">
								<td>{{ $m->name }}</td>
								<td>{{ $m->email }}</td>
								<td>{{ $m->phone }}</td>
								<td>{{ $m->company }}</td>
                                <td>
                                    <button type="button" class="btn btn-link p-0 align-baseline" data-bs-toggle="modal" data-bs-target="#viewMessageModal" data-message='@json($m)'>
                                        @if ($m->is_read)
                                            <i class="bi bi-envelope-open text-secondary me-1"></i>
                                        @else
                                            <i class="bi bi-envelope-fill text-success me-1"></i>
                                        @endif
                                    </button>
                                </td>
							</tr>
							@empty
                            <tr>
                                <td colspan="5" class="text-center">No messages found.</td>
                            </tr>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="mt-3">{{ $messages->links() }}</div>
			</div>
		</div>
	</div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewMessageModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Message</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
            <div class="modal-body">
                <p id="m_message" class="mb-0 text-break" style="white-space: pre-wrap;"></p>
            </div>
            <div class="modal-footer">
                <form id="markReadForm" method="POST" class="me-auto">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success btn-sm">Mark Read</button>
                </form>
                <form id="deleteForm" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </div>
		</div>
	</div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var viewModal = document.getElementById('viewMessageModal');
    viewModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var data = JSON.parse(button.getAttribute('data-message'));
        document.getElementById('m_message').textContent = data.message || '';

        // set form actions
        document.getElementById('markReadForm').setAttribute('action', '{{ url('/admin-panel/messages') }}/' + data.id + '/read');
        document.getElementById('deleteForm').setAttribute('action', '{{ url('/admin-panel/messages') }}/' + data.id);
    });
});
</script>
@endpush
@endsection


