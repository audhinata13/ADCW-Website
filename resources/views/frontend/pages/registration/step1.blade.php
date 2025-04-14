<x-frontend.main-layout title="{{ $title ?? '' }}">
    <div class="flex flex-col gap-5 p-5">
        @if (session('success'))
            <div class="w-full rounded-xl p-4 bg-green-300 text-white">
                <strong>Success!</strong>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="flex items-center gap-5">
            <a href="#" class="text-white">
                <svg fill="#ffffff" width="34px" height="34px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1 1 0 0 0 0 1.28l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2z" />
                </svg>
            </a>
            <h1 class="text-xl font-bold text-white"></h1>
        </div>



        <form id="multiStepForm" action="{{ route('frontend.registration.submit') }}" class="flex flex-col gap-4"
            method="post">
            @csrf

            <!-- SECTION 1 -->
            <div id="section1" class="step">
                <h2 class="text-white text-lg font-semibold mb-4">Step 1: Participant Data</h2>
                <input type="text" id="event_id" name="event_id" value="{{ $event->id }}" hidden
                    class="text-black">
                <input type="text" id="qty" name="pax_total" hidden class="text-black" value="1">
                <div class="flex flex-row gap-2 mb-4">
                    <div class="">
                        <label for="country"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Country</label>
                        <input type="text" id="country" name="country"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('country')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="city"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">City</label>
                        <input type="text" id="city" name="city"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('city')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-4 mb-4">
                    <div class="w-1/2">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Address</label>
                        <input type="text" id="address" name="address"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('address')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="postal_code"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Postal
                            Code</label>
                        <input type="text" id="postal_code" name="postal_code"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('postal_code')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="">
                        <label for="telephone"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Telephon/Phone
                            Number</label>
                        <input type="text" id="telephone" name="telephone"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('telephone')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="website" class="block mb-2 text-sm font-medium text-white dark:text-white">Website
                            (if
                            any)</label>
                        <input type="text" id="website" name="website"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('website')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="ml-1">
                        <label for="instagram_facebook"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Instagram/Facebook
                            (if
                            any)</label>
                        <input type="text" id="instagram_facebook" name="instagram_facebook"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('instagram_facebook')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-4 mb-4">
                    <div class="w-1/2">
                        <label for="certificate_name"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">The
                            name that you want to be
                            written on the Acceptance Letter and on Certificate</label>
                        <input type="text" id="certificate_name" name="certificate_name"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('certificate_name')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-row gap-4 mb-4 justify-between items-center">
                    <div class="w-1/2">
                        <h2 class="text-white">Total Pax</h2>
                        <p class="text-white text-xs">People who will come to the ecent <br> (including participants,
                            managers,
                            PIC) </p>
                        <div class="flex gap-3 items-center text-center mt-2">
                            <div class="bg-white h-5 w-5 rounded-sm cursor-pointer" id="btnMinus">
                                -
                            </div>
                            <div class="text-white font-semibold" id="displayQty">
                                1
                            </div>
                            <div class="bg-white h-5 w-5 rounded-sm cursor-pointer" id="btnPlus">
                                +
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button"
                            class="bg-gray-500 px-10 py-3 text-white rounded-lg cursor-pointer nextBtn">Next
                            Section</button>
                    </div>
                </div>
                {{-- <div class="flex justify-end mt-4">
                    <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded-lg mt-4 ">Next
                        Section</button>
                </div> --}}
            </div>

            <!-- SECTION 2 -->
            <div id="section2" class="step hidden">
                <h2 class="text-white text-lg font-semibold mb-4">Step 2: Contact Person</h2>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="">
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">First
                            Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('first_name')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-white dark:text-white">Last
                            Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('last_name')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white">Email
                            Address</label>
                        <input type="text" id="email" name="email"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('email')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email_confirmation"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Confirm Email
                            Address</label>
                        <input type="text" id="email_confirmation" name="email_confirmation"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('email_confirmation')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="ml-1">
                        <label for="phone_number"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Phone
                            Number</label>
                        <input type="text" id="phone_number" name="phone_number"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('phone_number')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button"
                        class="px-6 py-2 bg-gray-400 text-white rounded-lg prevBtn">Previous</button>
                    <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded-lg nextBtn">Next
                        Section</button>
                </div>
            </div>

            <!-- SECTION 3 -->
            <div id="section3" class="step hidden">
                <h2 class="text-white text-lg font-semibold mb-4">Step 3: Performance</h2>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="w-1/2">
                        <label for="performance_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of
                            Performance</label>
                        <select name="performance_type" id="performance_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a performance type</option>
                            <option value="Folklore Dance Group">Folklore Dance Group</option>
                            <option value="Folklore Music Group">Folklore Music Group</option>
                            <option value="Mixed Folklore Ensemble">Mixed Folklore Ensemble</option>
                            <option value="Floklore Instumental Group">Floklore Instumental Group</option>
                            <option value="Folklore Customs Group">Folklore Customs Group</option>
                        </select>
                        @error('performance_type')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="w-1/2">
                        <label for="performance_name"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Name/Title of
                            Performance</label>
                        <input type="text" id="performance_name" name="performance_name"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('performance_name')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="performance_minute"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Time
                            of Perfomance (minutes)</label>
                        <input type="text" id="performance_minute" name="performance_minute"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('performance_minute')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="w-1/2">
                        <label for="music_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type Of Music</label>
                        <select name="music_type" id="music_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a type of music</option>
                            <option value="Recorder">Recorder</option>
                            <option value="Live Musix">Live Musix</option>
                        </select>
                        @error('music_type')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-2 mb-4">
                    <div class="">
                        <label for="performance_number"
                            class="block mb-2 text-sm font-medium text-white dark:text-white">Number
                            of Perfomances</label>
                        <input type="text" id="performance_number" name="performance_number"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('performance_number')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button"
                        class="px-6 py-2 bg-gray-400 text-white rounded-lg prevBtn">Previous</button>
                    <button type="button" class="px-6 py-2 bg-gray-500 text-white rounded-lg nextBtn">Next
                        Section</button>
                </div>
            </div>

            <!-- SECTION 4 -->
            <div id="section4" class="step hidden">
                <h2 class="text-white text-lg font-semibold mb-4">Step 4: Registration Summary</h2>
                <div class="flex w-[50%] border-4 mx-auto">
                    <div class="flex w-full">
                        <div class="p-5 w-full">
                            <h2 class="text-white text-lg mb-3 font-normal">Event Details</h2>
                            <div class="flex gap-4 py-2">
                                <div>
                                    <img src="{{ asset('assets/img/example-image.jpg') }}"
                                        class="h-13 border-2 object-cover w-full" alt="">
                                </div>
                                <div>
                                    <h2 class="text-white">{{ $event->name }}</h2>
                                    <p class="text-xs text-white">{{ $event->location }}</p>
                                    <p class="text-xs text-white">{{ $event->formatDate() }}</p>
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
                                        Rp. {{ number_format($event->fee, 0, ',', '.') }}
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
                <div class="flex justify-between mt-4">
                    <button type="button"
                        class="px-6 py-2 bg-gray-400 text-white rounded-lg prevBtn">Previous</button>
                    <button type="submit"
                        class="px-6 py-2 bg-[#001A3D] text-white rounded-lg cursor-pointer">Confirm</button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            let qty = 1;
            let price = '{{ $event->fee }}';

            function formatRupiah(angka) {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0,
                }).format(angka);
            }

            function showLabel() {
                $('#label_total_pax').html(`${qty} pax`);
                let total = qty * price
                $('#label_total').html(formatRupiah(total));
            }

            showLabel();

            $('#btnPlus').click(function() {
                qty++;
                $('#qty').val(qty);
                $('#displayQty').html(qty);
                showLabel();
            })
            $('#btnMinus').click(function() {
                qty--;
                $('#qty').val(qty);
                $('#displayQty').html(qty);
                showLabel();
            })

            let currentStep = 0;
            const steps = document.querySelectorAll(".step");
            const nextBtns = document.querySelectorAll(".nextBtn");
            const prevBtns = document.querySelectorAll(".prevBtn");

            function showStep(step) {
                steps.forEach((s, index) => {
                    s.classList.toggle("hidden", index !== step);
                });
            }

            nextBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                });
            });

            prevBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            showStep(currentStep);
        </script>
    @endpush

</x-frontend.main-layout>
