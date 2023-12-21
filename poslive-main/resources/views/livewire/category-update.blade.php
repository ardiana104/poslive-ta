<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updateCategoryForm" tabindex="-1" aria-labelledby="updateCategoryFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategoryFormLabel">Ubah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div class="col-12 mb-2">
                            <input type="hidden" wire:model="category_id">
                            <label class="form-label w-100">Nama</label>
                            <input wire:model="nama" type="text" class="form-control" id="updateCategoryInput1">
                            @error('nama')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100">Deskripsi</label>
                            <textarea wire:model="deskripsi" type="text" class="form-control" id="updateCategoryInput3"></textarea>
                            @error('deskripsi')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100" for="updateCategoryInput6">Foto</label>
                            <input wire:model="gambar" type="file" class="form-control" id="updateCategoryInput2" onchange="readURL(this)" />
                            @error('gambar')<small class="text-danger">{{ $message }}</small>@enderror
                            <div wire:loading wire:target="gambar">
                                <div class="d-flex align-items-center text-secondary m-2">
                                    <strong>Uploading...</strong>
                                    <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                                </div>
                            </div>
                            @if($gambar)
                            <img wire:ignore.self id="previewUpdateCategory" src="" class="img-fluid mb-2">
                            @endif
                        </div>
                        {{-- <button wire:click.prevent="updateCategoryImage()" class="btn btn-label-primary w-100 mb-3">Update Foto</button> --}}

                        <div class="modal-footer justify-content-center">
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