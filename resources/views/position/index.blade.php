<x-app-layout>
    <x-slot name="header">
        {{ __('Job Listings') }}
    </x-slot>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @include('partials.listings')
        </div>
    </div>
</x-app-layout>
