<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Data Buku</h1>

        @if(session('alert'))
            <div class="alert alert-{{ session('alert')['class'] }} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ session('alert')['keterangan'] }}
            </div>
        @endif

        <div class="row">
            <div class="container">
                <form action="{{ route('books.index') }}" method="get">
                    <div class="form-inline float-right">
                        <input type="search" name="keyword" id="keyword" class="form-control" placeholder="Masukkan Judul">
                        <button type="submit" class="btn btn-primary ml-1">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="input-group w-100">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('books.index') }}" role="button">Home</a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('books.create') }}" role="button">Tambah Buku</a>
                    <form action="{{ route('books.destroy') }}" class="form-button" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Hapus Data</button>
                    </form>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('books.index') }}?sort=judul" role="button">SortBy Judul</a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('books.index') }}?sort=tahun_terbit" role="button">SortBy Tahun</a>
                </div>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset("js/app.js") }}"></script>
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 2000);
        });
    </script>
</body>
</html>
