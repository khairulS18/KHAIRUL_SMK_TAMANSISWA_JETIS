<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage User - Administrator Portal</title>
    <link rel="stylesheet" href="{{ asset('template-gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template-gui/css/style.css') }}">
</head>

<body>

    <main>
        <div class="hero py-5 bg-light">
            <div class="container text-center">
                <h2 class="mb-3">
                    Manage User - Administrator Portal
                </h2>
                <div class="text-muted">
                    @if (isset($user))
                        Edit User
                        @else 
                        Add User
                    @endif
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">

                <div class="row justify-content-center ">
                    <div class="col-lg-5 col-md-6">
                        @if (isset($user))
                            <form action="{{ route('admin.user.edit.update', ['id' => $user->id]) }}" method="POST">
                              @method('PUT')
                            @else
                            <form action="{{ route('admin.user.form.store') }}" method="POST">
                        @endif
                        @csrf
                        <div class="form-item card card-default my-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username" class="mb-1 text-muted">Username <span
                                            class="text-danger">*</span></label>
                                    <input id="username" type="text" placeholder="Username" value="{{ old('username') ?? @$user->username }}"
                                        class="form-control @error('username') is-invalid
                              @enderror"
                                        name="username" required />
                                </div>
                                @error('username')
                                    <small class="text-danger fw-bold h-6">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-item card card-default my-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password" class="mb-1 text-muted">Password <span
                                            class="text-danger">*</span></label>
                                    <input id="password" type="password" placeholder="Password" value="{{ old('paswword') ?? @$user->password }}"
                                        class="form-control @error('userpasswordname')
                              is-invalid  @enderror"
                                        name="password" required />
                                </div>
                                @error('userpasswordname')
                                    <small class="text-danger fw-bold h-6">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 row">
                            <div class="col">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.user') }}" class="btn btn-danger w-100">Back</a>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </main>


    <script src="{{ asset('template-gui/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-gui/js/popper.js') }}"></script>
</body>

</html>
