<x-frontend.main-layout title="{{ $title ?? '' }}">
    <div class="">
        <h1 class="text-3xl font-bold text-center mb-12 text-white">CONTACT US</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Google Map -->
            <div class="rounded-xl overflow-hidden shadow-lg border">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.855151593226!2d106.81884047728067!3d-6.180237362188999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d85a57a6ab%3A0x1b8a3d5c5b1965b3!2sMonas!5e0!3m2!1sen!2sid!4v1710000000000!5m2!1sen!2sid"
                    width="100%" height="100%" style="min-height: 400px; border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Contact Info -->
            <div class="flex flex-col justify-center space-y-6">
                <div class="flex items-start space-x-4">
                    <div class="text-blue-600 text-2xl">
                        📍
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Address</h3>
                        <p class="text-white">{{ $item->address }}</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="text-blue-600 text-2xl">
                        📧
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Email</h3>
                        <a href="mailto:info@contoh.com" class="text-white hover:underline">info@contoh.com</a>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="text-blue-600 text-2xl">
                        📱
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Phone Number</h3>
                        <a href="tel:+6281234567890" class="text-white hover:underline">+62 812-3456-7890</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.main-layout>
