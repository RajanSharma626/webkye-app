@extends('admin.layouts.app')

@section('title', 'Edit Case Study')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Edit Case Study</h4>
                <a href="{{ route('admin.case-studies.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
                    <form method="POST" action="{{ route('admin.case-studies.update', $caseStudy->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Case Study Fields -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $caseStudy->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service</label>
                            <input type="text" name="service" class="form-control" value="{{ old('service', $caseStudy->service) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="month" name="start_date" class="form-control" value="{{ old('start_date', $caseStudy->start_date ? $caseStudy->start_date->format('Y-m') : '') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="month" name="end_date" class="form-control" value="{{ old('end_date', $caseStudy->end_date ? $caseStudy->end_date->format('Y-m') : '') }}" {{ $caseStudy->is_ongoing ? 'disabled' : '' }}>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_ongoing" id="is_ongoing" value="1" {{ old('is_ongoing', $caseStudy->is_ongoing) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_ongoing">
                                        Ongoing Project
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project Brief</label>
                            <textarea name="project_brief" class="form-control ckeditor" rows="6" required>{{ old('project_brief', $caseStudy->project_brief) }}</textarea>
                        </div>
                        
                        <!-- Image Upload Fields -->
                        <div class="mb-3">
                            <label class="form-label">Banner Image</label>
                            <input type="file" name="banner" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended size: 1920x400px</small>
                            @if($caseStudy->banner)
                                <div class="mt-2">
                                    <img src="{{ asset($caseStudy->banner) }}" alt="Current Banner" style="max-height: 100px;">
                                    <p class="mb-0">Current banner image</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended size: 800x600px</small>
                            @if($caseStudy->cover_image)
                                <div class="mt-2">
                                    <img src="{{ asset($caseStudy->cover_image) }}" alt="Current Cover" style="max-height: 100px;">
                                    <p class="mb-0">Current cover image</p>
                                </div>
                            @endif
                        </div>

                        <!-- Meta Tags Section -->
                        <h5 class="mt-4">Meta Tags</h5>
                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $caseStudy->meta_title) }}">

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $caseStudy->meta_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="3">{{ old('meta_keywords', $caseStudy->meta_keywords) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Case Study</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('project_brief');
        
        // Toggle end date field based on ongoing checkbox
        $('#is_ongoing').change(function() {
            if(this.checked) {
                $('input[name="end_date"]').prop('disabled', true);
            } else {
                $('input[name="end_date"]').prop('disabled', false);
            }
        });
    </script>
@endsection