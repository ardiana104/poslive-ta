<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" id="updateProductForm" aria-labelledby="updateProductFormLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ubah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <input wire:model="product_id" type="hidden">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Nama</label>
                            <input wire:model="nama" type="text" class="form-control" id="updateProductInput1"
                                autocomplete="updateProductInput1" placeholder="Nama Produk/Menu">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Stok</label>
                            <input wire:model="stok" type="number" class="form-control" id="updateProductInput2"
                                autocomplete="updateProductInput2" placeholder="Stok Produk/Menu">
                            @error('stok')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Harga</label>
                            <input wire:model="harga" type="number" class="form-control" id="updateProductInput3"
                                autocomplete="updateProductInput3" placeholder="Harga Produk/Menu">
                            @error('harga')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Kategori</label>
                            <select wire:model="idkategori" class="select2 form-select" type="select">
                                {{-- <input wire:model="idkategori" type="search" class="form-control" list="data-category" id="updateProductInput4" autocomplete="updateProductInput4" placeholder="Kategori Produk/Menu"> --}}
                                {{-- <datalist id="data-category">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                @endforeach
                        </datalist> --}}
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" wire:key="{{ $category->id }}">
                                        {{ $category->nama }}</option>
                                @endforeach
                            </select>
                            @error('idkategori')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Kemasan</label>
                            {{-- <input wire:model="idatribut" type="search" class="form-control" list="data-option" id="updateProductInput5" autocomplete="updateProductInput5" placeholder="Kemasan"> --}}
                            <select wire:model="idatribut" class="select2 form-select" type="select">
                                {{-- <datalist id="data-option">
                                @foreach ($options as $option)
                                <option value="{{$option->id}}">
                                    @endforeach
                            </datalist> --}}
                                @foreach ($options as $option)
                                    <option value="{{ $option->id }}" wire:key="{{ $option->id }}">
                                        {{ $option->nama }} - {{ $option->deskripsi }}</option>
                                @endforeach
                            </select>
                            @error('idatribut')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Metode Pesan</label>
                            {{-- <input wire:model="idmetode" type="search" class="form-control" list="data-ordermethod" id="updateProductInput6" autocomplete="updateProductInput6" placeholder="Metode Pesan Produk/Menu">
                        <datalist id="data-ordermethod">
                            @foreach ($ordermethods as $ordermethod)
                            <option value="{{$ordermethod->id}}">
                                @endforeach
                        </datalist> --}}
                            <select wire:model="idmetode" class="select2 form-select" type="select">
                                @foreach ($ordermethods as $ordermethod)
                                    <option value="{{ $ordermethod->id }}" wire:key="{{ $ordermethod->id }}">
                                        {{ $ordermethod->nama }}</option>
                                @endforeach
                            </select>
                            @error('idmetode')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label class="form-label w-100">Status</label>
                            <input wire:model="status" type="search" class="form-control" list="data-status"
                                id="updateProductInput7" autocomplete="updateProductInput7"
                                placeholder="Status Produk/Menu">
                            <datalist id="data-status">
                                <option value="active">
                                <option value="inactive">
                            </datalist>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label w-100" for="updatePostInput6">Gambar</label>
                        <input wire:model="gambar" type="file" class="form-control" id="imgInp" onchange="readProdURL(this)" />
                        @error('gambar')<small class="text-danger">{{ $message }}</small>@enderror
                        <div wire:loading wire:target="gambar">
                            <div class="d-flex align-items-center text-secondary m-2">
                                <strong>Uploading...</strong>
                                <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                            </div>
                        </div>
                        @if($gambar)
                            <img wire:ignore.self id="previewImg" src="#" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-12">
                        <label>Deskripsi</label>
                        <textarea wire:model="deskripsi" type="text" class="form-control" id="updateProductInput8"
                            autocomplete="updateProductInput8" placeholder="Deskripsi Produk/Menu"></textarea>
                        @error('deskripsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
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
