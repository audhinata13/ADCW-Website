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
        <h1 class="text-xl font-bold text-white">Registration Summary</h1>
    </div>

    <div class="flex w-1/2 justify-center border-white">
        <form action="{{ route('frontend.registration.step4') }}" method="post">
            @csrf
            <div class="flex w-fullborder-4  justify-center">
                <div>
                    <h2 class="text-white text-lg mb-3 font-normal">Event Details</h2>
                    <div class="flex gap-4 w-full">
                        <div class="w-1/3">
                            <img src="{{ asset('assets/img/example-image.jpg') }}" class="h-12 w-full" alt="">
                        </div>
                        <div>
                            <h2 class="text-white">Event Name</h2>
                            <p class="text-xs text-white">Location</p>
                            <p class="text-xs text-white">Waktu</p>
                        </div>
                        <div class="border-t border-white border-4 h-2"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row gap-4 mb-4 justify-end items-center">
                <div>
                    <button type="submit" class="bg-gray-500 px-10 py-3 text-white rounded-lg cursor-pointer">Next
                        Section</button>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            const dataFromServer = {!! json_encode($reqJson) !!};
            localStorage.setItem('step2Data', dataFromServer);
        </script>
    @endpush
</x-frontend.main-layout>
