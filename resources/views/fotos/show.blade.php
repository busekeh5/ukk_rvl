@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="foto-detail">
                <img src="{{ Storage::url($foto->lokasi_file) }}" class="img-fluid" alt="{{ $foto->judul_foto }}">
                <h3 class="mt-3">{{ $foto->judul_foto }}</h3>
                <p>{{ $foto->deskripsi_foto }}</p>
                <form action="{{ route('like.toggle') }}" method="POST">
                    @csrf
                    <input type="hidden" name="foto_id" value="{{ $foto->foto_id }}">
                    <button type="submit" class="btn {{ $foto->likes->contains('user_id', auth()->id()) ? 'btn-success' : 'btn-outline-success' }}">
                        Like | {{ $foto->likes->count() }}
                    </button>
                </form>                
                <div class="badge badge-primary">Uploaded by: {{ $foto->user->name }}</div>
                <div class="badge badge-secondary">Album: {{ $foto->album->nama_album }}</div>
                <!-- Tampilkan jumlah komentar -->
                <div class="badge badge-info">{{ $foto->komentars->count() }} komentar</div>
            </div>
            <!-- Bagian menampilkan komentar -->
            @foreach($foto->komentars as $komentar)
            <div class="komentar">
                <p><strong>{{ $komentar->user->name }}:</strong> {{ $komentar->isi_komentar }}</p>
                <p class="text-muted">{{ $komentar->created_at->diffForHumans() }}</p>
            </div>
            @endforeach


            <!-- Formulir untuk menambah komentar baru -->
            @if(Auth::check())
            <form action="{{ route('komentar.store') }}" method="POST">
                @csrf
                <input type="hidden" name="foto_id" value="{{ $foto->foto_id }}">
                <div class="form-group">
                    <textarea name="isi_komentar" class="form-control" rows="3" placeholder="Tambahkan komentar..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>
            @endif
@endsection