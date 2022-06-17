@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">

        <h1 class="text-center text-5xl font-bold">Task 6</h1>

        <br>

{{--        <p class="text-2xl font-bold text-center">Find this image</p>--}}
{{--        <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-64 mx-auto" alt="dfvf">--}}

        {{--mode follow--}}
        <div class="sticky z-10 top-0 bg-white pb-2">
            <p class="text-2xl font-bold text-center">Find this image</p>
            <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-56 mx-auto" alt="dfvf">
        </div>

        <br>

        <div>
            <form action="" method="POST">
                @csrf
                <br>
                <input type="hidden" value="{{ $question['id'] }}" name="question_id" id="question_id">
                <input type="hidden" value="{{ session('participant')['id'] }}" name="participant_id" id="participant_id">
                <input type="hidden" value="{{ route('go-to-next-step') }}" name="route_ready_to_start" id="route_ready_to_start">
                <br>
                <div class="grid grid-cols-6 gap-3">
                    @isset($images)
                        @foreach($images as $image)
                            <div class="bg-black">
                                <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 7)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                    <img src="{{ $image->path }}" class="h-64 w-64 object-cover hover:scale-105" alt="{{ $image->name }}">
                                </label>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
@endsection
