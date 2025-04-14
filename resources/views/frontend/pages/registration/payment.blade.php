<x-frontend.main-layout bg="false" title="{{ $title ?? '' }}">
    <div class="flex items-center gap-5 mb-5">
        <a href="{{ route('frontend.profile.index') }}" class="text-black">
            <svg fill="#000000" width="34px" height="34px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1 1 0 0 0 0 1.28l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z" />
            </svg>
        </a>
        <h1 class="text-xl font-bold text-black">Payment Confirmation</h1>
    </div>

    <div class="flex w-[50%] border-4 mx-auto">
        <div class="flex w-full">
            <div class="p-5 w-full">
                <h2 class="text-black text-lg mb-3 font-normal">Event Details</h2>
                <div class="flex gap-4 py-2">
                    <div>
                        <img src="{{ asset('assets/img/example-image.jpg') }}" class="h-13 border-2 object-cover w-full"
                            alt="">
                    </div>
                    <div>
                        <h2 class="text-black">{{ $registration->event->name }}</h2>
                        <p class="text-xs text-black">{{ $registration->event->location }}</p>
                        <p class="text-xs text-black">{{ $registration->event->formatDate() }}</p>
                    </div>
                </div>
                <div class="border-t-2 border-dashed border-gray-400 my-4 w-full"></div>
                <div>
                    <h3 class="text-black text-lg font-normal mb-3">Order Summary</h3>
                    <div class="flex justify-between">
                        <div class="text-sm text-left text-black">
                            Total Pax
                        </div>
                        <div class="text-sm text-left text-black" id="label_total_pax">
                            {{ $registration->pax_total }}
                        </div>
                    </div>
                    <div class="border-t-2 border-dashed border-gray-400 my-4 w-full"></div>
                    <div class="flex justify-between">
                        <div class="text-sm text-left text-black">
                            Ticket Price
                        </div>
                        <div class="text-sm text-left text-black" id="label_ticket_price">
                            Rp. {{ number_format($registration->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="border-t-2 border-dashed border-gray-400 my-4 w-full"></div>
                    <div class="flex justify-between">
                        <div class="text-sm text-left text-black">
                            Total
                        </div>
                        <div class="text-sm text-left text-black" id="label_total">
                            Rp. {{ number_format($registration->total, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-black">{{ env('PAYMENT_METHOD_NAME') }}</h2>
        </div>
    </div>
    <div class="flex flex-col w-[50%] justify-center mt-10 mx-auto">
        <div class="text-center mb-5">
            <h2 class="text-black text-2xl font-bold text-center">
                {{ env('PAYMENT_METHOD_NAME') . ' - ' . env('PAYMENT_METHOD_NUMBER') }}</h2>
            <h3>{{ env('PAYMENT_METHOD_OWNER') }}</h3>
        </div>

        <form action="{{ route('frontend.registration.payment.submit', $registration->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <p class="font-light">Please upload your payment proof (images) below.</p>
                <button id="chooseImageBtn" type="button"
                    class="px-6 py-2 bg-[#001A3D] text-white rounded-lg cursor-pointer mt-4">Choose Image</button>
                <input type="file" id="fileInput" name="file" class="hidden">

            </div>
            <div class="text-center mt-10">
                <button type="submit" class="px-6 py-2 bg-[#001A3D] text-white rounded-lg cursor-pointer mt-4">Confirm
                    Payment</button>
            </div>
        </form>

    </div>

    @push('scripts')
        <script>
            document.getElementById("chooseImageBtn").addEventListener("click", function() {
                document.getElementById("fileInput").click();
            });
        </script>
    @endpush
</x-frontend.main-layout>
