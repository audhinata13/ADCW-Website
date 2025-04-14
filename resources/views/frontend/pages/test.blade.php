<x-frontend.main-layout>
    <div class="flex w-[50%] border-4 mx-auto">
        <div class="flex w-full">
            <div class="p-5 w-full">
                <h2 class="text-white text-lg mb-3 font-normal">Event Details</h2>
                <div class="flex gap-4 py-2">
                    <div>
                        <img src="{{ asset('assets/img/example-image.jpg') }}" class="h-13 border-2 object-cover w-full"
                            alt="">
                    </div>
                    <div>
                        <h2 class="text-white">Event Name</h2>
                        <p class="text-xs text-white">Location</p>
                        <p class="text-xs text-white">Waktu</p>
                    </div>
                </div>
                <div class="border-t-2 border-dashed border-gray-400 my-4 w-full"></div>
                <div>
                    <h3 class="text-white text-lg font-normal mb-3">Order Summary</h3>
                    <div class="flex justify-between">
                        <div class="text-sm text-left text-white">
                            Total Pax
                        </div>
                        <div class="text-sm text-left text-white" id="label_total_pax">
                            0
                        </div>
                    </div>
                    <div class="border-t-2 border-dashed border-gray-400 my-4 w-full"></div>
                    <div class="flex justify-between">
                        <div class="text-sm text-left text-white">
                            Ticket Price
                        </div>
                        <div class="text-sm text-left text-white" id="label_ticket_price">
                            0
                        </div>
                    </div>
                    <div class="border-t-2 border-dashed border-gray-400 my-4 w-full"></div>
                    <div class="flex justify-between">
                        <div class="text-sm text-left text-white">
                            Total
                        </div>
                        <div class="text-sm text-left text-white" id="label_total">
                            0
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-frontend.main-layout>
