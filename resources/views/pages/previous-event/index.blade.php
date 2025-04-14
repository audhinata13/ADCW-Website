<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Previous Events'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'Previous Events'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Previous Events</h4>
                    <a href="{{ route('previous-events.create') }}" class="btn btn-primary btn-sm">Create
                        Previous Events</a>
                </x-slot>
                <x-slot name="body">
                    <x-table-client-side>
                        <x-slot name="thead">
                            <tr>
                                <th class="text-center" width="5">#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Link Youtube</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($items as $item)
                                <tr>
                                    <td width="5" class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $item->image() }}" class="img-fluid" style="max-height:80px"
                                            alt="">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->link_youtube }}</td>
                                    <td>
                                        <a href="{{ route('committees.index', [
                                            'previous_event_id' => $item->id,
                                        ]) }}"
                                            class="btn btn-secondary btn-sm">
                                            <i class="fas fa-users"></i>
                                        </a>
                                        <a href="{{ route('previous-events.edit', $item->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <x-delete-button :action="route('previous-events.destroy', $item->id)" :id="$item->id" class="d-inline"
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
