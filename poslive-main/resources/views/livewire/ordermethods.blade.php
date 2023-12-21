@section('title', 'Metode Order')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between mb-2">
        <h5><span class="text-muted fw-light">Produk /</span> Metode Order</h5>
        <div>
            <button type="button" class="btn btn-primary" data-bs-target="#createOrdermethodForm" data-bs-toggle="modal">
                <span class="ti-xs ti ti-plus me-1"></span>
                Tambah Metode Order
            </button>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if($updateMode)
                @include('livewire.ordermethod-update')
                @else
                @include('livewire.ordermethod-create')
                @endif
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
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordermethods as $key=>$value)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->deskripsi }}</td>
                                <td class="text-center">
                                    <button type="button" wire:click="edit({{ $value->id }})"
                                        class="btn btn-label-primary waves-effect btn-sm"
                                        data-bs-target="#updateOrdermethodForm" data-bs-toggle="modal">
                                        <span class="ti-xs ti ti-edit me-1"></span>
                                        Ubah
                                    </button>
                                    <button type="button" wire:click="delete({{ $value->id }})"
                                        class="btn btn-label-danger waves-effect btn-sm">
                                        <span class="ti-xs ti ti-trash me-1"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>