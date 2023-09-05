@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                mediaEmbed: {
                    previewsInData: true
                },
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="heading !capitalize !font-bold">Tambah artikel</h1>
            <p class="text-gray-500 mt-2">Silahkan tambahkan artikel Anda dibawah ini.</p>
        </div>
        <div class="mt-8 flex items-center gap-3">
            <button wire:click='draft'
                class="py-2.5 px-4 text-center border-gray-300 hover:bg-gray-200 hover:border-gray-200 border text-sm text-blue-500 rounded-lg font-semibold duration-300">Simpan
                ke Draft</button>
            <button wire:click='save'
                class="py-2.5 px-4 text-center bg-blue-500 text-sm text-white rounded-lg font-semibold hover:opacity-80 duration-300">Publish
                Artikel</button>
        </div>
    </div>

    <div class="max-w-3xl mt-16">
        <form>
            <div class="mb-4">
                <label for="image" class="label">Gambar</label>
                <div class="flex items-center gap-4">
                    <div>
                        <span class="text-gray-400 text-sm block mb-1">Gambar lama</span>
                        <img src="{{ asset('img/articles/' . $oldImage) }}" alt=""
                            class="max-w-[250px] rounded-2xl mb-2">
                    </div>
                    @if ($image)
                        <div>
                            <span class="text-gray-400 text-sm block mb-1">Gambar baru</span>
                            <img src="{{ $image->temporaryUrl() }}" alt=""
                                class="max-w-[250px] rounded-2xl mb-2">
                        </div>
                    @endif
                </div>
                <div wire:loading wire:target='image'
                    class="animate-spin inline-block w-6 h-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full"
                    role="status" aria-label="loading">
                    <span class="sr-only">Loading...</span>
                </div>
                <input type="file" id="image" class="input-form bg-white" wire:model.live='image'>
                @error('image')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="title" class="label">Judul</label>
                <input type="text" id="title" class="input-form" wire:model.live='title'>
                @error('title')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="slug" class="label">Slug</label>
                <input type="text" id="slug" class="input-form" wire:model.live='slug'>
                @error('slug')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="label">Konten</label>
                <div wire:ignore>
                    <textarea id="content">{{ $deskripsi }}</textarea>
                </div>
                @error('content')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </form>
    </div>
</div>
