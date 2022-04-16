@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold">Demo Task Description</h1>

        <div class="mt-20">
            <p class="text-md">Participant age: <span class="font-bold">{{ $participant->age }}</span></p>
            <p class="text-md">Eyes problem: <span class="font-bold">{{ $participant->eyes_problems ? 'yes' : 'no' }}</span></p>
        </div>

        <br>

        <p class="text-2xl font-bold text-center">{{ $question->question }}</p>

        <br>

        <div>
            <form action="{{ route('submit-demo-task') }}" method="POST">
                @csrf
                <br>
                <input type="hidden" value="{{ $question['id'] }}" name="question_id">
                <input type="hidden" value="{{ $participant['id'] }}" name="participant_id">
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
{{--                <input type="hidden" name="start_time" value="{{ $start_time }}">--}}
                <br>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-gray-600">
                        Submit
                    </button>
                </div>
                <br>
            </form>
        </div>
        {{--<div class="mt-8 mb-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
                <form class="mb-0 space-y-6" action="{{ route('create-participant') }}" method="POST">
                    @csrf
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                        <div class="mt-1">
                            <input id="age" name="age" type="number" autocomplete="age" min="1" max="100" required
                                   class="">
                        </div>
                    </div>

                    <div>
                        <label for="eyes_problems" class="block text-sm font-medium text-gray-700">Do you have any eyes problems?</label>
                        <div class="mt-1">
                            <select name="eyes_problems" id="eyes_problems"
                                    class="" required>
                                <option disabled selected>Please Select...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>--}}
    </div>
@endsection
