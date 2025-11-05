@extends('layout.app')

@section('title', 'Blogs and News | Webkye')
@section('description',
    'Blogs and News | Webkye | We are a team of web developers who are dedicated to building websites that are
    fast, secure, and easy to use.')
@section('keywords',
    'blogs, news, webkye, web development, web development services, custom website development, website
    development company, professional web developers, responsive websites, web design and development, website development
    agency, SEO-friendly websites, front-end development, back-end development, web application development')
@section('author', 'Webkye Blogs and News')
@section('content')

    <main>

        <!-- Banner area start here -->
        <section class="banner-inner-area">
            <div class="container">
                <div class="banner-inner__content">
                    <a href='/home'>home</a><span>/Blog and News</span>
                    <h2>Blog and News 1</h2>
                    <p>We will help a client's problems to develop the products they have with high quality Change
                        the
                        appearance.</p>
                </div>
            </div>
        </section>
        <!-- Banner area end here -->

        <!-- Blog area start here -->
        <section class="blog-area pb-120">
            <div class="container">
                <div class="section-header-flex mb-80">
                    <h2 class="fw-300">Our Latest Blog and News</h2>
                    <div>
                        <p>Delve into real-world examples where our Technology <br> Solutions, Consulting and
                            Strategy,
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    @if($blogs->count() > 0)
                        @foreach($blogs as $blog)
                            <div class="col-lg-4">
                                <div class="blog__item">
                                    <div class="blog__image image">
                                        <img src="{{ asset($blog->cover_image) }}" alt="{{ $blog->title }}">
                                        @if($blog->tags)
                                            <div class="tag">
                                                @foreach(explode(',', $blog->tags) as $tag)
                                                    <a href='{{ route('blogs') }}'>{{ trim($tag) }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <h4 class="mt-10 mb-20">
                                        <a class='primary-hover' href='{{ route('blogs') }}'>{{ $blog->title }}</a>
                                    </h4>
                                    <a class='fs-18 blog-btn text-font' href='{{ route('blogs') }}'>Read More <i
                                            class="fa-light ms-1 fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="text-center py-5">
                                <p class="fs-18">No blogs available at the moment. Please check back later.</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                @if($blogs->hasPages())
                    <div class="pegi justify-content-center mt-60">
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            @if($blogs->onFirstPage())
                                <a class="prev disabled" href="javascript:void(0)"><i class="fa-regular fa-arrow-left"></i></a>
                            @else
                                <a class="prev" href="{{ $blogs->previousPageUrl() }}"><i class="fa-regular fa-arrow-left"></i></a>
                            @endif
                            
                            <div class="pegi-dots d-flex align-items-center gap-2">
                                @php
                                    $currentPage = $blogs->currentPage();
                                    $lastPage = $blogs->lastPage();
                                    $startPage = max(1, $currentPage - 2);
                                    $endPage = min($lastPage, $currentPage + 2);
                                @endphp
                                
                                @if($startPage > 1)
                                    <a href="{{ $blogs->url(1) }}">1</a>
                                    @if($startPage > 2)
                                        <span>...</span>
                                    @endif
                                @endif
                                
                                @for($page = $startPage; $page <= $endPage; $page++)
                                    @if($page == $currentPage)
                                        <a href="javascript:void(0)" class="active">{{ $page }}</a>
                                    @else
                                        <a href="{{ $blogs->url($page) }}">{{ $page }}</a>
                                    @endif
                                @endfor
                                
                                @if($endPage < $lastPage)
                                    @if($endPage < $lastPage - 1)
                                        <span>...</span>
                                    @endif
                                    <a href="{{ $blogs->url($lastPage) }}">{{ $lastPage }}</a>
                                @endif
                            </div>
                            
                            @if($blogs->hasMorePages())
                                <a class="next" href="{{ $blogs->nextPageUrl() }}"><i class="fa-regular fa-arrow-right"></i></a>
                            @else
                                <a class="next disabled" href="javascript:void(0)"><i class="fa-regular fa-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- Blog area end here -->

        <!-- Book area start here -->
        @include('partials.book')
        <!-- Book area end here -->

    </main>

@endsection
