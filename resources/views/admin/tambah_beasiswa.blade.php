@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Tambah Beasiswa</h2>
    <form method="POST" action="{{ route('admin.store_beasiswa') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama Beasiswa:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="provider">Penyedia:</label>
                    <input type="text" class="form-control" name="provider" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" name="status" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="field_of_study">Bidang Studi:</label>
                    <input type="text" class="form-control" name="field_of_study" required>
                </div>
                <div class="form-group">
                    <label for="country">Negara:</label>
                    <input type="text" class="form-control" name="country" required>
                </div>
                <div class="form-group">
                    <label for="eligibility_criteria">Kriteria Kelayakan:</label>
                    <textarea class="form-control" name="eligibility_criteria" required></textarea>
                </div>
                <div class="form-group">
                    <label for="education_level">Tingkat Pendidikan:</label>
                    <input type="text" class="form-control" name="education_level" required>
                </div>
                <div class="form-group">
                    <label for="benefits">Benefit:</label>
                    <textarea class="form-control" name="benefits" required></textarea>
                </div>
                <div class="form-group">
                    <label for="selection_process">Proses Seleksi:</label>
                    <textarea class="form-control" name="selection_process" required></textarea>
                </div>
                <div class="form-group">
                    <label for="document_requirements">Persyaratan Berkas:</label>
                    <textarea class="form-control" name="document_requirements" required></textarea>
                </div>
                <div class="form-group">
                    <label for="language_requirements">Persyaratan Bahasa:</label>
                    <textarea class="form-control" name="language_requirements" required></textarea>
                </div>
                <div class="form-group">
                    <label for="application_method">Cara Mendaftar:</label>
                    <textarea class="form-control" name="application_method" required></textarea>
                </div>
                <div class="form-group">
                    <label for="guide_book">Guide Book:</label>
                    <textarea class="form-control" name="guide_book" required></textarea>
                </div>
                <div class="form-group">
                    <label for="official_website">Website Resmi:</label>
                    <textarea class="form-control" name="official_website" required></textarea>
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan:</label>
                    <select class="form-control" name="bulan" required>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                </div>
                <div class="form-group" style="margin-top: 10px;">
                    <label for="poster">Poster:</label>
                    <input type="file" class="form-control-file" name="poster" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Tambah Beasiswa</button>
            </div>
        </div>
    </form>
</div>
@endsection
