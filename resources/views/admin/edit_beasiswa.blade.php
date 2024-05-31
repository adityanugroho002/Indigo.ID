@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Beasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update_beasiswa', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Form fields for beasiswa data -->
        <div class="form-group">
            <label for="name">Nama Beasiswa:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $beasiswa->name }}" required>
        </div>
        <div class="form-group">
            <label for="provider">Penyedia:</label>
            <input type="text" class="form-control" id="provider" name="provider" value="{{ $beasiswa->provider }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $beasiswa->status }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $beasiswa->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="field_of_study">Bidang Studi:</label>
            <input type="text" class="form-control" id="field_of_study" name="field_of_study" value="{{ $beasiswa->field_of_study }}" required>
        </div>
        <div class="form-group">
            <label for="country">Negara:</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ $beasiswa->country }}" required>
        </div>
        <div class="form-group">
            <label for="eligibility_criteria">Kriteria Kelayakan:</label>
            <textarea class="form-control" id="eligibility_criteria" name="eligibility_criteria" required>{{ $beasiswa->eligibility_criteria }}</textarea>
        </div>
        <div class="form-group">
            <label for="education_level">Tingkat Pendidikan:</label>
            <input type="text" class="form-control" id="education_level" name="education_level" value="{{ $beasiswa->education_level }}" required>
        </div>
        <div class="form-group">
            <label for="benefits">Benefit:</label>
            <textarea class="form-control" id="benefits" name="benefits" required>{{ $beasiswa->benefits }}</textarea>
        </div>
        <div class="form-group">
            <label for="selection_process">Proses Seleksi:</label>
            <textarea class="form-control" id="selection_process" name="selection_process" required>{{ $beasiswa->selection_process }}</textarea>
        </div>
        <div class="form-group">
            <label for="document_requirements">Persyaratan Berkas:</label>
            <textarea class="form-control" id="document_requirements" name="document_requirements" required>{{ $beasiswa->document_requirements }}</textarea>
        </div>
        <div class="form-group">
            <label for="language_requirements">Persyaratan Bahasa:</label>
            <textarea class="form-control" id="language_requirements" name="language_requirements" required>{{ $beasiswa->language_requirements }}</textarea>
        </div>
        <div class="form-group">
            <label for="application_method">Cara Mendaftar:</label>
            <textarea class="form-control" id="application_method" name="application_method" required>{{ $beasiswa->application_method }}</textarea>
        </div>
        <div class="form-group">
            <label for="guide_book">Guide Book:</label>
            <textarea class="form-control" id="guide_book" name="guide_book" required>{{ $beasiswa->guide_book }}</textarea>
        </div>
        <div class="form-group">
            <label for="official_website">Website Resmi:</label>
            <input type="text" class="form-control" id="official_website" name="official_website" value="{{ $beasiswa->official_website }}" required>
        </div>
        <div class="form-group">
            <label for="bulan">Bulan:</label>
            <select class="form-control" id="bulan" name="bulan" required>
                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                    <option value="{{ $month }}" {{ $beasiswa->bulan == $month ? 'selected' : '' }}>{{ $month }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="poster">Poster:</label>
            <input type="file" class="form-control-file" id="poster" name="poster">
            <img src="{{ asset($beasiswa->poster) }}" alt="Poster" style="max-height: 200px; margin-top: 10px;">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
