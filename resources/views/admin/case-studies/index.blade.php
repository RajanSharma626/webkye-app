@extends('admin.layouts.app')

@section('title', 'Case Studies')

@section('content')
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <div class="hk-pg-header d-flex justify-content-between align-items-center">
                <h4 class="hk-pg-title">Case Studies</h4>
                <a href="{{ route('admin.case-studies.create') }}" class="btn btn-sm btn-primary">Add Case Study</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle" id="caseStudiesTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Service</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($caseStudies as $caseStudy)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($caseStudy->cover_image) }}" class="img-fluid rounded"
                                                alt="Case Study Cover" style="width: 80px; height: auto;">
                                        </td>
                                        <td>{{ $caseStudy->title }}</td>
                                        <td>{{ $caseStudy->service }}</td>
                                        <td>{{ $caseStudy->start_date->format('M Y') }}</td>
                                        <td>
                                            @if ($caseStudy->is_ongoing)
                                                Ongoing
                                            @elseif($caseStudy->end_date)
                                                {{ $caseStudy->end_date->format('M Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.case-studies.edit', $caseStudy->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.case-studies.destroy', $caseStudy->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this case study?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No case studies found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#caseStudiesTable').DataTable();
        });
    </script>
@endsection
