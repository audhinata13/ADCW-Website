<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Committee'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'Committee'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Filter</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('committees.index') }}" method="get">
                        <div class='form-group row'>
                            <div class="col-md">
                                <label for='previous_event_id'>Prev Event</label>
                                <select name='previous_event_id' id='previous_event_id'
                                    class='form-control @error('previous_event_id') is-invalid @enderror'>
                                    <option value='' @selected(request('previous_event_id') == null)>Committee Yayasan</option>
                                    @foreach ($previous_events as $prev)
                                        <option @selected($prev->id == request('previous_event_id')) value='{{ $prev->id }}'>
                                            {{ $prev->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('previous_event_id')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md align-self-end">
                                <button class="btn btn-primary py-2 px-5">Filter</button>
                            </div>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
            <x-section-card>
                <x-slot name="header">
                    <h4>Committee</h4>
                    <a href="{{ route('committees.create', [
                        'previous_event_id' => request('previous_event_id'),
                    ]) }}"
                        class="btn btn-primary btn-sm">Create
                        Committee</a>
                </x-slot>
                <x-slot name="body">
                    <x-table-client-side>
                        <x-slot name="thead">
                            <tr>
                                <th class="text-center" width="5">#</th>
                                <th>Gambar</th>
                                <th>Name</th>
                                <th>Teks</th>
                                <th>Peran</th>
                                <th>Action</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($items as $item)
                                <tr>
                                    <td width="5" class="text-center">{{ $loop->iteration }}</td>
                                    <td><img src="{{ $item->image() }}" class="img-fluid" style="max-height:80px"
                                            alt=""></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->text }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a href="{{ route('committees.edit', $item->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <x-delete-button :action="route('committees.destroy', $item->id)" :id="$item->id" class="d-inline"
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
