@extends('layout.app')

@section('title', 'Case Studies | Webkye')
@section('description', 'Case Studies | Webkye | We showcase our case studies and success stories.')
@section('keywords',
    'case studies, webkye, web development, web development services, custom website development, website
    development company, professional web developers, responsive websites, web design and development, website development
    agency, SEO-friendly websites, front-end development, back-end development, web application development')
@section('author', 'Webkye')
@section('content')

    <main>

        <!-- Banner area start here -->
        <section class="banner-inner-area">
            <div class="container">
                <div class="banner-inner__content">
                    <span><a href='{{ route('home') }}'>Home</a></span><span>/</span><a href='{{ route('case-studies') }}'>Case Studies</a><span>/Case Details</span>
                    <h2> {{ $caseStudy->title }} </h2>
                    <p class="mb-0"> {{ $caseStudy->service }} </p>
                </div>
            </div>
        </section>
        <!-- Banner area end here -->

        <!-- Case details area start here -->
        <section class="case-details-area pb-120">
            <div class="container">
                <div class="image case-details__image">
                    <img src="{{ asset($caseStudy->cover_image) }}" alt="{{ $caseStudy->title }}">
                </div>
                <div class="case-details__wrp">
                    <div class="case-details__info pt-60 pb-60 bor-top mt-60">

                        <div>
                            <h5>Service</h5>
                            <span> {{ $caseStudy->service }} </span>
                        </div>
                        <div>
                            <h5>Project Timeline</h5>
                            <span>2023-2024</span>
                        </div>
                    </div>
                    <h3>Project Brief</h3>
                    <div class="mb-5">
                    {!! $caseStudy->project_brief !!}
                    </div>
                    <div class="case-details__testimonial mb-60 bg-image" data-background="assets/images/case/bg-image.png">
                        <p> {{ $caseStudy->testimonials->first()->comment }} </p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-2 w-100 align-items-center"><img class="rounded-circle" style="width: 28px; height: 28px;" src="{{ asset($caseStudy->testimonials->first()->profile) }}"
                                    alt="image">
                                <h5><a class="text-white" href="#0"> {{ $caseStudy->testimonials->first()->name }} </a></h5><span
                                    class="paragraph-light">, {{ $caseStudy->testimonials->first()->designation }}</span>
                            </div>
                            <svg width="52" height="40" viewBox="0 0 52 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M51.0467 23.7413L43.765 38.2763C43.2833 39.2396 42.2917 39.8346 41.2433 39.8346H33.9617C32.9133 39.8346 32.2333 38.7296 32.6867 37.7946L40.1667 22.8346H33.0833C30.7317 22.8346 28.8333 20.9363 28.8333 18.5846V4.41797C28.8333 2.0663 30.7317 0.167969 33.0833 0.167969H47.25C49.6017 0.167969 51.5 2.0663 51.5 4.41797V21.843C51.5 22.4946 51.3583 23.1463 51.0467 23.7413ZM23.1667 21.843V4.41797C23.1667 2.0663 21.2683 0.167969 18.9167 0.167969H4.75C2.39833 0.167969 0.5 2.0663 0.5 4.41797V18.5846C0.5 20.9363 2.39833 22.8346 4.75 22.8346H11.8333L4.35333 37.7946C3.87167 38.7296 4.57999 39.8346 5.62833 39.8346H12.91C13.9867 39.8346 14.9783 39.2396 15.4317 38.2763L22.7133 23.7413C22.9967 23.1463 23.1667 22.4946 23.1667 21.843Z"
                                    fill="white" fill-opacity="0.4" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Case details area end here -->

        @if(isset($otherCaseStudies) && $otherCaseStudies->isNotEmpty())
            <!-- Story area start here -->
            <section class="story-area pb-120">
                <div class="container bor-top pt-120">
                    <div class="section-header-flex line-title mb-80">
                        <h2 class="fw-300">More Case Studies</h2>
                        <div><a href="{{ route('case-studies') }}" class="btn-three">Explore More<i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="row g-5 align-items-star">
                        @foreach ($otherCaseStudies as $other)
                            <div class="col-lg-6">
                                <div class="story__item inner-page">
                                    <div class="image">
                                        @if ($other->cover_image)
                                            <img src="{{ asset($other->cover_image) }}" alt="{{ $other->title }}">
                                        @else
                                            <img src="assets/images/story/story-image1.png" alt="{{ $other->title }}">
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between mt-20">
                                        <div>
                                            <h3 class="mb-2"><a href="{{ route('case-studies.show', $other->slug) }}">{{ $other->title }}</a></h3>
                                            <div class="story__info">
                                                <ul>
                                                    <li>{{ $other->service }}</li>
                                                    <li class="li-dot"></li>
                                                    <li>{{ $other->is_ongoing ? 'Ongoing' : 'Completed' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div> <a href="{{ route('case-studies.show', $other->slug) }}" class="btn-one">View Case
                                                <span>
                                                    <i class="fa-regular fa-arrow-up-right arry1"></i>
                                                    <i class="fa-regular fa-arrow-up-right arry2"></i>
                                                </span>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Story area end here -->
        @endif

        <!-- Book area start here -->
        @include('partials.book')
        <!-- Book area end here -->

    </main>

@endsection
