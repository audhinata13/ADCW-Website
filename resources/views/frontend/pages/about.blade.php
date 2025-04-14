<x-frontend.main-layout title="{{ $title ?? '' }}">
    <div class="w-2/3 text-left">
        <h2 class="font-semibold text-white mb-5 text-3xl">OUR VISION</h2>
        <p class="text-white text-xs leading-6 font-light">
            {{ $item->vision }}
        </p>
    </div>
    <div class="flex justify-end">
        <div class="w-2/3 text-right">
            <h2 class="font-semibold text-white mb-5 text-3xl">OUR MISSION</h2>
            <p class="text-white text-xs leading-6 font-light">
                {{ $item->mission }}
            </p>
        </div>
    </div>
    <div class="w-full mt-7 mb-10">
        <h1 class="text-3xl font-bold text-white text-center mb-5">Previous Events</h1>

        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @foreach ($previous_events as $prev)
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ $prev->image() }}"
                            class="absolute block brightness-80 w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <a href="{{ route('frontend.previous-events.show', $prev->slug) }}"
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white border-2 border-white px-5 py-2">JIFF
                            2018</a>
                    </div>
                    <!-- Item 2 -->
                @endforeach

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($previous_events as $key => $prev)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="{{ $key }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

    </div>

    <h1 class="text-3xl font-bold text-white text-center mb-10">GET NO KNOW US</h1>

    @foreach ($committees as $committee)
        <div class="w-full mt-7">
            <h3 class="text-white uppercase text-md mb-5">{{ $committee[0]['role'] }}</h3>

            @foreach ($committee as $comm)
                <div class="flex flex-row w-full gap-5 mb-5">
                    <div class="w-[20%]">
                        <img src="{{ $comm->image() }}" class="w-full" alt="">
                    </div>
                    <div class="w-[80%]">
                        <p class="text-gray-400 text-sm text-justify leading-6">
                            <span class="font-bold">{{ $comm['name'] }}</span> {{ $comm->text }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    @endforeach
</x-frontend.main-layout>
