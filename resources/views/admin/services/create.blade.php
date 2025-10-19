@extends('admin.layouts.app')

@section('title', 'Add Service')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Add Service</h4>
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
                    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Meta SEO Fields -->
                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Sub Title</label>
                            <input type="text" name="meta_subtitle" class="form-control"
                                value="{{ old('meta_subtitle') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Short Description</label>
                            <textarea name="meta_short_description" class="form-control" rows="3">{{ old('meta_short_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content (CKEditor)</label>
                            <textarea name="content" class="form-control ckeditor" rows="6">{{ old('content') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}">
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
