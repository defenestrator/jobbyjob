<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $listing->position->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
{{-- {{dd($skills)}} --}}
                <div class="m-4 p-4 border border-bottom-cool-gray-500 rounded">
                <h3 class="font-semibold text-lg"><a href="{{route('listing.show',$listing->id)}}">{{$listing->position->title}}</a></h3>
                <p>Posted: {{$listing->published}}</p>
                <div class="m-2 p-2 bg-gray-200 rounded-sm"><p>{{$listing->position->description}}</p></div>
                SKILLS: @foreach($skills as $skill)<p>{{$skill}}</p>
                @endforeach
                <p>Listing Expires {{$listing->expires}}</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
