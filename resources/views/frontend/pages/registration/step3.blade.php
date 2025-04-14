<x-frontend.main-layout>
    <div class="flex gap-5">
        <a href="{{ route('frontend.home') }}" class="mb-10">
            <svg fill="#ffffff" width="34px" height="34px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <g data-name="Layer 2">
                        <g data-name="arrow-back">
                            <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                            <path
                                d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 4 12a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
        </a>
        <h1 class="text-xl font-bold text-white">Performance</h1>
    </div>

    <form action="{{ route('frontend.registration.step4') }}" method="post">
        @csrf
        <div class="flex flex-row gap-2 mb-4">
            <div class="w-1/2">
                <label for="type_performance" class="block mb-2 text-sm font-medium text-white dark:text-white">Type
                    Of Performance</label>
                <input type="text" id="type_performance" name="type_performance"
                    class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
                @error('type_performance')
                    <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-row gap-2 mb-4">
            <div class="w-1/2">
                <label for="name_performance"
                    class="block mb-2 text-sm font-medium text-white dark:text-white">Name/Title of
                    Performance</label>
                <input type="text" id="name_performance" name="name_performance"
                    class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
                @error('name_performance')
                    <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="time_performance" class="block mb-2 text-sm font-medium text-white dark:text-white">Time
                    of Perfomance (minutes)</label>
                <input type="text" id="time_performance" name="time_performance"
                    class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
                @error('time_performance')
                    <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="flex flex-row gap-2 mb-4">
            <div class="w-1/2">
                <label for="type_music" class="block mb-2 text-sm font-medium text-white dark:text-white">Type
                    Of Music</label>
                <input type="text" id="type_music" name="type_music"
                    class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
                @error('type_music')
                    <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-row gap-2 mb-4">
            <div class="">
                <label for="number_performance" class="block mb-2 text-sm font-medium text-white dark:text-white">Number
                    of Perfomances</label>
                <input type="text" id="number_performance" name="number_performance"
                    class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
                @error('number_performance')
                    <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-row gap-4 mb-4 justify-end items-center">
            <div>
                <button type="submit" class="bg-gray-500 px-10 py-3 text-white rounded-lg cursor-pointer">Next
                    Section</button>
            </div>
        </div>
    </form>
    @push('scripts')
        <script>
            const dataFromServer = {!! json_encode($reqJson) !!};
            localStorage.setItem('step2Data', dataFromServer);
        </script>
    @endpush
</x-frontend.main-layout>
