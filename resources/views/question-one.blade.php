@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold">Task 1</h1>
        <p class="mt-10 text-center text-2xl">Lorem ipsum dolor sit amet, coi nobis iores quam ut voluptates.</p>
        <div class="mx-auto text-center mt-20">
            <a class="border py-3 px-4 rounded-lg shadow hover:bg-black hover:text-white" href="{{ route('about-you') }}">
                Begin
            </a>
        </div>
    </div>
@endsection
