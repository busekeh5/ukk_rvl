@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Add New Foto</h2>
    <form method="POST" action="{{ route('foto.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul_foto">Judul Foto</label>
            <input type="text" class="form-control" id="judul_foto" name="judul_foto" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_foto">Deskripsi</label>
            <textarea class="form-control" id="deskripsi_foto" name="deskripsi_foto"></textarea>
        </div>
        <div class="form-group">
            <label for="lokasi_file">File Foto</label>
            <input type="file" class="form-control-file" id="lokasi_file" name="lokasi_file" required>
        </div>
        <div class="form-group">
            <label for="album_id">Album</label>
            <select class="form-control" id="album_id" name="album_id">
                @foreach($albums as $album)
                    <option value="{{ $album->album_id }}">{{ $album->nama_album }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection