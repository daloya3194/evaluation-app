@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold">Study Description</h1>
        <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at consequuntur deserunt dolorum ducimus eos, excepturi facere harum incidunt minus nam nisi nobis numquam placeat quis suscipit tempore voluptatum. Animi aspernatur consectetur doloribus expedita, hic incidunt laborum nostrum officiis? Deleniti laboriosam officiis rem, saepe sapiente ullam voluptas voluptate voluptatem? Accusamus doloribus dolorum eos, ipsa nulla quidem quis sapiente. Dolore dolorem dolores ducimus error esse exercitationem magnam molestias, nisi omnis provident repellat repellendus sapiente tempore ut voluptas, voluptate voluptates. Dolore dolorum eaque ex officia omnis quae quos sint, voluptatem. Architecto commodi et iusto molestias natus, rem suscipit. Maiores quam ut voluptates.</p>
        <div class="mx-auto text-center mt-20">
            <a class="border py-3 px-4 rounded-lg shadow hover:bg-black hover:text-white" href="{{ route('about-you') }}">
                Begin
            </a>
        </div>
    </div>
@endsection
