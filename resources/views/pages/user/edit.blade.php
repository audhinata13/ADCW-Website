<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Edit User'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'User', 'url' => route('users.index')],
            ['label' => 'Edit', 'url' => null],
        ]" :active="$item->name" />
        <x-section-card>
            <x-slot name="header">
                <h4>Edit User</h4>
            </x-slot>
            <x-slot name="body">
                <form action="{{ route('users.update', $item->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <x-form.input name="name" label="Name" type="text" :required="true" :value="$item->name" />
                    <x-form.input name="email" label="Email" type="text" :required="true" :value="$item->email" />
                    <x-form.input name="password" label="Password" type="password" />
                    <x-form.input name="password_confirmation" label="Confirm Password" type="password" />
                    <x-form.select name="roles" label="Roles" :options="$roles" :selected="$userRoles" :multiple="true"
                        :required="true" />
                    <div class='form-group float-right'>
                        <a href="{{ route('users.index') }}" class="btn btn-warning">Cancel</a>
                        <button class='btn btn-primary'>Update</button>
                    </div>
                </form>
            </x-slot>
        </x-section-card>
    </x-section>
</x-main-layout>
