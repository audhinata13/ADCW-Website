<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Events'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'Events'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Events</h4>
                    <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Create
                        Events</a>
                </x-slot>
                <x-slot name="body">
                    <x-table-client-side>
                        <x-slot name="thead">
                            <tr>
                                <th class="text-center" width="5">#</th>
                                <th>Name</th>
                                <th>PIC</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($items as $item)
                                <tr>
                                    <td width="5" class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->pic }}</td>
                                    <td>{{ $item->date->translatedFormat('d F Y H:i') }}</td>
                                    <td>{!! $item->status() !!}</td>
                                    <td>
                                        <a href="{{ route('events.edit', $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <x-delete-button :action="route('events.destroy', $item->id)" :id="$item->id" class="d-inline"
                                            buttonClass="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </x-delete-button>
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
