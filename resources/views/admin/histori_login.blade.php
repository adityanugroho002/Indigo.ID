@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Histori Login Admin</h1>
    <p class="mb-3">Ini adalah halaman untuk melihat histori login admin.</p>
    <a href="{{ url('/admin/histori-login/download-txt') }}" class="btn btn-secondary">Download TXT</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Terakhir Login</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->last_login_at ? $user->last_login_at->format('Y-m-d H:i:s') : 'Belum pernah login' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
