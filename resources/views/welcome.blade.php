<x-guest-layout>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-center pt-8 sm:justify-start sm:pt-1 text-gray-500">

                <h1 class="mt-4" style="font-size:2em; color:#5145cd;"> jobbyjob </h1> <p class="mt-4 hidden ml-2 sm:block">— Free Job Listings</p>
            </div>

            @include('partials.listings')
            <div class="flex justify-center my-4 py-8 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center ml-0">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="-mt-px w-5 h-5 text-gray-400"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        <a href="https://github.com/sponsors/defenestrator" class="ml-1 underline">Sponsor</a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Proudly made with Laravel v{{ Illuminate\Foundation\Application::VERSION }}
                </div>

            </div>


        </div>

    </div>

</x-guest-layout>
