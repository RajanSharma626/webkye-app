@extends('layout.app')

@section('title', 'FAQ | Webkye')
@section('description',
    'FAQ | Webkye | We are a team of web developers who are dedicated to building websites that are
    fast, secure, and easy to use.')
@section('keywords',
    'faq, webkye, web development, web development services, custom website development, website
    development company, professional web developers, responsive websites, web design and development, website development
    agency, SEO-friendly websites, front-end development, back-end development, web application development')
@section('author', 'Webkye')
@section('content')

    <main>

        <!-- Banner area start here -->
        <section class="banner-inner-area">
            <div class="container">
                <div class="banner-inner__content">
                    <a href='/home'>home</a><span>/FAQ</span>
                    <h2>FAQ</h2>
                    <p>We will help a client's problems to develop the products they have with high quality Change
                        the
                        appearance.</p>
                </div>
            </div>
        </section>
        <!-- Banner area end here -->

        <!-- Faq area start here -->
        <section class="faq-four-area pb-120">
            <div class="container">
                <div class="d-flex flex-wrap mb-80 justify-content-between align-items-end gap-3">
                    <div class="section-header-four">
                        <h5><span class="title-dot"></span>Frequently Asked Questions</h5>
                        <h2 class="fw-300">Most Common and Top <br> Question Answered</h2>
                    </div>
                    <div>
                        <p>Most common question answered. Have any other questions. <br> Please contact us we will
                            be in
                            touch ASAP.</p>
                        <a class='btn-three mt-50' href='/contact-us'>Contact Us<i
                                class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>

                @if ($faqs->count() > 0)

                    @foreach ($faqs as $faq)
                        <div class="faq-four__accordion accordion-two">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- Faq area end here -->

        <!-- Book area start here -->
        @include('partials.book')
        <!-- Book area end here -->

    </main>

@endsection
