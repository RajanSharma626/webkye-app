@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Services</h4>
                <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary">Add Service</a>
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
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Short Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>fsdf</td>
                                    <td>dss</td>
                                    <td>fs</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Delete this service?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                {{-- @empty
                            <tr>
                                <td colspan="5" class="text-center">No messages found.</td>
                            </tr>
							@endforelse --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
