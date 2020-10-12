<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Listings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($positions as $position)
            <div class="my-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4 p-4 rounded">
                <h3 class="font-semibold text-indigo-700 text-lg"><a href="{{route('positions.show',$position->id)}}">{{$position->title}}</a></h3>
                <p>Posted: {{$position->published}}</p>
                <div class="my-2 p-2 bg-gray-100 rounded-sm">
                    <p>{{$position->description}}</p>
                </div>
                <div class="inline-flex">
                    <ul>
                        @foreach($position->skills as $skill)
                        <a href="{{route('skills.show', $skill->id)}}">
                            <li class="inline-block my-2 p-2 rounded bg-indigo-200">{{$skill->name}}</li>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <p>Expires: {{$position->expires}}</p>
                </div>


            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
