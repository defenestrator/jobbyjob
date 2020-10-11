<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Address Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($addresses as $address)
            @if($address->addressable_type == 'App\Models\Resume')<p>{{$address->address_1}}<br>{{$address->address_2}}</p>
                @endif
                {{-- <p>{{$address}}</p> --}}
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
