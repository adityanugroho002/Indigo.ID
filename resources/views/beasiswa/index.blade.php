@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Beasiswa</h1>
    <form method="GET" action="{{ route('daftar_beasiswa') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Beasiswa" value="{{ request('search') }}">
            <select name="bulan" class="custom-select">
                <option value="">Pilih Bulan</option>
                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                    <option value="{{ $month }}" {{ request('bulan') == $month ? 'selected' : '' }}>
                        {{ $month }}
                    </option>
                @endforeach
            </select>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach ($beasiswa as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="{{ asset($item->poster) }}" class="card-img-top" alt="Poster" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailModal{{ $item->id }}" style="flex-grow: 1; margin-right: 8px;">
                            Detail
                        </button>
                        <a href="{{ asset($item->poster) }}" download class="btn btn-success" style="flex-grow: 1;">Unduh Poster</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $item->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align: justify;">
                        <strong>Penyedia:</strong> {{ $item->provider }}<br>
                        <strong>Status:</strong> {{ $item->status }}<br>
                        <strong>Negara:</strong> {{ $item->country }}<br>
                        <strong>Tingkat Pendidikan:</strong> {{ $item->education_level }}<br>
                        <strong>Deskripsi:</strong> {{ $item->description }}<br>
                        <strong>Bidang Studi:</strong> {{ $item->field_of_study }}<br>
                        <strong>Kriteria Kelayakan:</strong> {{ $item->eligibility_criteria }}<br>
                        <strong>Manfaat:</strong> {{ $item->benefits }}<br>
                        <strong>Proses Seleksi:</strong> {{ $item->selection_process }}<br>
                        <strong>Syarat Dokumen:</strong> {{ $item->document_requirements }}<br>
                        <strong>Syarat Bahasa:</strong> {{ $item->language_requirements }}<br>
                        <strong>Metode Aplikasi:</strong> {{ $item->application_method }}<br>
                        <strong>Guide Book:</strong> {{ $item->guide_book }}<br>
                        <strong>Website Resmi:</strong> {{ $item->official_website }}<br>
                        <strong>Bulan:</strong> {{ $item->bulan }}<br>
                        <strong>Biaya:</strong> {{ $item->biaya }}<br>
                        <strong>Link Pendaftaran:</strong> <a href="{{ $item->link_pendaftaran }}">{{ $item->link_pendaftaran }}</a><br>
                        <strong>Link Guidebook:</strong> <a href="{{ $item->link_guidebook }}">{{ $item->link_guidebook }}</a><br>
                        <strong>Kontak:</strong> {{ $item->kontak }}<br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .modal-body {
        text-align: justify;
    }
</style>
@endsection
