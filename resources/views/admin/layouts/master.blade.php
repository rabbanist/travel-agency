<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Css includes -->
    @include('admin.components.style')
    <!-- JS includes -->
    @include('admin.components.script')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

       @yield('content')

    </div>
</div>

@include('admin.components.footer-script')

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
