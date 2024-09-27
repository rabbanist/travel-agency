
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text"><i class="fas fa-phone"></i> 111-222-3333</li>
                    <li class="email-text"><i class="fas fa-envelope"></i> contact@example.com</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    <li class="menu">
                        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('registration') }}"><i class="fas fa-user"></i> Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="navbar-area" id="sticky menu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('uploads/logo.png')}}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('uploads/logo.png')}}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ Route::is('about') ? 'active' : '' }}">
                            <a href="{{route('about')}}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="destinations.html" class="nav-link">Destinations</a>
                        </li>
                        <li class="nav-item">
                            <a href="packages.html" class="nav-link">Packages</a>
                        </li>
                        <li class="nav-item {{ Route::is('team') ? 'active' : '' }}">
                            <a href="{{ route('team') }}" class="nav-link">Team</a>
                        </li>

                        <li class="nav-item {{ Route::is('faq') ? 'active' : '' }}">
                            <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item {{ Route::is('faq') ? 'active' : '' }}">
                            <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                        </li>


                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
