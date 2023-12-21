<!-- Modal Create -->
<div wire:ignore.self class="modal fade" id="createCategoryForm" tabindex="-1" aria-labelledby="createCategoryFormLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryFormLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100">Nama Kategori</label>
                            <input wire:model="nama" type="text" class="form-control" id="createInput1">
                            @error('nama')
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
                                <img src="{{ $gambar->temporaryUrl() }}" class="img-fluid mt-3" alt="Preview Gambar">
                            @endif
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label w-100">Deskripsi</label>
                            <textarea wire:model="deskripsi" type="text" class="form-control" id="createInput3"></textarea>
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
