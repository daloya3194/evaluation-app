@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-20">

        <h1 class="text-center text-5xl font-bold">Task 9</h1>

        <br>

        <p class="text-2xl font-bold text-center">{{ $question->question }}</p>

        <input type="hidden" value="{{ $question['id'] }}" name="question_id" id="question_id">
        <input type="hidden" value="{{ session('participant')['id'] }}" name="participant_id" id="participant_id">

        <br>
        <br>
        <br>

        <div class="grid grid-cols-3 gap-7">
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal_cluster_1">
                <img class="w-full h-96 object-cover mx-auto shadow-sm hover:shadow-2xl hover:scale-105 mb-7" src="{{ $cluster_1->take(1)->first()->path }}" alt="{{ $cluster_1->take(1)->first()->name }}">
                <span class="text-xl font-bold bg-transparent">Cluster 1</span>
            </button>
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal_cluster_2">
                <img class="w-full h-96 object-cover mx-auto shadow-sm hover:shadow-2xl hover:scale-105 mb-7" src="{{ $cluster_2->take(1)->first()->path }}" alt="{{ $cluster_1->take(1)->first()->name }}">
                <span class="text-xl font-bold bg-transparent">Cluster 2</span>
            </button>
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal_cluster_3">
                <img class="w-full h-96 object-cover mx-auto shadow-sm hover:shadow-2xl hover:scale-105 mb-7" src="{{ $cluster_3->take(1)->first()->path }}" alt="{{ $cluster_1->take(1)->first()->name }}">
                <span class="text-xl font-bold bg-transparent">Cluster 3</span>
            </button>
        </div>

    </div>

    <!-- Modal Cluster 1 -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_cluster_1" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                        Cluster 1
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <form>
                        @csrf
                        <div class="grid grid-cols-5 gap-1">
                            @isset($cluster_1)
                                @foreach($cluster_1 as $image)
                                    <div class="bg-black">
                                        <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 10)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                        <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                            <img src="{{ $image->path }}" class="h-64 w-64 object-cover hover:scale-105" alt="{{ $image->name }}">
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </form>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cluster 2 -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_cluster_2" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                        Cluster 2
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <form>
                        @csrf
                        <div class="grid grid-cols-5 gap-1">
                            @isset($cluster_2)
                                @foreach($cluster_2 as $image)
                                    <div class="bg-black">
                                        <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 10)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                        <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                            <img src="{{ $image->path }}" class="h-64 w-64 object-cover hover:scale-105" alt="{{ $image->name }}">
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </form>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cluster 3 -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_cluster_3" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                        Cluster 3
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <form>
                        @csrf
                        <div class="grid grid-cols-5 gap-1">
                            @isset($cluster_3)
                                @foreach($cluster_3 as $image)
                                    <div class="bg-black">
                                        <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 10)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                        <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                            <img src="{{ $image->path }}" class="h-64 w-64 object-cover hover:scale-105" alt="{{ $image->name }}">
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </form>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
