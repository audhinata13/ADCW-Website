<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Permissions'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'Permissions'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Permissions</h4>
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">Create
                        Permissions</a>
                </x-slot>
                <x-slot name="body">
                    <x-table-client-side>
                        <x-slot name="thead">
                            <tr>
                                <th class="text-center" width="5">#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($items as $item)
                                <tr>
                                    <td width="5" class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $item->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <x-delete-button :action="route('permissions.destroy', $item->id)" :id="$item->id" class="d-inline"
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
