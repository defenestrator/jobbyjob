<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight text-center sm:text-left">
            {{$skill->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4 sm:rounded-lg overflow-hidden bg-indigo-200 shadow-xl">
                <div class="block  p-4 ">
                <h2 class="text-indigo-700 text-lg mb-4">{{$skill->resumes()->count()}} Candidates with this skill</h2>
                    <hr>
                    <div class="bg-white rounded p-2">
                        <ul>
                            @foreach($skill->resumes()->get() as $r)
                            <p>{{ $r->user->name}}</p>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="block mt-4 p-4">
                    <h2 class="text-indigo-700 text-lg mb-4">{{$skill->positions()->count()}} Job Listings with this skill</h2>
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
</x-app-layout>
