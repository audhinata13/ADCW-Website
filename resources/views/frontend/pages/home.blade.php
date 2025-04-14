<x-frontend.main-layout fluid="true" title="{{ $title ?? '' }}">
    @if ($event)
        <div class="min-h-[500px] items-center bg-cover brightness-90  bg-no-repeat flex justify-center -mb-10  mx-auto w-full"
            style="background-image:url({{ $event->image() }})">
            <div class="text-center  font-light text-white p-10">
                <div class="">
                    {{ $event->formatDateOnly() }}
                </div>
                <div>
                    {{ $event->location }}
                </div>
                <div class="justify-center flex mb-[120px] mt-4">
                    <h1 class="text-5xl max-w-[70%] font-italic  text-center">{{ $event->name }}
                    </h1>
                </div>
                <a href="{{ route('frontend.registration', [
                    'slug' => $event->slug,
                ]) }}"
                    class="px-6 py-2 bg-[#001A3D] font-light text-sm text-white rounded-lg cursor-pointer">
                    REGISTER NOW
                </a>
            </div>
        </div>
    @endif

    <div class="container p-20 mx-auto">
        <div class="text-left mt-[100px] text-white">
            <h2 class="text-lg font-bold mb-5">Be Oart of Us</h2>
            <p class="text-sm max-w-[50%] text-slate-300">
                Are you a talented artist looking for an opportunity to showcase your skills? Our Festival is your
                stage!
                Whether you're a dancer, musician, or performer, this is your chance to captivate an audience and
                celebrate
                culture.
            </p>
        </div>
        <div class="text-right mt-[100px] text-white flex justify-between flex-row">
            <div class="w-[10%]">

            </div>
            <div class="text-right w-[90%]">
                <h2 class="text-lg font-bold mb-5">Why You Need to Join</h2>
                <p class="text-sm text-slate-300">
                    Showcase Your Talent; Perform in front of an engaged and enthusiastic audience who value cultural
                    expression.
                    Connect with a Global Community; Meet fellow performers, artists, and cultural enthusiasts from
                    around the world.
                    Promote Your Art; Gain exposure through our festival's official platforms and reach a broader
                    audience.
                    Celebrate Culture; Be part of an event that honors tradition, art, and the beauty of cultural
                    performances.
                    Exclusive Benefits; Performers receive festival credentials, recognition on our website, and
                    exclusive access to networking opportunities.

                </p>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-xl font-bold text-center text-white mb-4">UPCOMING EVENTS</h2>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($latest_events as $latest)
                    <a href="{{ route('frontend.event.show', $latest->slug) }}">
                        <div class="bg-white rounded-lg">
                            <img src="{{ $latest->image() }}" class="w-full mb-2 h-[200px] object-cover rounded-l-xl"
                                alt="">
                            <div class="flex flex-row gap-5 p-4">
                                <div class="text-center">
                                    <span class="text-black">{{ $latest->date->translatedFormat('M') }}</span>
                                    <br>
                                    <span
                                        class="text-black font-bold text-xl">{{ $latest->date->translatedFormat('d') }}</span>
                                </div>
                                <div>
                                    <h2 class="text-black">{{ $latest->name }}</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('frontend.event.index') }}"
                class="py-3 px-8 text-center text-white rounded-4xl border-2">
                See
                More</a>
        </div>
    </div>
</x-frontend.main-layout>
