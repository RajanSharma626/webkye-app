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
                    <a href='/home'>home</a><span>/Case Study</span>
                    <h2>Case Study</h2>
                    <p>We will help a client's problems to develop the products they have with high quality Change
                        the
                        appearance.</p>
                </div>
            </div>
        </section>
        <!-- Banner area end here -->

        <!-- Story area start here -->
        <section class="story-area pb-120">
            <div class="container">
                <div class="section-header-flex line-title mb-80">
                    <h2 class="fw-300">Our Case Studies and <br> <span>Success Stories</span></h2>
                    <p>Delve into real-world examples where our Technology Solutions, Consulting and Strategy, Data
                        Analytics, Product Development, and Financial Consulting services have sparked innovation,
                        and
                        achieved remarkable results.</p>
                </div>
                <div class="swiper story__slider">
                    <div class="swiper-wrapper">
                        @if ($caseStudies->count() > 0)
                            @foreach ($caseStudies->chunk(4) as $chunk)
                                <div class="swiper-slide">
                                    <div class="row g-5 align-items-star">
                                        @foreach ($chunk as $index => $caseStudy)
                                            <div class="col-lg-6">
                                                <div class="story__item inner-page {{ $index == 2 ? 'mt-minus' : '' }}">
                                                    <div class="image">
                                                        @if ($caseStudy->cover_image)
                                                            <img src="{{ asset($caseStudy->cover_image) }}"
                                                                alt="{{ $caseStudy->title }}">
                                                        @else
                                                            <img src="assets/images/story/story-image1.png" alt="{{ $caseStudy->title }}">
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center flex-wrap gap-3 justify-content-between mt-20">
                                                        <div>
                                                            <h3 class="mb-2"><a href="{{ route('case-studies.show', $caseStudy->slug) }}">{{ $caseStudy->title }}</a>
                                                            </h3>
                                                            <div class="story__info">
                                                                <ul>
                                                                    <li>{{ $caseStudy->service }}</li>
                                                                    <li class="li-dot"></li>
                                                                    <li>{{ $caseStudy->is_ongoing ? 'Ongoing' : 'Completed' }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div> <a href="{{ route('case-studies.show', $caseStudy->slug) }}" class="btn-one">View
                                                                Case
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
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <div class="row g-5 align-items-star">
                                    <div class="col-lg-6">
                                        <div class="story__item inner-page">
                                            <div class="image">
                                                <img src="assets/images/story/story-image1.png" alt="image">
                                            </div>
                                            <div
                                                class="d-flex align-items-center flex-wrap gap-3 justify-content-between mt-20">
                                                <div>
                                                    <h3 class="mb-2"><a href="#0">Dashboard Analytics</a></h3>
                                                    <div class="story__info">
                                                        <ul>
                                                            <li>UI/UX Design</li>
                                                            <li class="li-dot"></li>
                                                            <li>Development</li>
                                                            <li class="li-dot"></li>
                                                            <li>Creative Service</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div> <a href="#0" class="btn-one">View Case
                                                        <span>
                                                            <i class="fa-regular fa-arrow-up-right arry1"></i>
                                                            <i class="fa-regular fa-arrow-up-right arry2"></i>
                                                        </span>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>

            </div>
        </section>
        <!-- Story area end here -->

        <!-- Book area start here -->
        @include('partials.book')
        <!-- Book area end here -->

    </main>
@endsection
