<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Detail Registration Event'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Registration Event', 'url' => route('registration-events.index')],
        ]" :active="'Edit'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Event</h4>
                </x-slot>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ $item->event->image() }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md">
                            <h6>{{ $item->event->name }}</h6>
                            <span>{{ $item->event->location }}</span>
                            <br>
                            <span>{{ $item->event->formatDate() }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr>
                            <h5 class="mb-4">Order Summary</h5>
                            <ul class="unstyled-list p-0 m-0">
                                <li class="d-flex justify-content-between">
                                    <span>Total Pax</span>
                                    <span>{{ $item->pax_total }}</span>
                                </li>
                                <hr>
                                <li class="d-flex justify-content-between">
                                    <span>Ticket Price</span>
                                    <span>{{ number_format($item->event->fee, 0, ',', '.') }}</span>
                                </li>
                                <hr>
                                <li class="d-flex justify-content-between">
                                    <span>Total</span>
                                    <span>{{ number_format($item->event->fee * $item->pax_total, 0, ',', '.') }}</span>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-4">Data Information</h5>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='country' class='mb-2'>Country</label>
                                        <input type='text' name='country' id='country'
                                            class='form-control @error('country') is-invalid @enderror'
                                            value='{{ $item->country }}' disabled readonly>
                                        @error('country')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='city' class='mb-2'>City</label>
                                        <input type='text' name='city' id='city'
                                            class='form-control @error('city') is-invalid @enderror'
                                            value='{{ $item->city }}' disabled readonly>
                                        @error('city')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='address' class='mb-2'>Address</label>
                                        <input type='text' name='address' id='address'
                                            class='form-control @error('address') is-invalid @enderror'
                                            value='{{ $item->address }}' disabled readonly>
                                        @error('address')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class='form-group mb-3'>
                                        <label for='city' class='mb-2'>City</label>
                                        <input type='text' name='city' id='city'
                                            class='form-control @error('city') is-invalid @enderror'
                                            value='{{ $item->city }}' disabled readonly>
                                        @error('city')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='telephone' class='mb-2'>Telephone</label>
                                        <input type='text' name='telephone' id='telephone'
                                            class='form-control @error('telephone') is-invalid @enderror'
                                            value='{{ $item->telephone }}' disabled readonly>
                                        @error('telephone')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='website' class='mb-2'>Website</label>
                                        <input type='text' name='website' id='website'
                                            class='form-control @error('website') is-invalid @enderror'
                                            value='{{ $item->website }}' disabled readonly>
                                        @error('website')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='instagram' class='mb-2'>Instagram</label>
                                        <input type='text' name='instagram' id='instagram'
                                            class='form-control @error('instagram') is-invalid @enderror'
                                            value='{{ $item->instagram }}' disabled readonly>
                                        @error('instagram')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='certificate_name' class='mb-2'>Name Of Certificate</label>
                                        <input type='text' name='certificate_name' id='certificate_name'
                                            class='form-control @error('certificate_name') is-invalid @enderror'
                                            value='{{ $item->certificate_name }}' disabled readonly>
                                        @error('certificate_name')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='first_name' class='mb-2'>First Name</label>
                                        <input type='text' name='first_name' id='first_name'
                                            class='form-control @error('first_name') is-invalid @enderror'
                                            value='{{ $item->first_name }}' disabled readonly>
                                        @error('first_name')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='last_name' class='mb-2'>Last Name</label>
                                        <input type='text' name='last_name' id='last_name'
                                            class='form-control @error('last_name') is-invalid @enderror'
                                            value='{{ $item->last_name }}' disabled readonly>
                                        @error('last_name')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='email' class='mb-2'>Email Address</label>
                                        <input type='text' name='email' id='email'
                                            class='form-control @error('email') is-invalid @enderror'
                                            value='{{ $item->user->email }}' disabled readonly>
                                        @error('email')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='phone_number' class='mb-2'>Phone Number</label>
                                        <input type='text' name='phone_number' id='phone_number'
                                            class='form-control @error('phone_number') is-invalid @enderror'
                                            value='{{ $item->phone_number }}' disabled readonly>
                                        @error('phone_number')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='performance_title' class='mb-2'>Performance Name/Title</label>
                                        <input type='text' name='performance_title' id='performance_title'
                                            class='form-control @error('performance_title') is-invalid @enderror'
                                            value='{{ $item->performance_title }}' disabled readonly>
                                        @error('performance_title')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='performance_minute' class='mb-2'>Time of Performance</label>
                                        <input type='text' name='performance_minute' id='performance_minute'
                                            class='form-control @error('performance_minute') is-invalid @enderror'
                                            value='{{ $item->performance_minute }}' disabled readonly>
                                        @error('performance_minute')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='music_type' class='mb-2'>Type Of Music</label>
                                        <input type='text' name='music_type' id='music_type'
                                            class='form-control @error('music_type') is-invalid @enderror'
                                            value='{{ $item->music_type }}' disabled readonly>
                                        @error('music_type')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='performance_number' class='mb-2'>Performance Number</label>
                                        <input type='text' name='performance_number' id='performance_number'
                                            class='form-control @error('performance_number') is-invalid @enderror'
                                            value='{{ $item->performance_number }}' disabled readonly>
                                        @error('performance_number')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="mb-2">Proof of Payment</div>
                                    @if ($item->proof_of_payment)
                                        <a href="{{ $item->proof_of_payment() }}" target="_blank">
                                            <img src="{{ $item->proof_of_payment() }}" alt=""
                                                class="img-fluid" style="max-height: 300px">
                                        </a>
                                    @else
                                        <span class="text-danger">No Proof of Payment</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md">
                                    <div class="mb-2">Status</div>
                                    {!! $item->status() !!}
                                </div>
                            </div>
                            @if ($item->status)
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('registration-events.update-status', [
                                            'id' => $item->id,
                                            'status' => 1,
                                        ]) }}"
                                            class="btn btn-warning mr-2">
                                            Payment Confirmation
                                        </a>
                                        <a href="{{ route('registration-events.update-status', [
                                            'id' => $item->id,
                                            'status' => 2,
                                        ]) }}"
                                            class="btn btn-success mr-2">
                                            Approved
                                        </a>
                                        <a href="{{ route('registration-events.update-status', [
                                            'id' => $item->id,
                                            'status' => 3,
                                        ]) }}"
                                            class="btn btn-danger mr-2">
                                            Reject
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>

</x-main-layout>
