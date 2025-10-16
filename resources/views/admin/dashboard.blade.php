@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="hk-pg-wrapper">
    <div class="container-xxl mt-5 pt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">Welcome, {{ auth()->user()->name ?? 'Admin' }}</h4>
                        <p class="text-muted mb-0">You are logged into the admin dashboard.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


