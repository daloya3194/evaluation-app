@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">

        <h1 class="text-center text-5xl font-bold">Task 12</h1>

{{--        <p class="text-2xl font-bold text-center">Find this image</p>--}}
{{--        <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-64 mx-auto" alt="dfvf">--}}

        <div class="sticky z-10 top-0 bg-white mt-2">
            <p class="text-2xl font-bold text-center">Find this image</p>
            <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-56 mx-auto" alt="dfvf">
        </div>

        <input type="hidden" value="{{ $question['id'] }}" name="question_id" id="question_id">
        <input type="hidden" value="{{ session('participant')['id'] }}" name="participant_id" id="participant_id">
        <input type="hidden" value="{{ route('ending') }}" name="ending" id="ending">

        <br>
        <br>

        <div class="grid grid-cols-3 gap-7">
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal_cluster_1">
                <img class="w-full h-80 object-cover mx-auto shadow-sm hover:shadow-2xl hover:scale-105 mb-7" src="{{ $cluster_1->random()->path }}" alt="dasfsf">
                <div class="grid grid-cols-2 gap-3 mb-5">
                    <div><img class="w-full h-36 object-cover shadow-sm" src="{{ $cluster_1->random()->path }}" alt="dfsd"></div>
                    <div><img class="w-full h-36 object-cover shadow-sm" src="{{ $cluster_1->random()->path }}" alt="dfsd"></div>
                </div>
                <span class="text-xl font-bold bg-transparent">Cluster 1</span>
            </button>
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal_cluster_2">
                <img class="w-full h-80 object-cover mx-auto shadow-sm hover:shadow-2xl hover:scale-105 mb-7" src="{{ $cluster_2->random()->path }}" alt="dasfsf">
                <div class="grid grid-cols-2 gap-3 mb-5">
                    <div><img class="w-full h-36 object-cover shadow-sm" src="{{ $cluster_2->random()->path }}" alt="dfsd"></div>
                    <div><img class="w-full h-36 object-cover shadow-sm" src="{{ $cluster_2->random()->path }}" alt="dfsd"></div>
                </div>
                <span class="text-xl font-bold bg-transparent">Cluster 2</span>
            </button>
            <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal_cluster_3">
                <img class="w-full h-80 object-cover mx-auto shadow-sm hover:shadow-2xl hover:scale-105 mb-7" src="{{ $cluster_3->random()->path }}" alt="dasfsf">
                <div class="grid grid-cols-2 gap-3 mb-5">
                    <div><img class="w-full h-36 object-cover shadow-sm" src="{{ $cluster_3->random()->path }}" alt="dfsd"></div>
                    <div><img class="w-full h-36 object-cover shadow-sm" src="{{ $cluster_3->random()->path }}" alt="dfsd"></div>
                </div>
                <span class="text-xl font-bold bg-transparent">Cluster 3</span>
            </button>
        </div>

    </div>

    <!-- Modal Cluster 1 -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_cluster_1" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                        Cluster 1
                        <div id="error-1" class="hidden bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full text-center fixed top-0" role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                            </svg>
                            You fail (-_-)
                        </div>
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="sticky z-10 top-0 bg-white pb-2">
                    <p class="text-2xl font-bold text-center">Find this image</p>
                    <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-56 mx-auto" alt="dfvf">
                </div>
                <div class="modal-body relative p-4">
                    <form>
                        @csrf
                        <div class="grid grid-cols-6 gap-1">
                            @isset($cluster_1)
                                @foreach($cluster_1 as $image)
                                    <div class="bg-black">
                                        <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 13)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                        <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                            <img src="{{ $image->path }}" class="h-64 w-full object-cover hover:scale-105" alt="{{ $image->name }}">
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
        <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                        Cluster 2
                        <div id="error-2" class="hidden bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full text-center fixed top-0" role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                            </svg>
                            You fail (-_-)
                        </div>
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="sticky z-10 top-0 bg-white pb-2">
                    <p class="text-2xl font-bold text-center">Find this image</p>
                    <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-56 mx-auto" alt="dfvf">
                </div>
                <div class="modal-body relative p-4">
                    <form>
                        @csrf
                        <div class="grid grid-cols-6 gap-1">
                            @isset($cluster_2)
                                @foreach($cluster_2 as $image)
                                    <div class="bg-black">
                                        <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 13)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                        <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                            <img src="{{ $image->path }}" class="h-64 w-full object-cover hover:scale-105" alt="{{ $image->name }}">
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
        <div class="modal-dialog modal-fullscreen relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalXlLabel">
                        Cluster 3
                        <div id="error-3" class="hidden bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full text-center fixed top-0" role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                            </svg>
                            You fail (-_-)
                        </div>
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="sticky z-10 top-0 bg-white pb-2">
                    <p class="text-2xl font-bold text-center">Find this image</p>
                    <img src="{{ \App\Models\Image::find($question->image_id)->path }}" class="h-56 mx-auto" alt="dfvf">
                </div>
                <div class="modal-body relative p-4">
                    <form>
                        @csrf
                        <div class="grid grid-cols-6 gap-1">
                            @isset($cluster_3)
                                @foreach($cluster_3 as $image)
                                    <div class="bg-black">
                                        <input class="sr-only peer" onclick="verifyImage({{ $image->id }}, '{{ route('question-submit') }}', 13)" type="radio" value="{{ $image->id }}" name="image_id" id="{{ 'image_' . $image->id }}" required>
                                        <label class="flex p-1 bg-white cursor-pointer hover:ring-yellow-500 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ 'image_' . $image->id }}">
                                            <img src="{{ $image->path }}" class="h-64 w-full object-cover hover:scale-105" alt="{{ $image->name }}">
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
