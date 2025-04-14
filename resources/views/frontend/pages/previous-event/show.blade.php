<x-frontend.main-layout fluid="true" title="{{ $title ?? '' }}">

    <div class="mt-10">
        <div class="w-full relative border-2 border-red-700">
            <img src="{{ $item->image() }}" alt="" class=" rounded-lg w-full object-cover brightness-90 h-[530px]">
            <div class="absolute left-1/2 top-[50px] transform -translate-x-1/2">
                <h1 class="text-white text-4xl font-bold">{{ $item->name }}</h1>
            </div>
        </div>
        <div class="container p-20 mx-auto text-white content">
            <div class="mb-10">
                <h2 class="font-semibold text-3xl text-white">ABOUT THE FESTIVAL</h2>
                <div class="text-white text-xs">{!! $item->description !!}</div>
            </div>
            <div class="text-center mb-10">
                <h2 class="font-semibold text-3xl text-white mb-8">AFTER MOVIE</h2>
                <div class="aspect-w-16 aspect-h-9 w-full mb-10">
                    <iframe class="w-full h-[450px] rounded-lg" src="{{ $item->youtubeUrl() }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="text-center mt-[70px]">
                <h2 class="font-semibold text-3xl text-white mb-[100px]">FESTIVAL COMMITTEES</h2>
                <div class="grid grid-cols-6 gap-4 justify-center">
                    @foreach ($committees as $committee)
                        <div class="text-center  flex flex-col items-center justify-center">
                            <img src="{{ $committee->image() }}" class="mb-4" alt="">
                            <h3 class="font-bold text-xl">{{ $committee->name }}</h3>
                            <p class="text-sm font-light">
                                {{ $committee->role }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @push('styles')
        <style>
            .content,
            .content p,
            .content span,
            .content li,
            .content h1,
            .content h2,
            .content h3,
            .content strong {
                color: white !important;
            }
        </style>
    @endpush
</x-frontend.main-layout>
