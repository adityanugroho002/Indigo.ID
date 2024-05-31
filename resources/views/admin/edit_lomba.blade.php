<!-- resources/views/lomba/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Lomba</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update_lomba', $lomba->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_lomba">Nama Lomba:</label>
            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" value="{{ $lomba->nama_lomba }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_lomba">Jenis Lomba:</label>
            <input type="text" class="form-control" id="jenis_lomba" name="jenis_lomba" value="{{ $lomba->jenis_lomba }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $lomba->status }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $lomba->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="timeline">Timeline:</label>
            <textarea class="form-control" id="timeline" name="timeline" required>{{ $lomba->timeline }}</textarea>
        </div>

        <div class="form-group">
            <label for="ketentuan">Ketentuan:</label>
            <textarea class="form-control" id="ketentuan" name="ketentuan" required>{{ $lomba->ketentuan }}</textarea>
        </div>

        <div class="form-group">
            <label for="biaya">Biaya:</label>
            <textarea class="form-control" id="biaya" name="biaya" required>{{ $lomba->biaya }}</textarea>
        </div>

        <div class="form-group">
            <label for="link_pendaftaran">Link Pendaftaran:</label>
            <input type="text" class="form-control" id="link_pendaftaran" name="link_pendaftaran" value="{{ $lomba->link_pendaftaran }}" required>
        </div>

        <div class="form-group">
            <label for="link_guidebook">Link Guidebook:</label>
            <input type="text" class="form-control" id="link_guidebook" name="link_guidebook" value="{{ $lomba->link_guidebook }}" required>
        </div>

        <div class="form-group">
            <label for="kontak">Kontak:</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $lomba->kontak }}" required>
        </div>

        <div class="form-group">
            <label for="poster">Poster:</label>
            <input type="file" class="form-control" id="poster" name="poster">
            @if ($lomba->poster)
                <img src="{{ asset($lomba->poster) }}" alt="Poster" width="150">
                <input type="hidden" name="existing_poster" value="{{ $lomba->poster }}">
            @endif
        </div>
        <div class="form-group">
            <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label>
            <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="{{ $lomba->tanggal_pelaksanaan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Selesai Edit</button>
    </form>
</div>
@endsection
