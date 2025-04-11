<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Development Games</title>
    <link rel="stylesheet" href="{{ asset('template-gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template-gui/css/style.css') }}">
</head>

<body>

    @include('components.navbar-dev')

    <main>

        <div class="hero py-5 bg-light">
            <div class="container text-center">
                <h1 class="mb-0 mt-0">Dashboard</h1>
            </div>
        </div>

        <div class="list-form py-5">
            <div class="container">
                <h5 class="alert alert-info">
                    Welcome, Development. Don't forget to sign out when you are finished using this page
                </h5>
            </div>
        </div>

    </main>


    <script src="{{ asset('template-gui/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-gui/js/popper.js') }}"></script>
</body>

</html>
