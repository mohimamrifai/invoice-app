@extends('layout.main')

@section('content')

<div class="text-center mt-10">
    <h1 class="text-2xl font-semibold">Selamat Datang di Invoice App by Imamrifai</h1>
    <div class="mt-5">
        <h2 class="text-xl font-semibold text-blue-500">Form Register</h2>
        <form action="register" method="post" class="text-left w-3/12 mx-auto mt-4 rounded-sm border-blue-500 border-2 shadow-md p-3">
            @csrf 
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" value="{{old('name')}}" id="name" name="name" placeholder="John Doe" class="w-full border-b-2 border-gray-500 p-2 outline-none focus:border-blue-500" required>
                @error('name')
                    <span class="text-red-600 text-sm mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="example@example.com" class="w-full border-b-2 border-gray-500 p-2 outline-none focus:border-blue-500">
                @error('email')
                    <span class="text-red-600 text-sm mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" name="password" placeholder="Your Password" class="w-full border-b-2 border-gray-500 p-2 outline-none focus:border-blue-500" required>
                @error('password')
                    <span class="text-red-600 text-sm mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full border-b-2 border-gray-500 p-2 outline-none focus:border-blue-500" required>
                @error('password_confirmation')
                    <span class="text-red-600 text-sm mt-1">{{$message}}</span>
                @enderror
            </div>
            <p class="text-sm my-3">Do you have an Account ? <a href="/login" class="text-blue-500 hover:underline">Login here!</a></p>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
        </form>
    </div>
</div>

@endsection
