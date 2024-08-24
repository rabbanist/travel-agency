<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TripSummit</title>

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    @include('front.components.script-style')

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

{{--Navbar--}}
@include('front.components.navbar')

{{--Main Content--}}
@yield('content')

{{--Footer --}}
@include('front.sections.footer')


<div class="scroll-top">
    <i class="fas fa-angle-up"></i>
</div>

<script src="{{ asset('front-dist/js/custom.js')}}"></script>

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.show({
                message: '{{ $error }}',
                color: 'red',
                position: 'topRight',
            });
        </script>
    @endforeach
@endif

@if(session('success'))
    <script>
        iziToast.show({
            message: '{{ session("success") }}',
            color: 'green',
            position: 'topRight',
        });
    </script>
@endif

@if(session('error'))
    <script>
        iziToast.show({
            message: '{{ session("error") }}',
            color: 'red',
            position: 'topRight',
        });
    </script>
@endif


</body>
</html>
