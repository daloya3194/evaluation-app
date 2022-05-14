@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold">Study Description</h1>
        <p class="mt-20 text-2xl">In order to evaluate our cluster model, we have set up this application. The following exercises will consist of finding specific images. You will be presented with a dataset containing images that are all mixed together.We are going to show you an image and you will have to find it in the dataset.
            Before starting the exercise we will ask you your age and we would also like to know if you suffer from any visual disease. All this will of course be anonymous.</p>
        <div class="mx-auto text-center mt-20">
            <a class="border py-3 px-8 rounded-lg shadow hover:bg-black hover:text-white" href="{{ route('about-you') }}">
                Begin
            </a>
        </div>
    </div>
@endsection
