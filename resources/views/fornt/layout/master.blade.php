<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TripSummit</title>

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    @include('fornt.components.script-style')

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
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
                        <a href="login.html"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="menu">
                        <a href="register.html"><i class="fas fa-user"></i> Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{--Navbar--}}
@include('fornt.components.navbar')

{{--Main Content--}}
@yield('content')

{{--Footer --}}
@include('fornt.sections.footer')


<div class="scroll-top">
    <i class="fas fa-angle-up"></i>
</div>

<script src="{{ asset('fornt-dist/js/custom.js')}}"></script>
</body>
</html>
