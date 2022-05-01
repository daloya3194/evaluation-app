@extends('layouts.app')

@section('content')
    <div class="container max-w-6xl mx-auto mt-20">
        <h1 class="text-center text-5xl font-bold text-green-600">Next Step</h1>

        <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A at consequuntur deserunt dolorum ducimus eos, excepturi facere harum incidunt minus nam nisi nobis numquam placeat quis suscipit tempore voluptatum. Animi aspernatur consectetur doloribus expedita, hic incidunt laborum nostrum officiis? Deleniti laboriosam officiis rem, saepe sapiente ullam voluptas voluptate voluptatem? Accusamus doloribus dolorum eos, ipsa nulla quidem quis sapiente. Dolore dolorem dolores ducimus error esse exercitationem magnam molestias, nisi omnis provident repellat repellendus sapiente tempore ut voluptas, voluptate voluptates. Dolore dolorum eaque ex officia omnis quae quos sint, voluptatem. Architecto commodi et iusto molestias natus, rem suscipit. Maiores quam ut voluptates.</p>

        <div class="flex justify-center gap-5 mx-auto text-center mt-10">
            <a href="{{ route('question-next-step', 7) }}" class="uppercase font-bold text-white bg-green-600 hover:bg-green-500 py-4 px-24 rounded-lg">Continue</a>
        </div>
    </div>
@endsection
