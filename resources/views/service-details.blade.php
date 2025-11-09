@extends('layout.app')

@section('title', ($service->meta_title ?? $service->title) . ' | Webkye')
@section('description', $service->meta_description ?? $service->short_description)
@section('keywords', $service->meta_keywords ?? 'services, webkye')
@section('author', 'Webkye')
@section('content')

    <main>

        <!-- Service details area start here -->
        <section class="banner-inner-area">
            <div class="container">
                <div class="section-header-inner text-center mb-80">
                    @if ($service->subtitle)
                        <h5><span class="title-dot"></span>{{ $service->subtitle }}</h5>
                    @endif
                    <h2>{{ $service->title }}</h2>
                </div>
                <div class="image service-details__image">
                    @if ($service->banner)
                        <img src="{{ asset($service->banner) }}" alt="{{ $service->title }}">
                    @endif
                </div>
                <div class="service-details__wrp">
                    <p class="mb-30 mt-60">{{ $service->short_description }}</p>
                    <div class="service-details__content">
                        {!! $service->detail !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Service details area end here -->

        <!-- Book area start here -->
        @include('partials.book')
        <!-- Book area end here -->

    </main>

@endsection
