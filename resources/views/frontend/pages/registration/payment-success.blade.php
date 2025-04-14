<x-frontend.main-layout bg="false" title="{{ $title ?? '' }}">

    <div class="flex  justify-center items-center h-screen">
        <div class="w-1/3">
            <h1 class="text-center text-2xl font-bold">Thank You for Your Payment</h1>
            <div class="text-center text-sm mt-4 font-light">Please check you notification regularly for payment
                approval.</div>
            <div class="text-center mt-6">
                <a href="{{ route('frontend.home') }}"
                    class="px-6 text-sm py-2 bg-[#001A3D] text-white rounded-lg cursor-pointer mt-3">Go To
                    Homepage</a>
            </div>
        </div>
    </div>

</x-frontend.main-layout>
