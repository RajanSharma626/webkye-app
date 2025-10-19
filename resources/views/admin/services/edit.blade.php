@extends('admin.layouts.app')

@section('title', 'Edit Service')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Edit Service</h4>
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
                    <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Service Fields -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sub Title</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $service->subtitle) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Detail</label>
                            <textarea name="detail" class="form-control ckeditor" rows="6" required>{{ old('detail', $service->detail) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Banner</label>
                            <input type="file" name="banner" class="form-control">
                            @if($service->banner)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->title }}" width="200">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}">
                        </div>

                        <!-- Meta Tags Section -->
                        <h5 class="mt-4">Meta Tags</h5>
                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $service->meta_title) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $service->meta_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3">{{ old('meta_keywords', $service->meta_keywords) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('detail');
    </script>
@endsection