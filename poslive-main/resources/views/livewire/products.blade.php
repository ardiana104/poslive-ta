@section('title', 'Produk')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between mb-2">
        <h5><span class="text-muted fw-light">Produk /</span> Produk</h5>
        <div>
            <button type="button" class="btn btn-primary" data-bs-target="#createProductForm" data-bs-toggle="modal">
                <span class="ti-xs ti ti-plus me-1"></span>
                Tambah Produk
            </button>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header flex-column flex-md-row">
                    <div class="dt-action-buttons text-center pt-3 pt-md-0">
                        <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key=>$product)
                            <tr>
                                <td class=" font-weight-bold">{{ $product->id }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->category->nama }}</td>
                                <td>{{ $product->stok }}</td>
                                <td>{{ $product->harga }}</td>
                                <td>{{ $product->status}}</td>
                                <td class="text-center">
                                    <button type="button" wire:click="edit({{ $product->id }})"
                                        class="btn btn-label-primary waves-effect btn-sm"
                                        data-bs-target="#updateProductForm" data-bs-toggle="modal">
                                        <span class="ti-xs ti ti-edit me-1"></span>
                                        Ubah
                                    </button>
                                    <button type="button" wire:click="delete({{ $product->id }})"
                                        class="btn btn-label-danger waves-effect btn-sm" data-bs-toggle="modal" data-bs-target="#deleteProductForm">
                                        <span class="ti-xs ti ti-trash me-1"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                            @include('livewire.product-image')
                        @if($updateMode)
                            @include('livewire.product-update')
                        @else
                            @include('livewire.product-create')
                        @endif
                            @include('livewire.product-delete')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    function readProdURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readProdURL(this);
    });
</script>
<script>
    window.addEventListener('editProduct', event => {
        $('#updateProductForm').modal('show');
    })
    window.addEventListener('createProduct', event => {
        $('#createProductForm').modal('show');
    })
</script>
@endpush