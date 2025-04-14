<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Edit Faq'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Faq', 'url' => route('faqs.index')],
        ]" :active="'Edit'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Edit Faq</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('faqs.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='question' class='mb-2'>Question</label>
                            <input type='text' name='question' id='question'
                                class='form-control @error('question') is-invalid @enderror'
                                value='{{ $item->question ?? old('question') }}'>
                            @error('question')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='answer' class='mb-2'>Answer</label>
                            <textarea name='answer' id='answer' cols='30' rows='3'
                                class='form-control @error('answer') is-invalid @enderror'>{{ $item->answer ?? old('answer') }}</textarea>
                            @error('answer')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <a href="{{ route('faqs.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Faq</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
