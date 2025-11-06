<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <base href="{{ url('/') }}">
    <!-- Favicon img -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="Webkye" />
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
    <!-- Bootstarp min css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!-- All min css -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Swiper bundle min css -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Magnigic popup css -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Splitting css -->
    <link rel="stylesheet" href="assets/css/splitting.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css">

    @stack('head')
</head>

<body>

    <!-- Preloader area start -->
    <div id="loading" class="preloader">
        <div class="loading-overlay"></div>
        <div class="custom-loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader area end -->

    <!-- Top header area start here -->
    <div class="header-top header-top-area d-none d-lg-block">
        <div class="container">
            <div class="header-top-wrp">
                <ul class="info">
                    <li><i class="fa-light fa-clock"></i> <span class="paragraph-light"><span class="text-white">Working
                                Hours :</span>
                            Monday - Friday, 10am - 05pm</span></li>
                </ul>
                <div class="right-info">
                    <ul class="site-link">
                        <li><a target="_blank"
                                href="mailto:{{ $websiteSetting->contact_email ?? 'info@webkye.in' }}">{{ $websiteSetting->contact_email ?? 'info@webkye.in' }}</a>
                        </li>
                        <li><a target="_blank"
                                href="https://api.whatsapp.com/send?phone=91{{ $websiteSetting->contact_phone ?? '9310498455' }}&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services.">+91
                                {{ $websiteSetting->contact_phone ?? '9310498455' }}</a></li>
                    </ul>
                    <ul class="link-info">

                        @if ($websiteSetting->contact_email)
                            <li>
                                <a href="mailto:{{ $websiteSetting->contact_email }}" target="_blank">
                                    <i class="bi bi-envelope text-light"></i>
                                </a>
                            </li>
                        @endif
                        @if ($websiteSetting->facebook_url)
                            <li>
                                <a href="{{ $websiteSetting->facebook_url }}" target="_blank">
                                    <i class="bi bi-facebook text-light"></i>
                                </a>
                            </li>
                        @endif
                        @if ($websiteSetting->contact_phone)
                            <li>
                                <a
                                    href="https://api.whatsapp.com/send?phone=91{{ $websiteSetting->contact_phone }}&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services.">
                                    <i class="bi bi-whatsapp text-light"></i>
                                </a>
                            </li>
                        @endif
                        @if ($websiteSetting->linkedin_url)
                            <li>
                                <a href="{{ $websiteSetting->linkedin_url }}" target="_blank">
                                    <i class="bi bi-linkedin text-light"></i>
                                </a>
                            </li>
                        @endif
                        @if ($websiteSetting->instagram_url)
                            <li>
                                <a href="{{ $websiteSetting->instagram_url }}" target="_blank">
                                    <i class="bi bi-instagram text-light"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Top header area end here -->

    <!-- Header area start here -->
    @include('partials.navbar')
    <!-- Header area end here -->

    <!-- Sidebar area start here -->
    <div class="sidebar-area offcanvas offcanvas-end" id="menubar">
        <div class="offcanvas-header">
            <a class='logo' href='/'>
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i
                    class="fa-regular fa-xmark"></i></button>
        </div>
        <div class="offcanvas-body sidebar__body">
            <div class="mobile-menu overflow-hidden"></div>
            <div class="d-none d-lg-block">
                <h5 class="text-white mb-20">About Us</h5>
                <p class="paragraph-light fs-16">
                    Unleash the full potential of your website and elevate its online presence with our comprehensive
                    SEO
                    solutions.
                </p>
            </div>
            <div class="sidebar__contact-info mt-30">
                <h5 class="text-white mb-20">Contact Info</h5>
                <ul>
                    <li><i class="fa-solid fa-envelope"></i> <a
                            href="#0">{{ $websiteSetting->contact_email }}</a>
                    </li>
                    <li class="py-2"><i class="fa-brands fa-whatsapp"></i> <a
                            href="https://api.whatsapp.com/send?phone=91{{ $websiteSetting->contact_phone ?? '9310498455' }}&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services.">+91
                            {{ $websiteSetting->contact_phone ?? '9310498455' }}</a>
                    </li>
                    <li><i class="fa-solid fa-location-dot"></i> <a
                            href="#0">{{ $websiteSetting->address ?? 'New Delhi, India' }}</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__btns my-4">
                <a class='sign-in' href='/contact-us'>Contact Us</a>
            </div>
            <div class="sidebar__socials">
                <ul>
                    @if ($websiteSetting->facebook_url)
                        <li class="d-flex align-items-center justify-content-center">
                            <a href="{{ $websiteSetting->facebook_url }}"
                                class="d-flex align-items-center justify-content-center" target="_blank">
                                <i class="fa-brands fa-facebook fs-4 m-0 text-light"></i>
                            </a>
                        </li>
                    @endif
                    @if ($websiteSetting->linkedin_url)
                        <li class="d-flex align-items-center justify-content-center">
                            <a href="{{ $websiteSetting->linkedin_url }}"
                                class="d-flex align-items-center justify-content-center" target="_blank">
                                <i class="fa-brands fa-linkedin fs-4 m-0 text-light"></i>
                            </a>
                        </li>
                    @endif
                    @if ($websiteSetting->instagram_url)
                        <li class="d-flex align-items-center justify-content-center">
                            <a href="{{ $websiteSetting->instagram_url }}"
                                class="d-flex align-items-center justify-content-center" target="_blank">
                                <i class="fa-brands fa-instagram fs-4 m-0 text-light"></i>
                            </a>
                        </li>
                    @endif
                    @if ($websiteSetting->contact_phone)
                        <li class="d-flex align-items-center justify-content-center">
                            <a href="https://api.whatsapp.com/send?phone=91{{ $websiteSetting->contact_phone }}&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services."
                                class="d-flex align-items-center justify-content-center" target="_blank">
                                <i class="fa-brands fa-whatsapp fs-4 m-0 text-light"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar area end here -->
    <div class="ScrollSmoother-content">


        @yield('content')

        <!-- Footer area start here -->
        <footer class="footer-area secondary-bg pt-120">
            <div class="container">
                <div class="footer__wrp pb-60">
                    <div class="footer__item footer-about">
                        <a class='logo mb-4' href='/'>
                            <img src="{{ asset($websiteSetting->footer_logo ?? 'assets/images/logo/logo.png') }}"
                                alt="logo">
                        </a>
                        <p>Webkye is a global agency helping startups grow from idea to industry leader.
                        </p>
                        <div class="social-icons mt-20">
                            @if ($websiteSetting->contact_email)
                                <a href="mailto:{{ $websiteSetting->contact_email }}" target="_blank">
                                    <i class="bi bi-envelope text-light fs-3"></i>
                                </a>
                            @endif

                            @if ($websiteSetting->facebook_url)
                                <a href="{{ $websiteSetting->facebook_url }}" target="_blank">
                                    <i class="bi bi-facebook text-light fs-3"></i>
                                </a>
                            @endif

                            @if ($websiteSetting->contact_phone)
                                <a
                                    href="https://api.whatsapp.com/send?phone=91{{ $websiteSetting->contact_phone }}&text=Hi%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services.">
                                    <i class="bi bi-whatsapp text-light fs-3"></i>
                                </a>
                            @endif

                            @if ($websiteSetting->linkedin_url)
                                <a href="{{ $websiteSetting->linkedin_url }}" target="_blank">
                                    <i class="bi bi-linkedin text-light fs-3"></i>
                                </a>
                            @endif

                            @if ($websiteSetting->instagram_url)
                                <a href="{{ $websiteSetting->instagram_url }}" target="_blank">
                                    <i class="bi bi-instagram text-light fs-3"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="footer__item">
                        <h3>Company</h3>
                        <ul>
                            <li>
                                <a href='/about'>About Us</a>
                            </li>
                            <li>
                                <a href='/services'>Services</a>
                            </li>
                            <li>
                                <a href='/case-studies'>Case Studies</a>
                            </li>
                            <li>
                                <a href='/blogs'>Blogs</a>
                            </li>
                            <li>
                                <a href='/faq'>FAQ's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <h3>Support</h3>
                        <ul>
                            <li>
                                <a href='/contact-us'>Contact Us</a>
                            </li>
                            <li>
                                <a href='/testimonials'>Testimonials</a>
                            </li>
                            <li>
                                <a href='/privacy-policy'>Privacy Policy</a>
                            </li>
                            <li>
                                <a href='/term-condition'>Terms Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__item footer-subscribe">
                        <h3>Subscribe Now</h3>
                        <form id="newsletterForm">
                            @csrf
                            <div class="subscribe-feild">
                                <input type="email" name="email" id="newsletter_email"
                                    placeholder="Enter email address" required>
                                <button type="submit"><i class="fa-light fa-arrow-up-right"></i></button>
                            </div>
                            <div class="form-check mt-20">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    by signing up, you agree to receive mail
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer__copyright">
                    <p> &copy; Copyright 2025 <a href="/">Webkye</a>.</p>
                    <a href="#0">
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.6309 2.55094C10.3989 1.33583 8.75455 0.666626 7.00066 0.666626C5.24674 0.666626 3.60236 1.33583 2.37036 2.55094C0.0779159 4.812 -0.280968 7.52721 1.30371 10.621C2.6035 13.1587 4.94433 15.4671 6.65356 17.1527L6.72063 17.2189C6.79799 17.2951 6.89931 17.3333 7.00066 17.3333C7.10202 17.3333 7.20341 17.2951 7.2807 17.2189L7.3479 17.1526C9.05707 15.467 11.3979 13.1585 12.6976 10.6209C14.2823 7.52714 13.9234 4.812 11.6309 2.55094ZM11.9907 10.2687C10.8001 12.5932 8.64884 14.7628 7.00066 16.3902C5.35252 14.7628 3.20123 12.5931 2.01069 10.2688C0.577693 7.47102 0.878523 5.12721 2.93047 3.10338C4.05263 1.99661 5.52665 1.44319 7.00063 1.44319C8.47465 1.44319 9.94866 1.99657 11.0708 3.10338C13.1227 5.12717 13.4236 7.47099 11.9907 10.2687ZM7.00063 4.6314C5.39641 4.6314 4.09125 5.91871 4.09125 7.501C4.09125 9.08329 5.39641 10.3706 7.00063 10.3706C8.60488 10.3706 9.91005 9.08329 9.91005 7.501C9.91005 5.91871 8.60491 4.6314 7.00063 4.6314ZM7.00063 9.58935C5.83315 9.58935 4.88334 8.65253 4.88334 7.501C4.88334 6.34947 5.83315 5.41265 7.00063 5.41265C8.16814 5.41265 9.11796 6.34947 9.11796 7.501C9.11796 8.65253 8.16814 9.58935 7.00063 9.58935Z"
                                fill="white" fill-opacity="0.7" />
                        </svg>
                        {{ $websiteSetting->address ?? 'New Delhi, India' }}</a>
                </div>
            </div>
        </footer>
        <!-- Footer area end here -->


    </div>

    <!-- Back to top btn area start here -->
    <button id="back-top" class="btn-backToTop">
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    <!-- Back to top btn area end here -->

    <!-- Jquery 3.7.0 Min Js -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap min Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Mean menu Js -->
    <script src="assets/js/meanmenu.js"></script>
    <!-- Swiper bundle min Js -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Counterup min Js -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Wow min Js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Magnific popup min Js -->
    <script src="assets/js/magnific-popup.min.js"></script>
    <!-- Nice select min Js -->
    <script src="assets/js/nice-select.min.js"></script>
    <!-- Isotope pkgd min Js -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Splitting Js -->
    <script src="assets/js/splitting.js"></script>
    <!-- Waypoints Js -->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!-- Gsap -->
    <script src="assets/js/gsap/gsap.min.js"></script>
    <script src="assets/js/gsap/ScrollTrigger.min.js"></script>
    <script src="assets/js/gsap/ScrollSmoother.min.js"></script>
    <!-- Script Js -->
    <script src="assets/js/script.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/684e8b8ce75fc7190e09d000/1itpd27qt';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <!-- Bootstrap Toast Notification -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="newsletterToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto" id="toastTitle">Newsletter</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                <!-- Message will be inserted here -->
            </div>
        </div>
    </div>

    <!-- Newsletter AJAX Script -->
    <script>
        $(document).ready(function() {
            $('#newsletterForm').on('submit', function(e) {
                e.preventDefault();

                var formData = {
                    email: $('#newsletter_email').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: '{{ route('newsletter.subscribe') }}',
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {
                        $('#newsletterForm button[type="submit"]').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            // Show success toast
                            showToast('success', response.message);
                            // Reset form
                            $('#newsletterForm')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        var errorMessage = 'Something went wrong. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        // Show error toast
                        showToast('error', errorMessage);
                    },
                    complete: function() {
                        $('#newsletterForm button[type="submit"]').prop('disabled', false);
                    }
                });
            });

            function showToast(type, message) {
                var toastEl = document.getElementById('newsletterToast');
                var toastTitle = document.getElementById('toastTitle');
                var toastMessage = document.getElementById('toastMessage');
                var toast = new bootstrap.Toast(toastEl, {
                    animation: true,
                    autohide: true,
                    delay: 5000
                });

                // Set toast style based on type
                toastEl.classList.remove('bg-success', 'bg-danger', 'text-white');
                if (type === 'success') {
                    toastEl.classList.add('bg-success', 'text-white');
                    toastTitle.textContent = 'Success!';
                } else {
                    toastEl.classList.add('bg-danger', 'text-white');
                    toastTitle.textContent = 'Error!';
                }

                toastMessage.textContent = message;
                toast.show();
            }
        });
    </script>
</body>


</html>
