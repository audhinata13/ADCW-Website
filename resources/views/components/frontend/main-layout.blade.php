<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Contoh pakai Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body>

    <x-frontend.navbar />
    <div class="@if ($fluid === true) p-20 @endif min-h-screen"
        @if ($bg === true) style="background: url('{{ asset('assets/frontend/images/background-audhi.jpg') }}') no-repeat center center; background-size: cover;" @endif>
        <div class="@if ($fluid === true) container @endif mx-auto">
            {{ $slot }}
        </div>
    </div>

    <x-frontend.footer />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notifButton = document.getElementById("notifButton");
            const notifCard = document.getElementById("notifCard");

            // Toggle notifikasi saat tombol diklik
            notifButton.addEventListener("click", function(event) {
                event.stopPropagation(); // Mencegah klik dari menutup langsung
                notifCard.classList.toggle("hidden");
            });

            // Klik di luar akan menutup notifikasi
            document.addEventListener("click", function(event) {
                if (!notifCard.contains(event.target) && event.target !== notifButton) {
                    notifCard.classList.add("hidden");
                }
            });

            // // Contoh: Tambah notifikasi baru secara dinamis
            // function addNotification(title, message, time) {
            //     const notifList = document.getElementById("notifList");
            //     const newNotif = document.createElement("li");
            //     newNotif.classList.add("p-4", "hover:bg-gray-100", "dark:hover:bg-gray-600");
            //     newNotif.innerHTML = `
        //         <h4 class="text-sm font-bold">${title}</h4>
        //         <p class="text-xs text-gray-500">${message}</p>
        //         <span class="block mt-1 text-xs text-gray-400">${time}</span>
        //         <button class="w-full mt-2 text-sm text-blue-600 hover:underline">View</button>
        //     `;
            //     notifList.prepend(newNotif);

            //     // Update badge jumlah notifikasi
            //     const notifBadge = document.getElementById("notifBadge");
            //     let count = notifList.children.length;
            //     notifBadge.textContent = count;
            //     notifBadge.classList.toggle("hidden", count === 0);
            // }

            // // Contoh pemakaian (misalnya di-fetch dari API)
            // setTimeout(() => {
            //     addNotification("Payment Success", "Your transaction has been completed.", "Just now");
            // }, 3000);
        });
    </script>

</body>

</html>
