@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold text-green-600">Well Done</h1>

        <br>
        <br>
        <br>

        <p class="mt-20 text-center text-3xl font-semibold">Are you ready ?</p>

        <div class="flex justify-center gap-5 mx-auto text-center mt-10">
            <a href="{{ route('question', 0) }}" class="uppercase font-bold text-white bg-red-600 hover:bg-red-500 py-4 px-24 rounded-lg">no</a>
            <a href="{{ route('question', 1) }}" class="uppercase font-bold text-white bg-green-600 hover:bg-green-500 py-4 px-24 rounded-lg">yes</a>
        </div>
    </div>
@endsection
