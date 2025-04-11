<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Games - Gaming Portal</title>

    <link rel="stylesheet" href="{{ asset('template-gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template-gui/css/style.css') }}">
</head>

<body>

    @include('components.navbar-games')

    <main>

        <div class="hero py-5 bg-light">
            <div class="container text-center">
                <h1>Discover Games</h1>
            </div>
        </div>

        <div class="list-form py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-3">{{ $games->count() }} Game Avaliable</h2>
                    </div>

                    <div class="col-lg-8" style="text-align: right;">
                        <div class="mb-3">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-secondary">Popularity</button>
                                <button type="button" class="btn btn-outline-primary">Recently Updated</button>
                                <button type="button" class="btn btn-outline-primary">Alphabetically</button>
                            </div>

                            <div class="btn-group" role="group">
                                <form action="" method="get">
                                    <button type="button" name="asc" class="btn btn-secondary">ASC</button>
                                    <button type="button" name="desc" class="btn btn-outline-primary">DESC</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach ($games as $item)
                        <div class="col-md-6">
                            <a href="detail-games.html" class="card card-default mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{ asset('template-gui/example_game/v1/thumbnail.png') }}"
                                                alt="{{ $item->title }}" style="width: 100%">
                                        </div>
                                        <div class="col">
                                            <h5 class="mb-1">{{ $item->title }} <small class="text-muted">By
                                                    {{ $item->user->username }}</small>
                                            </h5>
                                            <div>{{ $item->description }}</div>
                                            <hr class="mt-1 mb-1">
                                                <div class="text-muted">#scores submitted :</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </main>


    <script src="{{ asset('template-gui/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-gui/js/popper.js') }}"></script>
</body>

</html>
