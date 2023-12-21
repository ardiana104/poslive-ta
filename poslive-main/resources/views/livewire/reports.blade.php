@section('title', 'Laporan')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl-12 col-lg-12 col-md-12 order-0 order-md-1">
        <div class="card card-action mb-4">
            <div class="card-header align-items-center py-4">
                <h5 class="card-action-title mb-0">Transaksi Hari Ini</h5>
                <div class="card-action-element">
                    <button class="btn btn-label-primary" type="button">
                        {{ date('d/m/Y', strtotime(now())) }}
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if($transactions)
                    @foreach($transactions as $key=>$transaction)
                        <div class="accordion accordion-flush accordion-arrow-left"
                            id="ecommerceBillingAccordionPayment">
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap"
                                    id="headingPaymentMaster">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#transaction{{$transaction->id}}" aria-expanded="false"
                                        aria-controls="headingPaymentMaster" role="button">
                                        <span class="accordion-button-information d-flex align-items-center gap-3">
                                            <span class="accordion-button-image">
                                                <img src="https://placehold.co/50x30" class="img-fluid w-px-50 h-px-30"
                                                    alt="master-card" />
                                            </span>
                                            <span>
                                                <span class="d-flex gap-2 flex-wrap align-items-baseline">
                                                    <span
                                                        class="h6 mb-0 text-nowrap">{{ $transaction->invoice_number }}</span>
                                                    @if ($transaction->status == 'Pending')
                                                        <span
                                                            class="badge bg-label-secondary">{{ $transaction->status }}</span>
                                                    @endif
                                                    @if ($transaction->status == 'On-Hold')
                                                        <span class="badge bg-label-warning">{{ $transaction->status }}</span>
                                                    @endif
                                                    @if ($transaction->status == 'Cancelled')
                                                        <span class="badge bg-label-danger">{{ $transaction->status }}</span>
                                                    @endif
                                                    @if ($transaction->status == 'Processing')
                                                        <span class="badge bg-label-success">{{ $transaction->status }}</span>
                                                    @endif
                                                    @if ($transaction->status == 'Completed')
                                                        <span class="badge bg-label-success">{{ $transaction->status }}</span>
                                                        <small>
                                                            Last Update :
                                                            {{ date('d/m/Y H:i:s', strtotime($transaction->updated_at)) }}
                                                        </small>
                                                    @endif
                                                </span>
                                                <span class="mb-0 text-muted">{{ idr($transaction->total) }}</span>
                                            </span>
                                        </span>
                                    </a>

                                    @if ($transaction->status == 'Completed')
                                        <div class="alert alert-success d-flex align-items-center" role="alert">
                                            <span class="alert-icon text-success me-2">
                                                <i class="ti ti-check ti-xs"></i>
                                            </span>
                                            Transaksi Selesai! Terima Kasih
                                        </div>
                                    @else
                                        <div class="d-flex gap-3 p-4 p-sm-0 pt-0 ms-1 ms-sm-0">
                                            <a href="javascript:void(0);"
                                                wire:click="updateStatusOnhold({{ $transaction->id }})"><i
                                                    class="ti ti-mood-confuzed-filled text-secondary ti-sm"></i></a>
                                            <a href="javascript:void(0);"
                                                wire:click="updateStatusCancelled({{ $transaction->id }})"><i
                                                    class="ti ti-brand-windows text-secondary ti-sm"></i></a>
                                            <a href="javascript:void(0);"
                                                wire:click="updateStatusProcessing({{ $transaction->id }})"><i
                                                    class="ti ti-refresh text-secondary ti-sm"></i></a>
                                            <a href="javascript:void(0);"
                                                wire:click="updateStatusCompleted({{ $transaction->id }})"><i
                                                    class="ti ti-circle-check text-secondary ti-sm"></i></a>
                                            <a href="javascript:void(0);"
                                                wire:click="deleteTransaction({{ $transaction->id }})"><i
                                                    class="ti ti-trash text-secondary ti-sm"></i></a>
                                        </div>
                                    @endif

                                </div>
                                <div id="transaction{{$transaction->id}}" class="accordion-collapse collapse"
                                    data-bs-parent="#ecommerceBillingAccordionPayment">
                                    <div class="customer-avatar-section border-top">
                                        <div class="d-flex align-items-center flex-column mt-3">
                                            <div class="customer-info text-center">
                                                <h4 class="mb-1">Kopi Mustika Bali</h4>
                                                <small>Desa Sepang Kelod, Kec. Busung Biu, Kabupaten Buleleng</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-around flex-wrap my-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-phone ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium">+6287860133965</p>
                                                <small>Telepon</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-mail ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium">kopimustikabali@gmail.com</p>
                                                <small>Email</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-around flex-wrap my-4 border-top py-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-file-invoice ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium">{{ $transaction->invoice_number }}</p>
                                                <small>No. Invoice</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-calendar ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium">
                                                    {{ date('d/m/Y', strtotime($transaction->created_at)) }}</p>
                                                <small>Tanggal</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-clock ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium">
                                                    {{ date('H:i:s', strtotime($transaction->created_at)) }}</p>
                                                <small>Jam</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-around flex-wrap my-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-shopping-cart ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium"> {{ Auth::user()->name }}</p>
                                                <small>Kasir</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-calendar-stats ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                @if ($transaction->status == 'Pending')
                                                    <span class="badge bg-label-secondary">{{ $transaction->status }}</span>
                                                @endif
                                                @if ($transaction->status == 'On-Hold')
                                                    <span class="badge bg-label-warning">{{ $transaction->status }}</span>
                                                @endif
                                                @if ($transaction->status == 'Cancelled')
                                                    <span class="badge bg-label-danger">{{ $transaction->status }}</span>
                                                @endif
                                                @if ($transaction->status == 'Processing')
                                                    <span class="badge bg-label-success">{{ $transaction->status }}</span>
                                                @endif
                                                @if ($transaction->status == 'Completed')
                                                    <span class="badge bg-label-success">{{ $transaction->status }}</span>
                                                @endif
                                                <small>Status</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar">
                                                <div class="avatar-initial rounded bg-label-primary">
                                                    <i class="ti ti-history ti-md"></i>
                                                </div>
                                            </div>
                                            <div class="gap-0 d-flex flex-column">
                                                <p class="mb-0 fw-medium">
                                                    {{ date('H:i:s', strtotime($transaction->updated_at)) }}</p>
                                                <small>Riwayat</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div wire:ignore.self id="{{ $transaction->invoice_number }}"
                                        class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap mt-3">
                                        <table class="table table-sm table-borderless text-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transaction->product as $key=>$row)
                                                    <tr>
                                                        <td>
                                                            <small>
                                                                @if ($row->order_method == 'Dine In')
                                                                    <i class="fas fa-utensils"
                                                                        style="font-size:10px;"></i>
                                                                @endif
                                                                @if ($row->order_method == 'Take Away')
                                                                    <i class="fas fa-shopping-bag"
                                                                        style="font-size:10px;"></i>
                                                                @endif
                                                                {{ $key + 1 }}
                                                            </small>
                                                        </td>
                                                        <td><small><strong>{{ $row->product_name }}</strong>-{{ $row->product_option }}</small>
                                                        </td>
                                                        <td><small>{{ $row->qty }}</small></td>
                                                        <td><small>Rp.{{ $row->product_price }}</small></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                                        <div class="order-calculations">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="w-px-100 text-heading">Ppn 10%:</span>
                                                <h6 class="mb-0">Rp.0</h6>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h6 class="w-px-100 mb-0">Total:</h6>
                                                <h6 class="mb-0">{{ idr($transaction->total) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
            <div class="card-footer text-center">
                <small>Terima Kasih Atas Kunjungan Anda</small><br>
                <small><strong>Kopi Mustika Bali</strong></small>
            </div>
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
                            <th>ID</th>
                            <th>Invoice No.</th>
                            {{-- <th>Customer ID</th> --}}
                            <th>Total</th>
                            <th>Dibuat</th>
                            <th>Diperbarui</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $key=>$transaction)
                            <tr>
                                <td class=" font-weight-bold">{{ $key + 1 }}</td>
                                <td>{{ $transaction->invoice_number }}</td>
                                {{-- <td>{{ $transaction->user_id }}</td> --}}
                                <td>{{ $transaction->total }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->updated_at }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button wire:click="updateStatusOnhold({{ $transaction->id}})" class="btn btn-warning btn-xs"><i class="ti ti-mood-confuzed-filled" aria-hidden="true"></i></button>
                                        <button wire:click="updateStatusCancelled({{ $transaction->id}})" class="btn btn-danger btn-xs" style="opacity:0.7;"><i class="fa fa-window-close"></i></button>
                                        <button wire:click="updateStatusProcessing({{ $transaction->id}})" class="btn btn-success btn-xs" style="opacity:0.7;"><i class="fa fa-spinner"></i></button>
                                        <button wire:click="updateStatusCompleted({{ $transaction->id}})" class="btn btn-success btn-xs"><i class="fas fa-check-double"></i></button>
                                        <button wire:click="deleteTransaction({{ $transaction->id}})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
