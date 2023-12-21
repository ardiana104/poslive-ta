<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updatePostForm" tabindex="-1" aria-labelledby="updatePostFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePostFormLabel">Ubah Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div class="col-12 mb-2">
                            <input type="hidden" wire:model="post_id">
                            <input type="hidden" wire:model="slug">
                            <label class="form-label w-100">Judul</label>
                            <input wire:model="judul" type="text" class="form-control" id="updatePostInput1">
                            @error('judul')<small class="text-danger">{{ $message }}</small>@enderror
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
                            <livewire:quill :initialContent="$isi">
                            @error('isi')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label w-100" for="updatePostInput6">Foto</label>
                            <input wire:model="gambar" type="file" class="form-control" id="updatePostInput2" onchange="readURL(this)" />
                            @error('gambar')<small class="text-danger">{{ $message }}</small>@enderror
                            <div wire:loading wire:target="gambar">
                                <div class="d-flex align-items-center text-secondary m-2">
                                    <strong>Uploading...</strong>
                                    <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                                </div>
                            </div>
                            @if($gambar)
                                <img wire:ignore.self id="previewUpdatePost" src="" class="img-fluid mb-2">
                            @endif
                        </div>
                        {{-- <button wire:click.prevent="updatePostImage()" class="btn btn-label-primary w-100">Update Foto</button> --}}

                        <div class="modal-footer justify-content-center mt-3">
                            <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                            <button type="button" wire:click.prevent="update()" class="btn btn-label-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>