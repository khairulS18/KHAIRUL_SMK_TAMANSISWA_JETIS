<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Users - Administrator Portal</title>
    <link rel="stylesheet" href="{{ asset('template-gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template-gui/css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Administrator Portal</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li><a href="admins.html" class="nav-link px-2 text-white">List Admins</a></li>
                <li><a href="users.html" class="nav-link px-2 text-white">List Users</a></li>
                <li class="nav-item">
                    <a class="nav-link active bg-dark" href="#">Welcome, Administrator</a>
                </li>
                <li class="nav-item">
                    <a href="../signin.html" class="btn bg-white text-primary ms-4">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>

        <div class="hero py-5 bg-light">
            <div class="container">
                <a href="{{ route('admin.user.form') }}" class="btn btn-primary">
                    Add User
                </a>
            </div>
        </div>

        <div class="list-form py-5">
            <div class="container">
                <h6 class="mb-3">List Users</h6>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Created at</th>
                            <th>Last login</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                            <tr>
                                <td><a href="../Gaming Portal/profile.html" target="_blank">{{ $item->username }}</a></td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->last_login_at ?? '-' }}</td>
                                <td><span class="bg-success text-white p-1 d-inline-block">Active</span></td>
                                <td class="d-flex gap-1">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Lock
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="submit" class="dropdown-item" name="reason"
                                                    value="spamming">Spamming</a>
                                            </li>
                                            <li>
                                                <button type="submit" class="dropdown-item" name="reason"
                                                    value="cheating">Cheating</a>
                                            </li>
                                            <li>
                                                <button type="submit" class="dropdown-item" name="reason"
                                                    value="other">Other</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('admin.user.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">Update</a>
                                    <form action="{{ route('admin.user.destroy', ['id' => $item->id]) }}" method="post">
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete this user?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links() }}

            </div>
        </div>

    </main>


    <script src="{{ asset("template-gui/js/bootstrap.js") }}"></script>
    <script src="{{ asset("template-gui/js/popper.js") }}"></script>
</body>

</html>
