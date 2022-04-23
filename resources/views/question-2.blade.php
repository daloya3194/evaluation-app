@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">

        <h1 class="text-center text-5xl font-bold">Task 2</h1>

        <br>

        <p class="text-2xl font-bold text-center">{{ $question->question }}</p>

        <br>

        <div>
            <form action="{{ route('question-2-submit') }}" method="POST">
                @csrf
                <br>
                <input type="hidden" value="{{ $question['id'] }}" name="question_id">
                <input type="hidden" value="{{ session('participant')['id'] }}" name="participant_id">
                <br>
                <div class="grid grid-cols-5 gap-3">
                    @isset($images)
                        @foreach($images as $image)
                            <div class=" bg-black">
                                <input class="sr-only peer" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                    <img src="{{ $image->path }}" class="h-56 w-56 object-cover" alt="{{ $image->name }}">
                                </label>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <br>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-gray-600">
                        Submit
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection
