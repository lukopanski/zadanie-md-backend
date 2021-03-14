<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO App | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="app m-4">
        <div class="container-fluid text-center">
            <h1 class="display-3">TODO App</h1>
            <x-alert />
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</body>

</html>