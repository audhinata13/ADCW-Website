<x-frontend.main-layout title="{{ $title ?? '' }}">
    <div class="bg-white px-10 rounded-lg p-10">
        <form action="{{ route('frontend.profile.update') }}" method="post">
            @csrf
            @method('patch')
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="font-semibold text-xl mb-3">Hello, {{ auth()->user()->name }}</h1>
                    <p class="text-sm font-light text-gray-500">{{ auth()->user()->email }}</p>
                </div>
                <div>
                    <button type="submit" class="bg-black  text-white px-4 py-2 rounded-md">Edit</button>
                </div>
            </div>

            <div class="w-full mb-5">
                <div class="flex gap-4 w-full">
                    <div class="w-1/2">
                        <label for="first_name" class="block mb-2 text-sm font-medium black dark:black">First
                            Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ old('first_name') ?? auth()->user()->first_name }}" />
                        @error('first_name')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="last_name" class="block mb-2 text-sm font-medium black dark:black">Last
                            Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ old('last_name') ?? auth()->user()->last_name }}" />
                        @error('last_name')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full mb-5">
                <div class="flex gap-4 w-full">
                    <div class="w-1/2">
                        <label for="phone_number" class="block mb-2 text-sm font-medium black dark:black">Phone
                            Number</label>
                        <input type="text" id="phone_number" name="phone_number"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ old('phone_number') ?? auth()->user()->phone_number }}" />
                        @error('phone_number')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="email" class="block mb-2 text-sm font-medium black dark:black">Email
                            Address</label>
                        <input type="text" id="email" name="email"
                            class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ old('email') ?? auth()->user()->email }}" />
                        @error('email')
                            <p class="text-red-400 text-xs mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
        <div class="w-full">
            <h1 class="text-black mb-3 text-md font-normal">My E-Ticket</h1>
            <div class="grid grid-cols-3 gap-4">
                @forelse ($items as $item)
                    <div>
                        @if ($item->ticket_file)
                            <a href="{{ asset('storage/' . $item->ticket_file) }}" target="_blank"
                                class="hover:bg-gray-100">
                                <img src="{{ $item->event->image() }}" class="w-full mb-2 h-20 object-cover rounded-xl"
                                    alt="">
                                <p class="text-xs">{{ $item->event->name }}</p>
                            </a>
                        @else
                            <a href="#" onclick="alert('Ticket file not found')" class="hover:bg-gray-100">
                                <img src="{{ $item->event->image() }}" class="w-full mb-2 h-20 object-cover rounded-xl"
                                    alt="">
                                <p class="text-xs">{{ $item->event->name }}</p>
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="text-sm text-gray-500 text-left">No ticket found</p>
                @endforelse
            </div>
        </div>
    </div>

</x-frontend.main-layout>
