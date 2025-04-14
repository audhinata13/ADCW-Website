<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Create Permission'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Permission', 'url' => route('permissions.index')],
        ]" :active="'Create'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Create Permission</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        <x-form.input name="name" label="Name" type="text" :required="true" />
                        <div class='form-group float-right'>
                            <a href="{{ route('permissions.index') }}" class="btn btn-warning">Cancel</a>
                            <button class='btn btn-primary'>Create</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
