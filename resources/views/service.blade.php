@extends('layout.app')

@section('title', 'Services | Webkye')
@section('description', 'Services | Webkye | We offer a range of services to help you grow your business.')
@section('keywords',
    'services, webkye, web development, web development services, custom website development, website
    development company, professional web developers, responsive websites, web design and development, website development
    agency, SEO-friendly websites, front-end development, back-end development, web application development')
@section('author', 'Webkye')
@section('content')

    <main>

        <!-- Banner area start here -->
        <section class="banner-inner-area">
            <div class="container">
                <div class="banner-inner__content">
                    <a href='/home'>home</a><span>/Services</span>
                    <h2>Services</h2>
                    <p>We will help a client's problems to develop the products they have with high quality Change
                        the
                        appearance.</p>
                </div>
            </div>
        </section>
        <!-- Banner area end here -->

        <!-- Service area start here -->
        <section class="service-two-area pb-120">
            <div class="container">
                <div class="section-header text-center mb-80">
                    <h2 class="fw-300">Grow Your Business with Our <br> Exceptional Services</h2>
                </div>
                <div class="row g-4">
                    @forelse ($services as $service)
                        <div class="col-lg-6">
                            <div class="service-two__item bg{{ (($loop->iteration - 1) % 6) + 1 }}">
                                @if ($service->icon)
                                    @php
                                        $icon = $service->icon;
                                        $isImage = \Illuminate\Support\Str::endsWith($icon, [
                                            '.png',
                                            '.jpg',
                                            '.jpeg',
                                            '.gif',
                                            '.svg',
                                        ]);
                                        $isUrl = \Illuminate\Support\Str::startsWith($icon, ['http://', 'https://']);
                                    @endphp
                                    <div class="icon">
                                        @if ($isImage || $isUrl)
                                            <img src="{{ $isUrl ? $icon : asset($icon) }}" alt="{{ $service->title }}">
                                        @else
                                            {!! $icon !!}
                                        @endif
                                    </div>
                                @elseif ($service->banner)
                                    <div class="icon">
                                        <img src="{{ asset($service->banner) }}" alt="{{ $service->title }}">
                                    </div>
                                @endif
                                <div class="service-two__content">
                                    <h3 class="mb-10">{{ $service->title }}</h3>
                                    <p class="mb-20">{{ \Illuminate\Support\Str::limit($service->short_description, 160) }}
                                    </p>
                                    <a class="explore-btn" href="{{ route('services.show', $service->slug) }}">Explore more
                                        <i class="fa-light ms-1 fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center">
                                <p>No services available right now. Please check back later.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Service area end here -->

        <!-- About area start here -->
        <section class="about-area pt-120 pb-120">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="about__image">
                            <img class="w-100" src="assets/images/about/about-image.png" alt="image">
                            <img class="about-line" src="assets/images/shape/about-three-shape.png" alt="shape">
                            <img class="about-kit" src="assets/images/about/about-three-kit.png" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__item-right">
                            <div class="section-header">
                                <h5>Why Choose Us?</h5>
                                <h2 class="fw-300">Our Tailored Strategies for Your Success</h2>
                                <p>Crafting precision in every detail, our tailored strategies pave the way for your
                                    unparalleled success in the digital
                                    landscape.</p>
                            </div>
                            <ul class="mt-40">
                                <li class="d-flex align-items-center gap-4">
                                    <div class="icon bg1"><img src="assets/images/icon/about-icon1.png" alt="icon">
                                    </div>
                                    <div>
                                        <h3>First Working Process</h3>
                                        <p>We analyze your needs, setting the stage for a bespoke and impactful SEO
                                            strategy.</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-4">
                                    <div class="icon bg2"><img src="assets/images/icon/about-icon2.png" alt="icon">
                                    </div>
                                    <div>
                                        <h3>Dedicated Expert Team</h3>
                                        <p>Empower your success with our dedicated expert team, committed to
                                            navigating
                                            the complexities of SEO.</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-4">
                                    <div class="icon bg3"><img src="assets/images/icon/about-icon3.png" alt="icon">
                                    </div>
                                    <div>
                                        <h3>24/7 Customer Support</h3>
                                        <p>Experience peace of mind with our 24/7 customer support, ensuring prompt
                                            assistance and personalized service.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About area end here -->

        <!-- Process area start here -->
        <section class="process-area pb-120">
            <div class="container">
                <div class="d-flex flex-wrap mb-80 justify-content-between align-items-end gap-3">
                    <div class="section-header">
                        <h5>Map Your Roadmap</h5>
                        <h2 class="fw-300">Our Proven Work Process</h2>
                    </div>
                    <p>Our Proven Work Process blends experience, precision, <br> and innovation for consistently
                        outstanding results.</p>
                </div>
                <div class="process__wrp">
                    <div class="process__line">
                        <img src="assets/images/shape/process-line.png" alt="line">
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-4">
                            <div class="process__item">
                                <div class="process__number bg1">
                                    <h4>1</h4>
                                </div>
                                <h3 class="mb-10 mt-25">Keyword Research</h3>
                                <p class="fs-16">We pinpoint and leverage the most impactful <br> terms, aligning
                                    your
                                    content
                                    seamlessly.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="process__item">
                                <div class="process__number">
                                    <h4>2</h4>
                                    <img src="assets/images/shape/process-circle.png" alt="image">
                                </div>
                                <h3 class="mb-10 mt-25">Link Building</h3>
                                <p class="fs-16">We secure high-quality backlinks, boosting <br> your site's
                                    credibility
                                    and
                                    contributing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="process__item">
                                <div class="process__number bg3">
                                    <h4>3</h4>
                                </div>
                                <h3 class="mb-10 mt-25">Fast Ranking</h3>
                                <p class="fs-16">Our goal is clear - secure top rankings. Through meticulous
                                    optimization.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Process area end here -->

        <!-- Book area start here -->
        @include('partials.book')
        <!-- Book area end here -->

    </main>

@endsection
