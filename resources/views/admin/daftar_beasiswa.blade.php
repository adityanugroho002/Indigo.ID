@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Beasiswa</h1>
    <form method="GET" action="{{ route('admin.daftar_beasiswa') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Beasiswa" value="{{ request('search') }}">
            <select name="bulan" class="custom-select">
                <option value="">Pilih Bulan</option>
                @foreach ([
                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                    '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                    '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                    '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                ] as $num => $month)
                    <option value="{{ $num }}" {{ request('bulan') == $num ? 'selected' : '' }}>
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
                    <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#detailModal{{ $item->id }}">
                        Detail
                    </button>
                    <div class="mt-auto text-center">
                        <div class="d-flex justify-content-between">
                            <a href="{{ asset($item->poster) }}" download class="btn btn-primary flex-fill mr-1">Unduh Poster</a>
                            <a href="{{ route('admin.edit_beasiswa', $item->id) }}" class="btn btn-warning flex-fill ml-1 mr-1">Edit</a>
                            <form action="{{ route('admin.hapus_beasiswa', $item->id) }}" method="POST" class="flex-fill ml-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document"> <!-- Mengubah kelas modal-dialog menjadi modal-xl untuk ukuran ekstra besar -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $item->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <strong>Penyedia:</strong> {{ $item->provider }}<br>
                        <strong>Status:</strong> {{ $item->status }}<br>
                        <strong>Deskripsi:</strong> {{ $item->description }}<br>
                        <strong>Bidang Studi:</strong> {{ $item->field_of_study }}<br>
                        <strong>Negara:</strong> {{ $item->country }}<br>
                        <strong>Kriteria Kelayakan:</strong> {{ $item->eligibility_criteria }}<br>
                        <strong>Tingkat Pendidikan:</strong> {{ $item->education_level }}<br>
                        <strong>Benefit:</strong> {{ $item->benefits }}<br>
                        <strong>Proses Seleksi:</strong> {{ $item->selection_process }}<br>
                        <strong>Persyaratan Berkas:</strong> {{ $item->document_requirements }}<br>
                        <strong>Persyaratan Bahasa:</strong> {{ $item->language_requirements }}<br>
                        <strong>Cara Mendaftar:</strong> {{ $item->application_method }}<br>
                        <strong>Guide Book:</strong> {{$item->guide_book }}<br>
                        <strong>Website Resmi:</strong> {{ $item->official_website }}<br>
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
@endsection
