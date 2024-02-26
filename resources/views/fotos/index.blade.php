@extends('layouts.app')


@section('content')
<div class="container">
<div class="row">
        <div class="col-md-12">
            @auth
                <a href="{{ route('foto.create') }}" class="btn btn-primary mb-3">Tambah Foto</a>
            @endauth


        </div>
    </div>


    <div class="row">
        @foreach($fotos as $foto)
            <div class="col-md-4 mb-4">
                <div class="foto-container">
                    <a href="{{ Storage::url($foto->lokasi_file) }}" data-lightbox="gallery" data-title="{{ $foto->judul_foto }}">
                        <img src="{{ Storage::url($foto->lokasi_file) }}" class="img-fluid foto-thumbnail" alt="{{ $foto->judul_foto }}">
                    </a>
                    <h5 class="foto-title">
                        <a href="{{ route('foto.show', $foto->foto_id) }}">{{ $foto->judul_foto }}</a>
                    </h5>
                    <p class="foto-album">Album: {{ $foto->album->nama_album }}</p> <!-- Tampilkan nama album -->
                    <p class="foto-user">Uploaded by: {{ $foto->user->name }}</p> <!-- Tampilkan nama user -->
                    <div class="foto-description">{{ $foto->deskripsi_foto }}</div>
                </div>
            </div>
        @endforeach


        
    </div>
</div>
@endsection