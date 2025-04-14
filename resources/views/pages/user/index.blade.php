<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'User'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'User'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>User</h4>
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create
                        User</a>
                </x-slot>
                <x-slot name="body">
                    <x-table-client-side>
                        <x-slot name="thead">
                            <tr>
                                <th class="text-center" width="5">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($items as $item)
                                <tr>
                                    <td width="5" class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @foreach ($item->roles as $role)
                                            <span class="badge badge-info">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <x-delete-button :action="route('users.destroy', $item->id)" :id="$item->id" class="d-inline"
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
