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

                        <!-- Service Fields -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sub Title</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Detail</label>
                            <textarea name="detail" class="form-control ckeditor" rows="6" required>{{ old('detail') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Icon (SVG HTML Code)</label>
                            <textarea name="icon" class="form-control" rows="6" placeholder="Paste SVG code here">{{ old('icon') }}</textarea>
                            <small class="text-muted">Paste the complete SVG HTML code for the service icon</small>
                        </div>
                        
                        <!-- Meta SEO Fields -->
                        <h5 class="mt-4 mb-3">Meta Tags</h5>
                        
                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}" placeholder="Separate keywords with commas">
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('detail');
    });
</script>
@endsection
