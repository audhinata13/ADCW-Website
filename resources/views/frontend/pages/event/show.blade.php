<x-frontend.main-layout title="{{ $title ?? '' }}">
    <a href="{{ route('frontend.event.index') }}" class="mb-10">
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
        <div class="w-full border-15 rounded-lg">
            <img src="{{ $item->image() }}" alt="" class=" rounded-lg w-full object-cover h-[330px]">
        </div>
        <div class="flex flex-row justify-between mt-10">
            <div class="">
                <h1 class="text-white text-xl font-light mb-4"> {{ $item->name }}</h1>
                <p class="text-xs text-white font-light flex gap-1 mb-2">
                    <svg width="14px" height="14px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    {{ $item->location }}
                </p>
                <p class="text-xs flex  text-white font-light gap-1 mb-5">
                    <svg width="14px" height="14px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    {{ $item->formatDate() }}
                </p>
            </div>
            <div class="bg-white rounded-xl p-5 text-center w-60">
                <h2 class="text-xs text-gray-500">Participation Fee</h2>
                <div class="text-sm text-gray-800">IDR {{ $item->feeFormat() }}/pax</div>
                <a href="{{ route('frontend.registration', [
                    'slug' => $item->slug,
                    'step' => 1,
                ]) }}"
                    class="text-xs bg-[#001A3D] px-4 w-full py-2 text-center rounded-lg text-white block mt-5">Register
                    Now</a>
            </div>
        </div>
        <div>
            <h2 class="text-white mb-3">Event Information</h2>
            <div class="mb-2 text-white dark:text-white text-sm">
                {!! $item->description !!}
            </div>
        </div>


        <div id="accordion-collapse2" data-accordion="collapse" class="mt-5 bg-white">
            <h2 id="accordion-collapse2-heading-2">
                <button type="button"
                    class="flex items-center text-black cursor-pointer justify-between w-full p-5 font-medium rtl:text-right text-black border focus:bg-white focus:text-black border-b-0 border-gray-200  gap-3"
                    data-accordion-target="#accordion-collapse2-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse2-body-2">
                    <span>Terms and Conditions</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse2-body-2" class="hidden" aria-labelledby="accordion-collapse2-heading-2">
                <div class="p-5 border border-b-0 border-gray-200">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        {!! $item->terms !!}
                    </p>

                </div>
            </div>
        </div>
        <div id="accordion-collapse" data-accordion="collapse" class="mt-5 bg-white">
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center text-black cursor-pointer justify-between w-full p-5 font-medium rtl:text-right text-black border focus:bg-white focus:text-black border-b-0 border-gray-200  gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>Participation Fee</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-200">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        {!! $item->fee_description !!}
                    </p>

                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            .description {
                color: white !important;
            }
        </style>
    @endpush
</x-frontend.main-layout>
