<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage User - Administrator Portal</title>

    {{-- Dropify CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('template-gui/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('template-gui/css/style.css') }}">
</head>

<body>

    <main>
        <div class="hero py-5 bg-light">
            <div class="container text-center">
                <h2 class="mb-3">
                    Manage Games - Development Portal
                </h2>
                <div class="text-muted">
                    @if (isset($game))
                        Edit Games
                    @else
                        Add Games
                    @endif
                </div>
            </div>
        </div>

        <div class="py-5">
            <div class="container">

                <div class="row justify-content-center ">
                    <div class="col-lg-5 col-md-6">
                        @if (isset($game))
                            <form action="{{ route('pages.dev.edit.update', ['id' => $game->id]) }}" method="POST">
                                @method('PUT')
                            @else
                                <form action="{{ route('pages.dev.form.store') }}" method="POST">
                        @endif
                        @csrf
                        <div class="form-item card card-default my-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class="mb-1 text-muted">Game title<span
                                            class="text-danger">*</span></label>
                                    <input id="title" type="text" placeholder="Game title"
                                        value="{{ old('title') ?? @$game->title }}"
                                        class="form-control @error('title') is-invalid
                              @enderror"
                                        name="title" required />
                                </div>
                                @error('title')
                                    <small class="text-danger fw-bold h-6">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description" class="mb-1 text-muted">Description<span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid
                              @enderror"></textarea>
                                </div>
                                @error('title')
                                    <small class="text-danger fw-bold h-6">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-item card card-default my-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password" class="mb-1 text-muted">Import new game version<span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="dropify">
                                </div>
                            </div>

                            <div class="mt-4 row">
                                <div class="col">
                                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                                </div>
                                <div class="col">
                                    <a href="{{ route('pages.user') }}" class="btn btn-danger w-100">Back</a>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
    </main>

    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Dropify JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('template-gui/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template-gui/js/popper.js') }}"></script>


    <script>
        $('.dropify').dropify({
            messages: {
                'default': '<small class="fs-6">Drag and drop a file here or click</small>',
                'replace': '<small class="fs-6">Drag and drop or click to replace</small>',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
</body>

</html>
