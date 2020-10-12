<div class="mx-auto pt-8">
    @foreach($positions as $position)
        <div class="my-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="m-4 p-4 rounded">
            <h3 class="font-semibold text-indigo-700 text-lg"><a href="{{route('positions.show',$position->id)}}">{{$position->title}}</a></h3>
            <div class="my-2 p-2 bg-gray-100 rounded-sm">
                <p>{{$position->description}}</p>
            </div>
            <div class="inline-flex">
                <ul>
                    @foreach($position->skills as $skill)
                    <a class="text-indigo-700 hover:text-indigo-500"  style="transition: all 0.2s" href="{{route('skills.show', $skill->id)}}">
                        <li class="inline-block my-2 p-2 rounded bg-indigo-200">{{$skill->name}}</li>
                    </a>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    @endforeach
</div>
