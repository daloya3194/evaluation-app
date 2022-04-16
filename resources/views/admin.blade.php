@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold">Admin Panel</h1>
        <div class="mt-8 mb-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
                <form class="mb-0 space-y-6" action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
                        <div class="mt-1">
                            <input id="images" name="images[]" type="file" required multiple class="w-full border py-2 px-4 border-gray-300 rounded-lg shadow-sm focus:border-black focus:ring-black">
                        </div>
                    </div>

                    <div>
                        <label for="cluster_id" class="block text-sm font-medium text-gray-700">Cluster</label>
                        <div class="mt-1">
                            <select name="cluster_id" id="cluster_id" required>
                                <option disabled selected>Please Select...</option>
                                @isset($clusters)
                                    @foreach($clusters as $cluster)
                                        <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black">
                            Upload Images
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
