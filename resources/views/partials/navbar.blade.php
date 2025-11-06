@if (request()->is('home') || request()->is('/'))
    <header class="header-area border-none header-one-area">
        <div class="container">
            <div class="header__main header__main-one">
                <a class='logo' href='/'>
                    <img src="{{ asset($websiteSetting->logo ?? 'assets/images/logo/logo.png') }}" class="d-none d-lg-block" alt="logo">                    
                    <img src="{{ asset('assets/images/logo/logo-mob.png') }}" class="d-block d-lg-none img-fluid" style="width: 50px;" alt="logo">                    
                </a>
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li><a href='/home'>Home</a></li>
                            <li><a href='/about'>About Us</a></li>
                            <li><a href='/services'>Services</a></li>
                            <li><a href='/case-studies'>Case Studies</a></li>
                            <li><a href='/contact-us'>Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="menu-btns d-none d-lg-flex">
                    <a class='menu-btn-one' href='/contact-us'>Contact Us</a>
                </div>
                <button class="menubars d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#menubar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
@else
    <header class="header-area">
        <div class="container">
            <div class="header__main">
                <a class='logo' href='/'>
                    <img src="{{ asset($websiteSetting->logo ?? 'assets/images/logo/logo.png') }}" class="d-none d-lg-block" alt="logo">                    
                    <img src="{{ asset('assets/images/logo/logo-mob.png') }}" class="d-block d-lg-none img-fluid" style="width: 50px;" alt="logo">  
                </a>
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li><a href='/home'>Home</a></li>
                            <li><a href='/about'>About Us</a></li>
                            <li><a href='/services'>Services</a></li>
                            <li><a href='/case-studies'>Case Studies</a></li>
                            <li><a href='/contact-us'>Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="menu-btns d-none d-lg-flex">
                    <a class='menu-btn-one' href='/contact-us'>Contact Us</a>
                </div>
                <button class="menubars d-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#menubar">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
@endif
