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
            <div class="container">
                <a href="{{ route('pages.dev.form') }}" class="btn btn-primary">
                    Add Games
                </a>
            </div>
        </div>

        <div class="list-form py-5">
            <div class="container">
                <h6 class="mb-3">List Games</h6>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Game title</th>
                            <th>Created at</th>
                            <th>Created by</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($games as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><span class="bg-success px-3 rounded-2 fw-bold text-white p-1 d-inline-block">{{ $item->user->username }}</span></td>
                                <td>{{ $item->description }}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('pages.user.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">Update</a>
                                    <form action="{{ route('pages.user.destroy', ['id' => $item->id]) }}" method="post">
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete this user?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $games->links() }}

            </div>
        </div>

    </main>


    <script src="{{ asset('template-gui/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-gui/js/popper.js') }}"></script>
</body>

</html>
