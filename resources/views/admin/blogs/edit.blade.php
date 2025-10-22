@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Edit Blog</h4>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
                    <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <!-- Blog Fields -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control" value="{{ old('tags', $blog->tags) }}" placeholder="Separate tags with commas">
                        </div>

                        <!-- Image Upload Fields -->
                        <div class="mb-3">
                            <label class="form-label">Banner Image</label>
                            @if($blog->banner)
                                <div class="mb-2">
                                    <img src="{{ asset($blog->banner) }}" alt="Current Banner" class="img-fluid" style="max-height: 150px">
                                </div>
                            @endif
                            <input type="file" name="banner" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended size: 1920x400px</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Cover Image</label>
                            @if($blog->cover_image)
                                <div class="mb-2">
                                    <img src="{{ asset($blog->cover_image) }}" alt="Current Cover" class="img-fluid" style="max-height: 150px">
                                </div>
                            @endif
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended size: 800x600px</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Blog Content</label>
                            <textarea name="content" class="form-control ckeditor" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                        </div>

                        <!-- Meta Tags Section -->
                        <h5 class="mt-4">Meta Tags</h5>
                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3">{{ old('meta_keywords', $blog->meta_keywords) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            height: 300
        });
    </script>
@endsection