<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Detail Registration Event'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Registration Event', 'url' => route('registration-events.index')],
        ]" :active="'Edit'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Ticket Event</h4>
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
                                    <form action="{{ route('registration-events.ticket-upload', $item->id) }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
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
                                        <div class='form-group mb-3'>
                                            <label for='file' class='mb-2'>Ticket
                                                @if ($item->ticket_file)
                                                    <a href="{{ asset('storage/' . $item->ticket_file) }}"
                                                        class="badge badge-success btn-sm ml-2" target="_blank">View</a>
                                                @endif
                                            </label>
                                            <input type='file' name='file' id='file'
                                                class='form-control @error('file') is-invalid @enderror'
                                                value='{{ $item->file }}'>
                                            @error('file')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class='form-group mb-3 float-right'>
                                            <button class="btn btn-primary">Upload Ticket</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>

</x-main-layout>
