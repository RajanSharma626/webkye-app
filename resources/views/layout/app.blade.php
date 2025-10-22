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
    <link rel="shortcut icon" href="assets/images/favicon.png">
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
                <img src="assets/images/logo/logo-light.svg" alt="logo">
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
                    <li><i class="fa-solid fa-location-dot"></i> <a href="#0">example@example.com</a>
                    </li>
                    <li class="py-2"><i class="fa-solid fa-phone-volume"></i> <a href="tel:+912659302003">+91
                            2659
                            302 003</a>
                    </li>
                    <li><i class="fa-solid fa-paper-plane"></i> <a href="#0">info.company@gmail.com</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__btns my-4">
                <a class='sign-in' href='/contact-us'>Contact Us</a>
            </div>
            <div class="sidebar__socials">
                <ul>
                    <li>
                        <a href="#0">
                            <svg width="8" height="16" viewBox="0 0 8 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.10223 8.99555V16H1.97333V8.99555H0V6.09778H1.97333V3.89334C1.97333 1.38667 3.46666 0 5.76 0C6.85333 0 8 0.195557 8 0.195557V2.65778H6.73778C5.49334 2.65778 5.10223 3.43111 5.10223 4.22222V6.09778H7.88444L7.44 8.99555H5.10223Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.9466 4.69593C15.8843 3.41522 15.5906 2.27682 14.6563 1.34297C13.7219 0.409114 12.5829 0.11562 11.3014 0.053363C9.97553 -0.0177877 6.01557 -0.0177877 4.69855 0.053363C3.41713 0.11562 2.28699 0.409114 1.34372 1.34297C0.400455 2.27682 0.115684 3.41522 0.0533926 4.69593C-0.0177975 6.02111 -0.0177975 9.97887 0.0533926 11.3041C0.115684 12.5848 0.409354 13.7232 1.34372 14.657C2.28699 15.5909 3.41713 15.8844 4.69855 15.9466C6.02447 16.0178 9.98443 16.0178 11.3014 15.9466C12.5829 15.8844 13.7219 15.5909 14.6563 14.657C15.5906 13.7232 15.8843 12.5848 15.9466 11.3041C16.0178 9.97887 16.0178 6.02112 15.9466 4.70483V4.69593ZM7.99111 12.2201C5.65963 12.2201 3.76419 10.3257 3.76419 7.99555C3.76419 5.66536 5.65963 3.77098 7.99111 3.77098C10.3226 3.77098 12.218 5.66536 12.218 7.99555C12.218 10.3257 10.3226 12.2201 7.99111 12.2201ZM12.9032 3.99332C12.4138 3.99332 12.0133 3.5931 12.0133 3.10394C12.0133 2.61478 12.4049 2.21456 12.9032 2.21456C13.3926 2.21456 13.7931 2.61478 13.7931 3.10394C13.7931 3.5931 13.3926 3.99332 12.9032 3.99332ZM10.8832 7.99555C10.8832 9.58754 9.58399 10.886 7.99111 10.886C6.39823 10.886 5.09901 9.58754 5.09901 7.99555C5.09901 6.40355 6.39823 5.10505 7.99111 5.10505C9.58399 5.10505 10.8832 6.40355 10.8832 7.99555Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.58958 15.9911H0.222698V5.89045H3.58958V15.9911ZM3.92717 1.96389C3.92717 0.897859 3.08323 0.0361424 2.01719 0.000607979C0.933392 -0.0260429 0.0272588 0.826778 0.00060798 1.91058C-0.0260429 2.99438 0.826779 3.90051 1.91058 3.92716C3.01215 3.93605 3.9094 3.06546 3.92717 1.96389ZM15.9467 9.88807C15.9467 6.74327 13.9124 5.78383 12.1801 5.78383C10.963 5.7483 9.81701 6.34351 9.15074 7.35624V5.89932H5.89933V16H9.26622V10.7587C9.26622 10.7054 9.26622 10.6521 9.26622 10.5988C9.26622 10.5988 9.26622 10.5988 9.26622 10.5899C9.19515 9.51495 10.0124 8.58218 11.0874 8.51111C11.9668 8.51111 12.6331 9.07966 12.6331 10.6787V16H16L15.9556 9.89695L15.9467 9.88807Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.76562 0H8.20406C9.50719 0.0371875 10.8041 0.385625 11.9359 1.03531C13.3297 1.82094 14.4756 3.03625 15.1816 4.47188C15.6875 5.49438 15.9603 6.62656 16 7.76562V8.205C15.9647 9.38344 15.6775 10.5553 15.1419 11.6069C14.6209 12.6316 13.8803 13.5447 12.9794 14.2594C12.0306 15.0175 10.9072 15.5569 9.71937 15.8141C9.22219 15.9275 8.71313 15.9788 8.20438 16H7.795C6.40844 15.9609 5.03281 15.5628 3.84875 14.8387C2.44469 13.985 1.3125 12.6919 0.659063 11.1838C0.252187 10.255 0.0365625 9.2475 0 8.23531V7.79406C0.0359375 6.53 0.366875 5.27437 0.976875 4.16594C1.73094 2.78781 2.8975 1.64031 4.28937 0.911563C5.35844 0.34625 6.55844 0.041875 7.76562 0ZM3.40094 3.29594C4.59812 5.03813 5.79531 6.78 6.99188 8.52219C5.79563 9.91344 4.59812 11.3038 3.40219 12.6953C3.6325 12.6966 3.86313 12.695 4.09344 12.6962C4.13844 12.6884 4.20125 12.7166 4.23281 12.6722C5.27312 11.4641 6.3125 10.2553 7.35219 9.04656C8.18937 10.2625 9.02344 11.4809 9.86156 12.6962C10.7741 12.695 11.6866 12.6962 12.5988 12.6956C11.3594 10.8869 10.1119 9.08313 8.87594 7.27219C10.0203 5.94969 11.1578 4.62156 12.2987 3.29625C12.0281 3.29563 11.7578 3.29563 11.4872 3.29625C10.4987 4.44875 9.50437 5.59656 8.51844 6.75094C7.72031 5.60344 6.93437 4.44688 6.14062 3.29625C5.2275 3.29563 4.31437 3.29594 3.40094 3.29594Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
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
                            <img src="assets/images/logo/logo-mix.svg" alt="logo">
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
                        <div class="subscribe-feild">
                            <input type="text" placeholder="Enter email address">
                            <button><i class="fa-light fa-arrow-up-right"></i></button>
                        </div>
                        <div class="form-check mt-20">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                by signing up, you agree to receive mail
                            </label>
                        </div>
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
</body>


</html>
