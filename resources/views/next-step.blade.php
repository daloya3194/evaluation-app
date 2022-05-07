@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold text-green-600">Next Step</h1>

        <p class="mt-20 text-2xl">From now on, the corresponding image will be in one of the following clusters. To explore the images in a cluster, click on the cover image.</p>

        <div class="flex justify-center gap-5 mx-auto text-center mt-10">
            <a href="{{ route('question-next-step', 7) }}" class="uppercase font-bold text-white bg-green-600 hover:bg-green-500 py-4 px-24 rounded-lg">Continue</a>
        </div>
    </div>
@endsection
