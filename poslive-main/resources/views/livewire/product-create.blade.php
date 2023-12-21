<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" id="createProductForm" aria-labelledby="createProductFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Produk</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Nama</label>
                            <input wire:model="nama" type="text" class="form-control" id="createProductInput1" autocomplete="createProductInput1" placeholder="Nama Produk/Menu">
                        </div>
                        @error('nama')<small class="text-danger">{{ $message }}</small>@enderror
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Stok</label>
                            <input wire:model="stok" type="text" class="form-control" id="createProductInput2" autocomplete="createProductInput2" placeholder="Stok Produk/Menu">
                        </div>
                        @error('stok')<small class="text-danger">{{ $message }}</small>@enderror
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Harga</label>
                            <input wire:model="harga" type="text" class="form-control" id="createProductInput3" autocomplete="createProductInput3" placeholder="Harga Produk/Menu">
                        </div>
                        @error('harga')<small class="text-danger">{{ $message }}</small>@enderror
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Kategori</label>
                            <select wire:model="idkategori" class="select2 form-select" type="select">
                                <option disable>--Pilih--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('idkategori')<small class="text-danger">{{ $message }}</small>@enderror
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Kemasan</label>
                            <select wire:model="idatribut" class="select2 form-select" type="select">
                                <option>--Pilih--</option>
                                @foreach($options as $option)
                                <option value="{{$option->id}}">{{$option->nama}} - {{$option->deskripsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('idatribut')<small class="text-danger">{{ $message }}</small>@enderror
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Metode Pesan</label>
                            <select wire:model="idmetode" class="select2 form-select" type="select">
                                <option value="">--Pilih--</option>
                                @foreach($ordermethods as $ordermethod)
                                    <option value="{{$ordermethod->id}}">{{$ordermethod->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('idmetode')<small class="text-danger">{{ $message }}</small>@enderror
                        <div class="col-6 mb-3">
                            <label class="form-label w-100">Status</label>
                            <input wire:model="status" type="text" class="form-control" list="data-status" id="createProductInput7" autocomplete="createProductInput7" placeholder="Status Produk/Menu">
                            <datalist id="data-status">
                                <option value="active">
                                <option value="inactive">
                            </datalist>
                        </div>
                    </div>
                    @error('status')<small class="text-danger">{{ $message }}</small>@enderror

                    <div class="col-12">
                        <label class="form-label w-100">Deskripsi</label>
                        <input wire:model="deskripsi" type="text" class="form-control" id="createProductInput8" autocomplete="createProductInput8" placeholder="Deskripsi Produk/Menu">
                    </div>
                    @error('deskripsi')<small class="text-danger">{{ $message }}</small>@enderror
                    <small class="p-0 m-0" style="font-style:italic;font-size:11px;">Deskripsi singkat bisa di update kemudian.</small>

                    <div class="col-12 mt-2">
                        <input wire:model="gambar" type="file" class="form-control" id="createProductInput9" />
                    </div>
                    @error('gambar')<small class="text-danger">{{ $message }}</small>@enderror
                    <div wire:loading wire:target="gambar">
                        <div class="d-flex align-items-center text-secondary m-2">
                            <strong>Uploading...</strong>
                            <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div>
                    @if($gambar)
                    <img src="{{$gambar->temporaryUrl()}}" class="img-fluid mt-2">
                    @endif
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