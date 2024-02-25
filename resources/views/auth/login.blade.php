@extends('layout.main')

@section('content')
<div class="text-center mt-10">
    <h1 class="text-2xl font-semibold">Selamat Datang di Invoice App by Imamrifai</h1>
    @if (session('status'))
    <p class="text-center text-sm text-blue-500">
        {{ session('status') }}
    </p>
    @endif
    <div class="mt-5">
        <h2 class="text-xl font-semibold text-blue-500">Form Login</h2>
        <form action="login" method="post" class="text-left w-3/12 mx-auto mt-4 rounded-sm border-blue-500 border-2 shadow-md p-3">
            @csrf
            @error('email')
                <span class="text-red-600 text-sm mt-1">{{$message}}</span>
            @enderror
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="example@example.com" class="w-full border-b-2 border-gray-500 p-2 outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" autocomplete="false" name="password" placeholder="Your Password" class="w-full border-b-2 border-gray-500 p-2 outline-none focus:border-blue-500" required>
                @error('password')
                    <span class="text-red-600 text-sm mt-1">{{$message}}</span>
                @enderror
            </div>
            <p class="text-sm my-3">Don't have an Account ? <a href="/register" class="text-blue-500 hover:underline">Register here!</a></p>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
        </form>
    </div>
</div>
@endsection
