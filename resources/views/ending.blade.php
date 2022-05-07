@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold text-green-600">End</h1>

        <p class="mt-20 text-2xl text-center">Thank you for taking part in this test.</p>

        <br>
        <br>
        <br>

        <div class="mx-auto text-center mt-20">
            <a class="border py-3 px-8 rounded-lg shadow hover:bg-black hover:text-white" href="{{ route('welcome') }}">
                New Participant
            </a>
        </div>
    </div>
@endsection
