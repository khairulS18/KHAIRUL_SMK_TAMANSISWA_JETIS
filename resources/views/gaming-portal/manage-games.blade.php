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
            <div class="container">
                <a href="{{ route('pages.manage-game.form') }}" class="btn btn-primary">
                    Add Game
                </a>
            </div>
        </div>

        <div class="list-form py-5">
            <div class="container">
                <h6 class="mb-3">List Games</h6>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100">Thumbnail</th>
                            <th width="200">Title</th>
                            <th width="500">Description</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $item)
                            <tr>
                                <td><img src="{{ asset("template-gui/example_game/v1/thumbnail.png") }}" alt="{{ $item->title }} Logo"
                                        style="width: 100%"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td ">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('pages.manage-game.show', ['id' => $item->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="manage-games-form-update.html" class="btn btn-sm btn-secondary">Update</a>
                                        <form action="{{ route('pages.manage-game.destroy', ['id' => $item->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure delete this game?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </main>


    <script src="{{ asset('template-gui/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-gui/js/popper.js') }}"></script>
</body>

</html>
