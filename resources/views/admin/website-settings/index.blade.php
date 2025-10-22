@extends('admin.layouts.app')

@section('title', 'Website Setting')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Website Settings</h4>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">

                        <form action="{{ route('admin.website-settings.update') }}" method="POST"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                        data-bs-target="#general" type="button" role="tab" aria-controls="general"
                                        aria-selected="true">General</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                        type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Contact</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social"
                                        type="button" role="tab" aria-controls="social" aria-selected="false">Social
                                        Media</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                        type="button" role="tab" aria-controls="seo" aria-selected="false">SEO</button>
                                </li>
                            </ul>

                            <div class="tab-content mt-4" id="settingsTabContent">
                                <!-- General Settings Tab -->
                                <div class="tab-pane fade show active" id="general" role="tabpanel"
                                    aria-labelledby="general-tab">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 col-form-label">Site Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="site_name"
                                                value="{{ $setting->site_name ?? '' }}" required>
                                            <div class="invalid-feedback">Please provide a site name</div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-sm-3 col-form-label">Logo</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="logo" accept="image/*">
                                            <small class="text-muted">Recommended size: 200x60px</small>
                                            @if (isset($setting->logo))
                                                <div class="mt-2">
                                                    <img src="{{ asset($setting->logo) }}" alt="Logo"
                                                        class="img-thumbnail" style="max-height: 50px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Footer Logo</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="footer_logo">
                                            @if (isset($setting->footer_logo))
                                                <div class="mt-2">
                                                    <img src="{{ asset($setting->footer_logo) }}" alt="Footer Logo"
                                                        style="max-height: 50px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Favicon</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="favicon">
                                            @if (isset($setting->favicon))
                                                <div class="mt-2">
                                                    <img src="{{ asset($setting->favicon) }}" alt="Favicon"
                                                        style="max-height: 32px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information Tab -->
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contact Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="contact_phone"
                                                value="{{ $setting->contact_phone ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Contact Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="contact_email"
                                                value="{{ $setting->contact_email ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" rows="3">{{ $setting->address ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Location URL (Google
                                            Maps)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="location_url"
                                                value="{{ $setting->location_url ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Media Tab -->
                                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Facebook URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="facebook_url"
                                                value="{{ $setting->facebook_url ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">LinkedIn URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="linkedin_url"
                                                value="{{ $setting->linkedin_url ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Instagram URL</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="instagram_url"
                                                value="{{ $setting->instagram_url ?? '' }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO Tab -->
                                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Meta Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="meta_title"
                                                value="{{ $setting->meta_title ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Meta Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="meta_description" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Meta Keywords</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="meta_keywords" rows="3">{{ $setting->meta_keywords ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">OG Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="og_image">
                                            @if (isset($setting->og_image))
                                                <div class="mt-2">
                                                    <img src="{{ asset($setting->og_image) }}" alt="OG Image"
                                                        style="max-height: 100px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-2"></i>Save Settings
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Form validation
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    var forms = document.getElementsByClassName('needs-validation');
                    Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                });

                // Bootstrap 5 tab functionality
                var triggerTabList = [].slice.call(document.querySelectorAll('#settingsTabs button'))
                triggerTabList.forEach(function(triggerEl) {
                    var tabTrigger = new bootstrap.Tab(triggerEl)
                    triggerEl.addEventListener('click', function(event) {
                        event.preventDefault()
                        tabTrigger.show()
                    })
                })
            })();
        </script>
    @endpush
@endsection
