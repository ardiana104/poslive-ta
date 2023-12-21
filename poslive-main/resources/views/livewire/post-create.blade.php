<!-- Modal Create -->
<div wire:ignore.self class="modal modal-lg fade" id="createPostForm" tabindex="-1" aria-labelledby="createPostFormLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostFormLabel">Tambah Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <input type="hidden" wire:model="user_id">
                        <input type="hidden" wire:model="slug">
                        <div class="col-12 mb-2">
                            <label class="form-label w-100">Judul</label>
                            <input wire:model="judul" type="text" class="form-control" id="createInput1">
                            @error('judul')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100">Kategori</label>
                            <select wire:model="idkategori" class="select2 form-select" type="select">
                                <option disable>--Pilih--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->nama}}</option>
                                @endforeach
                            </select>
                            @error('idkategori')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100">Deskripsi</label>
                            <input type="hidden" wire:model="isi">
                            <livewire:quill :value="$isi">
                            @error('isi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100" for="customFile">Gambar</label>
                            <input wire:model="gambar" type="file" class="form-control" id="customFile" />
                            @error('gambar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if ($gambar)
                                <img src="{{ $gambar->temporaryUrl() }}" class="img-fluid mt-3" alt="Preview gambar">
                            @endif
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                            <button wire:click.prevent="store()" class="btn btn-label-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
