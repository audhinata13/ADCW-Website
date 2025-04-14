<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Edit Permission'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Permission', 'url' => route('permissions.index')],
            ['label' => 'Edit', 'url' => null],
        ]" :active="$item->name" />
        <x-section-card>
            <x-slot name="header">
                <h4>Edit Permission</h4>
            </x-slot>
            <x-slot name="body">
                <form action="{{ route('permissions.update', $item->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <x-form.input name="name" label="Name" type="text" :required="true" :value="$item->name" />
                    <div class='form-group float-right'>
                        <a href="{{ route('permissions.index') }}" class="btn btn-warning">Cancel</a>
                        <button class='btn btn-primary'>Update</button>
                    </div>
                </form>
            </x-slot>
        </x-section-card>
    </x-section>
</x-main-layout>
