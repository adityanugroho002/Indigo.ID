@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f4f4f4;
                color: #333;
            }
            .content {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }
            .card-container {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }
            .card {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 6px 10px rgba(0,0,0,0.1);
                margin: 20px;
                padding: 20px;
                flex: 1 1 calc(50% - 40px);
                display: flex;
                flex-direction: column;
            }
            .card h2 {
                color: #000;
                margin-bottom: 15px;
                text-align: center; /* Center the header text */
            }
            .card h3 {
                color: #333;
                margin-bottom: 2px;
                margin-top: 5px;
            }

            .card p.justify-text {
                margin-bottom: 2px; /* Atur sesuai kebutuhan */
            }

            .card a {
                display: inline-block;
                margin-top: 2px;
                margin-bottom: 20px;
            }

            .links a {
                color: #000;
                text-decoration: none;
                font-weight: 500;
            }
            .justify-text {
                text-align: justify;
            }
            .image-container {
                position: relative;
                width: 100%;
                height: 50vh;
                overflow: hidden;
                margin-bottom: 20px;
            }
            .image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .overlay-card {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 6px 10px rgba(0,0,0,0.1);
                text-align: center;
                font-size: 24px;
                font-weight: 700;
                color: #000;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="image-container">
                <img src="{{ asset('assets/images/background/background.png') }}" alt="Background Image">
                <div class="overlay-card">Selamat Datang di Dashboard Peluang!</div>
            </div>
            <div class="card-container">
                <!-- Daftar Beasiswa -->
                <div class="card">
                    <h2>Daftar Beasiswa</h2>
                    @foreach ($beasiswa as $item)
                        <div>
                            <h3>{{ $item->name }}</h3>
                            <p class="justify-text">{{ \Illuminate\Support\Str::limit($item->description, 100, $end='...') }}</p>
                            @if(Auth::check())
                                @if(Auth::user()->is_admin)
                                    <a href="/admin/daftar-beasiswa">Lihat Detail</a>
                                @else
                                    <a href="{{ route('daftar_beasiswa') }}">Selengkapnya...</a>
                                @endif
                            @else
                                <a href="/login">Selengkapnya...</a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Daftar Lomba -->
                <div class="card">
                    <h2>Daftar Lomba</h2>
                    @foreach ($lomba as $item)
                        <div>
                            <h3>{{ $item->nama_lomba }}</h3>
                            <p class="justify-text">{{ \Illuminate\Support\Str::limit($item->deskripsi, 100, $end='...') }}</p>
                            @if(Auth::check())
                                @if(Auth::user()->is_admin)
                                    <a href="/admin/daftar-lomba">Lihat Detail</a>
                                @else
                                    <a href="{{ route('daftar_lomba') }}">Selengkapnya...</a>
                                @endif
                            @else
                                <a href="/login">Selengkapnya...</a>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </body>
</html>
@endsection
