@extends('layout.main')
@include('layout.navbar')
@section('content')
    <div class="w-8/12 mx-auto mt-3">
        <a href="{{ route('invoice') }}" class="underline"> + Buat Invoce</a>
    </div>
@endsection