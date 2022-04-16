@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold">About You</h1>
        <div class="mt-8 mb-8 sm:mx-auto sm:w-full sm:max-w-md">
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
        </div>
    </div>
@endsection
