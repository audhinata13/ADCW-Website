<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Create User'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'User', 'url' => route('users.index')],
        ]" :active="'Create'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Create User</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <x-form.input name="name" label="Name" type="text" :required="true" />
                        <x-form.input name="email" label="Email" type="text" :required="true" />
                        <x-form.input name="password" label="Password" type="password" :required="true" />
                        <x-form.input name="password_confirmation" label="Confirm Password" type="password"
                            :required="true" />
                        <x-form.select name="roles" label="Roles" :options="$roles" :selected="old('roles', $userRoles ?? [])"
                            :required="true" :multiple="true" id="roles" />
                        <div class='form-group float-right'>
                            <a href="{{ route('users.index') }}" class="btn btn-warning">Cancel</a>
                            <button class='btn btn-primary'>Create</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
