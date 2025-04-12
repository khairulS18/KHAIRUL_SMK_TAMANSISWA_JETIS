<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Gaming Portal</title>
    <link rel="stylesheet" href="{{ asset('template-gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template-gui/css/style.css') }}">
</head>

<body>

    <main>
        <div class="hero py-5 bg-light">
            <div class="container text-center">
                <h2 class="mb-3">
                    Gaming Portal
                </h2>
                <div class="text-muted">
                    Sign Up
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">

                <div class="row justify-content-center ">
                    <div class="col-lg-5 col-md-6">

                        <form method="post" action="{{ route('signup.store') }}">
                           @csrf
                            <div class="form-item card card-default my-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username" class="mb-1 text-muted">Username <span
                                                class="text-danger">*</span></label>
                                        <input id="username" type="text" placeholder="Username"
                                            class="form-control @error('username')
                              is_invalid @enderror"
                                            name="username" value="{{ old('username') }}" required/>
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
                                        <input id="password" type="password" placeholder="Password"
                                            class="form-control @error('password')
                              is_invalid @enderror"
                                            name="password" required/>
                                    </div>
                                    @error('password')
                                        <small class="text-danger fw-bold h-6">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-4 row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                </div>
                                <div class="col">
                                    <a href="{{ route('singin.index') }}" class="btn btn-danger w-100">Sign In</a>
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
