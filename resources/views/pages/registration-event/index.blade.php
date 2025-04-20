<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Registration Event'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'Registration Event'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Registration Event</h4>
                </x-slot>
                <x-slot name="body">
                    <x-table-client-side>
                        <x-slot name="thead">
                            <tr>
                                <th class="text-center" width="5">#</th>
                                <th>Event Name</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($items as $item)
                                <tr>
                                    <td width="5" class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->event->name }}
                                    </td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{!! $item->status() !!}</td>
                                    <td>
                                        <a href="{{ route('registration-events.show', $item->id) }}"
                                            class="btn btn-secondary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ($item->status == 2)
                                            <a href="{{ route('registration-events.ticket', $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-ticket-alt"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-table-client-side>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
