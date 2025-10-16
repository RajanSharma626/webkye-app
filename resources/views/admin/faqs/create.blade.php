@extends('admin.layouts.app')

@section('title', 'Add FAQ')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Add FAQ</h4>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
                    <form method="POST" action="{{ route('admin.faqs.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Question</label>
                            <input type="text" name="question" class="form-control" value="{{ old('question') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Answer</label>
                            <textarea name="answer" class="form-control" rows="6" required>{{ old('answer') }}</textarea>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Position</label>
                                <input type="number" name="position" class="form-control" value="{{ old('position', 0) }}"
                                    min="0">
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
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
