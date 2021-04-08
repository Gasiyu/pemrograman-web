@extends('layout.main')
@section('content')
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="cover_image">Cover Image</label>
        <input type="file" name="cover_image" id="cover_image" class="form-control p-1 @error('cover_image') is-invalid @enderror" accept="image/x-png,image/gif,image/jpeg">
        @error('cover_image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
        @error('judul')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" id="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis') }}">
        @error('penulis')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ old('penerbit') }}">
        @error('penerbit')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit') }}">
        @error('tahun_terbit')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mb-2">Daftar</button>
</form>
@endsection
