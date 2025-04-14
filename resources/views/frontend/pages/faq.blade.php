<x-frontend.main-layout title="{{ $title ?? '' }}">
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

    <div class="mt-10">
        <h1 class="font-bold text-3xl text-center text-white pb-10">FREQUENTLY ASKED QUESTION</h1>
        @foreach ($items as $item)
            <div id="accordion-collapse{{ $item->id }}" data-accordion="collapse" class="mt-10 bg-white">
                <h2 id="accordion-collapse{{ $item->id }}-heading-2">
                    <button type="button"
                        class="flex items-center text-black cursor-pointer justify-between w-full p-5 font-medium rtl:text-right text-black border focus:bg-white focus:text-black border-b-0 border-gray-200  gap-3"
                        data-accordion-target="#accordion-collapse{{ $item->id }}-body-2" aria-expanded="false"
                        aria-controls="accordion-collapse{{ $item->id }}-body-2">
                        <span>{{ $item->question }}</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse{{ $item->id }}-body-2" class="hidden"
                    aria-labelledby="accordion-collapse{{ $item->id }}-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $item->answer }}</p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-frontend.main-layout>
