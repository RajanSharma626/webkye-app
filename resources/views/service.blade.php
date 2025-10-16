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
                    <div class="col-lg-6">
                        <div class="service-two__item bg1">
                            <div class="icon">
                                <img src="assets/images/icon/service-icon1.png" alt="icon">
                            </div>
                            <div class="service-two__content">
                                <h3 class="mb-10">Social Media Marketing</h3>
                                <p class="mb-20">Leverage the power of social media platforms to connect with your
                                    audience
                                    and drive
                                    engagement.</p>
                                <a class="explore-btn" href="#0">Explore more <i
                                        class="fa-light ms-1 fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-two__item bg2">
                            <div class="icon">
                                <img src="assets/images/icon/service-icon2.png" alt="icon">
                            </div>
                            <div class="service-two__content">
                                <h3 class="mb-10">Email Marketing Services</h3>
                                <p class="mb-20">Nurture leads and build customer loyalty through personalized and
                                    effective email campaigns.</p>
                                <a class="explore-btn" href="#0">Explore more <i
                                        class="fa-light ms-1 fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-two__item bg3">
                            <div class="icon">
                                <img src="assets/images/icon/service-icon3.png" alt="icon">
                            </div>
                            <div class="service-two__content">
                                <h3 class="mb-10">Social Media Marketing</h3>
                                <p class="mb-20">Leverage the power of social media platforms to connect with your
                                    audience and drive engagement.</p>
                                <a class="explore-btn" href="#0">Explore more <i
                                        class="fa-light ms-1 fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-two__item bg4">
                            <div class="icon">
                                <img src="assets/images/icon/service-icon4.png" alt="icon">
                            </div>
                            <div class="service-two__content">
                                <h3 class="mb-10">Search Engine Optimization (SEO)</h3>
                                <p class="mb-20">Boost your website's visibility and organic traffic with our
                                    comprehensive SEO strategies.</p>
                                <a class="explore-btn" href="#0">Explore more <i
                                        class="fa-light ms-1 fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-two__item bg5">
                            <div class="icon">
                                <img src="assets/images/icon/service-icon5.png" alt="icon">
                            </div>
                            <div class="service-two__content">
                                <h3 class="mb-10">Pay-Per-Click (PPC) Advertising</h3>
                                <p class="mb-20">Drive instant traffic to your website with targeted PPC campaigns
                                    and
                                    maximize your ROI.</p>
                                <a class="explore-btn" href="#0">Explore more <i
                                        class="fa-light ms-1 fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-two__item bg6">
                            <div class="icon">
                                <img src="assets/images/icon/service-icon6.png" alt="icon">
                            </div>
                            <div class="service-two__content">
                                <h3 class="mb-10">Analytics and Data Insights</h3>
                                <p class="mb-20">Harness the power of data to make informed decisions and
                                    continually
                                    optimize your digital marketing efforts.</p>
                                <a class="explore-btn" href="#0">Explore more <i
                                        class="fa-light ms-1 fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service area end here -->

        <!-- Pricing area start here -->
        <section class="pricing-two-area gray__bg pt-120 pb-120">
            <div class="container">
                <div class="d-flex align-items-end gap-5 flex-wrap justify-content-between mb-80">
                    <div class="section-header">
                        <h2 class="fw-300">Choose Your Best Plan</h2>
                        <p>Discover the transformative impact of our digital marketing expertise through <br> the
                            words
                            of
                            those
                            who matter most – our
                            clients.</p>
                    </div>
                    <div class="pricing-two__tab">
                        <img class="price-save" src="assets/images/shape/save.png" alt="image">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="pt-1-tab" data-bs-toggle="tab" data-bs-target="#pt-1"
                                    type="button" role="tab" aria-controls="pt-1" aria-selected="true">Monthly</button>
                                <button class="nav-link" id="pt-2-tab" data-bs-toggle="tab" data-bs-target="#pt-2"
                                    type="button" role="tab" aria-controls="pt-2"
                                    aria-selected="false">Annually</button>

                            </div>
                        </nav>
                    </div>
                </div>
                <div class="pricing__tab-content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="pt-1" role="tabpanel"
                            aria-labelledby="pt-1-tab">
                            <div class="pricing-package-wrapper">
                                <div class="row g-4">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-two__item">
                                            <div class="pricing-head pb-30 bor-bottom">
                                                <h4 class="mb-20">Basic Plan</h4>
                                                <h2>$ 29.00 USD<span class="month">/month</span>
                                                </h2>
                                                <p>Ideal for startups and small businesses.</p>
                                            </div>
                                            <ul class="mt-4">
                                                <li><i class="fa-duotone fa-check"></i>Engaging blog posts and
                                                    articles.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Customized content strategy.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Automated workflows for
                                                    efficiency
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Customer-Centric Approaches
                                                </li>
                                            </ul>
                                            <a href="#0" class="btn-one  mt-60 w-100 text-center">Get Started</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-two__item">
                                            <div class="pricing-head pb-30 bor-bottom">
                                                <h4 class="mb-20">Standard Plan</h4>
                                                <h2>$ 49.00 USD<span class="month">/month</span>
                                                </h2>
                                                <p>Perfect for growing businesses.</p>
                                            </div>
                                            <ul class="mt-4">
                                                <li><i class="fa-duotone fa-check"></i>Get All Basic’s Features.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Detailed content calendar.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Infographics and visual
                                                    content.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Email analytics and A/B
                                                    testing.
                                                </li>
                                            </ul>
                                            <a href="#0" class="btn-one active mt-60 w-100 text-center">Get
                                                Started</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-two__item">
                                            <div class="pricing-head pb-30 bor-bottom">
                                                <h4 class="mb-20">Premium Plan</h4>
                                                <h2>$ 99.00 USD<span class="month">/month</span>
                                                </h2>
                                                <p>Businesses seeking a robust online presence</p>
                                            </div>
                                            <ul class="mt-4">
                                                <li><i class="fa-duotone fa-check"></i>All Basic’s and Standard’s
                                                    Features.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>SEO-optimized content for
                                                    ranking.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Social media advertising for
                                                    reach.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Monthly performance reports.
                                                </li>
                                            </ul>
                                            <a href="#0" class="btn-one  mt-60 w-100 text-center">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pt-2" role="tabpanel" aria-labelledby="pt-2-tab">
                            <div class="pricing-package-wrapper">
                                <div class="row g-4">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-two__item">
                                            <div class="pricing-head pb-30 bor-bottom">
                                                <h4 class="mb-20">Basic Plan</h4>
                                                <h2>$ 299.00 USD<span class="month">/year</span>
                                                </h2>
                                                <p>Ideal for startups and small businesses.</p>
                                            </div>
                                            <ul class="mt-4">
                                                <li><i class="fa-duotone fa-check"></i>Engaging blog posts and
                                                    articles.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Customized content strategy.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Automated workflows for
                                                    efficiency
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Customer-Centric Approaches
                                                </li>
                                            </ul>
                                            <a href="#0" class="btn-one  mt-60 w-100 text-center">Get Started</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-two__item">
                                            <div class="pricing-head pb-30 bor-bottom">
                                                <h4 class="mb-20">Standard Plan</h4>
                                                <h2>$ 449.00 USD<span class="month">/year</span>
                                                </h2>
                                                <p>Perfect for growing businesses.</p>
                                            </div>
                                            <ul class="mt-4">
                                                <li><i class="fa-duotone fa-check"></i>Get All Basic’s Features.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Detailed content calendar.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Infographics and visual
                                                    content.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Email analytics and A/B
                                                    testing.
                                                </li>
                                            </ul>
                                            <a href="#0" class="btn-one active mt-60 w-100 text-center">Get
                                                Started</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="pricing-two__item">
                                            <div class="pricing-head pb-30 bor-bottom">
                                                <h4 class="mb-20">Premium Plan</h4>
                                                <h2>$ 999.00 USD<span class="month">/year</span>
                                                </h2>
                                                <p>Businesses seeking a robust online presence</p>
                                            </div>
                                            <ul class="mt-4">
                                                <li><i class="fa-duotone fa-check"></i>All Basic’s and Standard’s
                                                    Features.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>SEO-optimized content for
                                                    ranking.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Social media advertising for
                                                    reach.
                                                </li>
                                                <li><i class="fa-duotone fa-check"></i>Monthly performance reports.
                                                </li>
                                            </ul>
                                            <a href="#0" class="btn-one  mt-60 w-100 text-center">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing area end here -->

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
