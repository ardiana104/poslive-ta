<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updateOptionForm" tabindex="-1" aria-labelledby="updateOptionFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateOptionFormLabel">Ubah Atribut</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div class="col-12 mb-2">
                            <input type="hidden" wire:model="option_id">
                            <label class="form-label w-100">Nama</label>
                            <input wire:model="nama" type="text" class="form-control" id="updateOptionInput1">
                            @error('nama')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Deskripsi</label>
                            <textarea wire:model="deskripsi" type="text" class="form-control" id="updateOptionInput2"></textarea>
                            @error('deskripsi')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                            <button wire:click.prevent="update()" class="btn btn-label-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>