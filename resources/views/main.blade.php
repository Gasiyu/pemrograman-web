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

        @isset($alert)
            <div class="alert alert-{{ $alert['class'] }} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ $alert['keterangan'] }}
            </div>
        @endisset

        <div class="row">
            <div class="container">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="form-inline float-right">
                        <input type="search" name="keyword" id="txKeyword" class="form-control" placeholder="Masukkan Judul">
                        <button type="submit" class="btn btn-primary ml-1">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="input-group w-100">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('home') }}" role="button">Home</a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('insert') }}" role="button">Insert Data</a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('delete') }}" role="button">Delete Data</a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('sort', 'judul') }}" role="button">SortBy Judul</a>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('sort', 'tahun_terbit') }}" role="button">SortBy Tahun</a>
                </div>
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead class="table-active w-100">
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset("img/cover/$data->gambar") }}" class="cover-img"></td>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->penulis }}</td>
                                    <td>{{ $data->penerbit }}</td>
                                    <td>{{ $data->tahun_terbit }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"><p  class="text-center font-weight-bold">Tidak Ada Data</p></td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
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
