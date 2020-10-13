<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$skill->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="m-4 p-4 rounded">
                    <div class="my-2 p-2 bg-indigo-200 rounded-sm"><p>{{$skill->name}}</p></div>
                        <div class="block border rounded-lg p-4 bg-indigo-200">
                            <h2 class="text-indigo-700 text-lg">Candidates with this skill</h2>
                            <hr>
                            <div class="bg-white rounded p-2">
                                <ul>
                                    @foreach($skill->resumes()->get() as $r)
                                    <p>{{ $r->user->name}}</p>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="block border rounded-lg mt-4 p-4 bg-indigo-200">
                            <h2 class="text-indigo-700 text-lg">Listings with this skill</h2>
                            <hr>
                            <ul>
                                @foreach($skill->positions()->get() as $p)
                                <div class="bg-white rounded p-2">
                                    <p>
                                        <span class="font-semibold">Job title: </span>{{ $p->title }}
                                    </p>
                                    <p><span class="font-semibold">Posted by: </span>{{ $p->team->name}}</p>
                                </div>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
