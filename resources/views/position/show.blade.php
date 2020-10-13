<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $position->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4 p-4 rounded">
                <p>Posted: {{$position->published}} by {{$position->team->name}}</p>
                <div class="my-2 p-2 bg-gray-100 rounded-sm"><p>{{$position->description}}</p></div>
                <div class="inline-flex">
                    <ul>
                        @foreach($position->skills as $skill)
                        <a class="text-indigo-700 hover:text-indigo-500"  style="transition: all 0.2s" href="{{route('skills.show', $skill->id)}}">
                            <li class="inline-block my-2 p-2 rounded bg-indigo-200">{{$skill->name}}</li>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <p>Expires: {{$position->expires}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
