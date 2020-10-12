<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$skill->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4 p-4 rounded">
                    <div class="my-2 p-2 bg-indigo-200 rounded-sm"><p>{{$skill->name}}</p></div>
                        <div class="inline-flex">
                            <ul>
                                @foreach($skill->resumes()->get() as $resume)
                                    {{ $resume->cv }}
                                @endforeach
                            </ul>
                        </div>

                        <div class="inline-flex">
                            <ul>
                                @foreach($skill->positions()->get() as $p)
                                    {{ $p }}
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
