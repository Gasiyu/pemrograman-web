@extends('layout.main')

@section('content')
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
                    <td><img src="{{ asset('storage/'.$data->cover) }}" class="cover-img"></td>
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
    <tfoot>
        <tr>
            <td colspan="6"><div class="float-right">{{ $datas->links() }}</div></td>
        </tr>
    </tfoot>
</table>
@endsection
