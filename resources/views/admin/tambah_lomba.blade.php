@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Tambah Lomba</h2>
    <form method="POST" action="{{ route('admin.store_lomba') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_lomba">Nama Lomba:</label>
                    <input type="text" class="form-control" name="nama_lomba" placeholder="Nama Lomba" required>
                </div>
                <div class="form-group">
                    <label for="jenis_lomba">Jenis Lomba:</label>
                    <input type="text" class="form-control" name="jenis_lomba" placeholder="Jenis Lomba" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" name="status" placeholder="Status" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="timeline">Timeline:</label>
                    <textarea class="form-control" name="timeline" placeholder="Timeline" required></textarea>
                </div>
                <div class="form-group">
                    <label for="ketentuan">Ketentuan:</label>
                    <textarea class="form-control" name="ketentuan" placeholder="Ketentuan" required></textarea>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya:</label>
                    <textarea class="form-control" name="biaya" placeholder="Biaya" required></textarea>
                </div>
                <div class="form-group">
                    <label for="link_pendaftaran">Link Pendaftaran:</label>
                    <input type="text" class="form-control" name="link_pendaftaran" placeholder="Link Pendaftaran" required>
                </div>
                <div class="form-group">
                    <label for="link_guidebook">Link Guidebook:</label>
                    <input type="text" class="form-control" name="link_guidebook" placeholder="Link Guidebook" required>
                </div>
                <div class="form-group">
                    <label for="kontak">Kontak:</label>
                    <input type="text" class="form-control" name="kontak" placeholder="Kontak" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label>
                    <input type="date" class="form-control" name="tanggal_pelaksanaan" required>
                </div>
                <div class="form-group">
                    <label for="poster">Poster:</label>
                    <input type="file" class="form-control-file" name="poster" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Lomba</button>
            </div>
        </div>
    </form>
</div>
@endsection
