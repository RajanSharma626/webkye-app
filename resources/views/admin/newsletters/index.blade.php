@extends('admin.layouts.app')

@section('title', 'Newsletter Subscribers')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Newsletter Subscribers <span class="badge badge-sm badge-soft-primary">{{ $newsletters->total() }}</span></h4>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle" id="newslettersTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Subscribed At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($newsletters as $newsletter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $newsletter->email }}</td>
                                        <td>{{ $newsletter->created_at->format('M d, Y h:i A') }}</td>
                                        <td>
                                            <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}"
                                                method="POST" style="display: inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No subscribers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-12">
                            <div class="text-end">
                                {{ $newsletters->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
