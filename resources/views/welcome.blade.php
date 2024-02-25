@extends('layout.main')
@auth
    @include('layout.navbar')
@endauth
@section('content')

<div class="text-center mt-10 text-2xl font-semibold">
    @auth
        <h2>You'r Loged In</h2>
        <a href="dashboard" class="bg-blue-500 py-1 px-3 rounded-md text-base mt-3 text-white block w-min mx-auto">Dashboard</a>
    @endauth
    @guest
        <h1>Selamat Datang di Invoce App by Imamrifai</h1>
        <div class="mt-5 flex items-center gap-5 justify-center text-white">
            <a href="register" class="bg-blue-500 py-1 px-3 rounded-md text-base">Daftar</a>
            <a href="login" class="bg-green-500 py-1 px-3 rounded-md text-base">Masuk</a>
            <a href="guest" class="bg-yellow-500 py-1 px-3 rounded-md text-base">Tamu</a>
        </div>
    @endguest
</div>

@endsection
