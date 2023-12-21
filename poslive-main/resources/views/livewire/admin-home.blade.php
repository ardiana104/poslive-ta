@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <span class="alert-icon text-success me-2">
                        <i class="ti ti-check ti-xs"></i>
                    </span>
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Selamat Datang {{ Auth::user()->address->nama_depan }} {{ Auth::user()->address->nama_belakang }}! 🎉</h5>
                                <p class="mb-2">{{ Auth::user()->email }}</p>
                                <h4 class="text-primary mb-1">{{Auth::user()->name}}</h4>
                                <a href="{{ route('cart') }}" class="btn btn-primary">Kasir</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('admin/img/illustrations/card-advance-sale.png') }}" height="140"
                                    alt="view sales" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Statistik</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $totransaksi }}</h5>
                                        <small>Penjualan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-users ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ count($users) }}</h5>
                                        <small>Pelanggan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $produk }}</h5>
                                        <small>Produk</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ count($todayTransactions) }}</h5>
                                        <small>Transaksi</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-xl-6 col-lg-7 col-md-7 order-0 order-md-1">
              <div class="card card-action mb-4">
                <div class="card-header align-items-center py-4">
                  <h5 class="card-action-title mb-0">Transaksi Hari Ini</h5>
                  <div class="card-action-element">
                    <button
                      class="btn btn-label-primary"
                      type="button">
                      {{ date('d/m/Y', strtotime(now())) }}
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  @if ($todayTransactions)
                    @foreach ($todayTransactions as $key => $value)
                      <div class="accordion accordion-flush accordion-arrow-left" id="ecommerceBillingAccordionPayment">
                        <div class="accordion-item border-bottom">
                          <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap"
                            id="headingPaymentMaster">
                            <a class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#transaction{{ $value->id }}"
                              aria-expanded="false"
                              aria-controls="headingPaymentMaster"
                              role="button">
                              <span class="accordion-button-information d-flex align-items-center gap-3">
                                <span class="accordion-button-image">
                                  <img
                                    src="https://placehold.co/50x30"
                                    class="img-fluid w-px-50 h-px-30"
                                    alt="master-card"/>
                                </span>
                                <span>
                                  <span class="d-flex gap-2 flex-wrap align-items-baseline">
                                    <span class="h6 mb-0 text-nowrap">{{ $value->invoice_number }}</span>
                                    @if ($value->status == 'Pending')
                                        <span class="badge bg-label-secondary">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'On-Hold')
                                        <span class="badge bg-label-warning">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'Cancelled')
                                        <span class="badge bg-label-danger">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'Processing')
                                        <span class="badge bg-label-success">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'Completed')
                                        <span class="badge bg-label-success">{{ $value->status }}</span>
                                        <small>
                                          Last Update : {{ date('d/m/Y H:i:s', strtotime($value->updated_at)) }}
                                        </small>
                                    @endif
                                  </span>
                                  <span class="mb-0 text-muted">{{ idr($value->total) }}</span>
                                </span>
                              </span>
                            </a>
                            
                            @if($value->status == 'Completed')
                              <div class="alert alert-success d-flex align-items-center" role="alert">
                                <span class="alert-icon text-success me-2">
                                  <i class="ti ti-check ti-xs"></i>
                                </span>
                                Transaksi Selesai! Terima Kasih
                              </div>
                            @else
                              <div class="d-flex gap-3 p-4 p-sm-0 pt-0 ms-1 ms-sm-0">
                                <a href="javascript:void(0);" wire:click="updateStatusOnhold({{ $value->id}})"
                                  ><i class="ti ti-mood-confuzed-filled text-secondary ti-sm"></i
                                ></a>
                                <a href="javascript:void(0);" wire:click="updateStatusCancelled({{ $value->id}})"
                                  ><i class="ti ti-brand-windows text-secondary ti-sm"></i
                                ></a>
                                <a href="javascript:void(0);" wire:click="updateStatusProcessing({{ $value->id}})"
                                  ><i class="ti ti-refresh text-secondary ti-sm"></i
                                ></a>
                                <a href="javascript:void(0);" wire:click="updateStatusCompleted({{ $value->id}})"
                                  ><i class="ti ti-circle-check text-secondary ti-sm"></i
                                ></a>
                                <a href="javascript:void(0);" wire:click="deleteTransaction({{ $value->id}})"
                                  ><i class="ti ti-trash text-secondary ti-sm"></i
                                ></a>
                              </div>
                            @endif

                          </div>
                          <div id="transaction{{ $value->id }}" class="accordion-collapse collapse" data-bs-parent="#ecommerceBillingAccordionPayment">
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
                                  <p class="mb-0 fw-medium">{{ $value->invoice_number }}</p>
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
                                  <p class="mb-0 fw-medium">{{ date('d/m/Y', strtotime($value->created_at)) }}</p>
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
                                  <p class="mb-0 fw-medium">{{ date('H:i:s', strtotime($value->created_at)) }}</p>
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
                                  @if ($value->status == 'Pending')
                                    <span class="badge bg-label-secondary">{{ $value->status }}</span>
                                  @endif
                                  @if ($value->status == 'On-Hold')
                                      <span class="badge bg-label-warning">{{ $value->status }}</span>
                                  @endif
                                  @if ($value->status == 'Cancelled')
                                      <span class="badge bg-label-danger">{{ $value->status }}</span>
                                  @endif
                                  @if ($value->status == 'Processing')
                                      <span class="badge bg-label-success">{{ $value->status }}</span>
                                  @endif
                                  @if ($value->status == 'Completed')
                                      <span class="badge bg-label-success">{{ $value->status }}</span>
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
                                  <p class="mb-0 fw-medium">{{ date('H:i:s', strtotime($value->updated_at)) }}</p>
                                  <small>Riwayat</small>
                                </div>
                              </div>
                            </div>

                            <div wire:ignore.self id="{{ $value->invoice_number }}" class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap mt-3">
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
                                  @foreach ($value->product as $key => $row)
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
                                  <h6 class="mb-0">{{ idr($value->total) }}</h6>
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

            <div class="col-xl-6 col-lg-7 col-md-7 order-0 order-md-1">
              <div class="card card-action mb-4">
                <div class="card-header align-items-center py-4">
                  <h5 class="card-action-title mb-0">Cetak Transaksi</h5>
                  <div class="card-action-element">
                    <button
                      class="btn btn-label-primary"
                      type="button">
                      {{ date('d/m/Y', strtotime(now())) }}
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  @if($todayTransactions)
                    @foreach($todayTransactions as $key=>$value)
                      @if($value->status == 'Completed')
                        <div class="accordion accordion-flush accordion-arrow-left" id="ecommerceBillingAccordionPayment">
                          <div class="accordion-item border-bottom">
                            <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap"
                              id="headingPaymentMaster">
                              <a class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#transaction{{ $value->id }}"
                                aria-expanded="false"
                                aria-controls="headingPaymentMaster"
                                role="button">
                                <span class="accordion-button-information d-flex align-items-center gap-3">
                                  <span class="accordion-button-image">
                                    <img
                                      src="https://placehold.co/50x30"
                                      class="img-fluid w-px-50 h-px-30"
                                      alt="master-card"/>
                                  </span>
                                  <span>
                                    <span class="d-flex gap-2 flex-wrap align-items-baseline">
                                      <span class="h6 mb-0 text-nowrap">{{ $value->invoice_number }}</span>
                                      @if ($value->status == 'Pending')
                                          <span class="badge bg-label-secondary">{{ $value->status }}</span>
                                      @endif
                                      @if ($value->status == 'On-Hold')
                                          <span class="badge bg-label-warning">{{ $value->status }}</span>
                                      @endif
                                      @if ($value->status == 'Cancelled')
                                          <span class="badge bg-label-danger">{{ $value->status }}</span>
                                      @endif
                                      @if ($value->status == 'Processing')
                                          <span class="badge bg-label-success">{{ $value->status }}</span>
                                      @endif
                                      @if ($value->status == 'Completed')
                                          <span class="badge bg-label-success">{{ $value->status }}</span>
                                          <small>
                                            Last Update : {{ date('d/m/Y H:i:s', strtotime($value->updated_at)) }}
                                          </small>
                                      @endif
                                    </span>
                                    <span class="mb-0 text-muted">{{ idr($value->total) }}</span>
                                  </span>
                                </span>
                              </a>
                              <div class="d-flex gap-3 p-4 p-sm-0 pt-0 ms-1 ms-sm-0">
                                <a href="javascript:void(0);" onclick="PrintReceipt('{{$value->invoice_number}}')"
                                  ><i class="ti ti-printer text-secondary ti-sm"></i
                                ></a>
                              </div>
                            </div>
                            <div id="transaction{{ $value->id }}" class="accordion-collapse collapse" data-bs-parent="#ecommerceBillingAccordionPayment">
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
                                    <p class="mb-0 fw-medium">{{ $value->invoice_number }}</p>
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
                                    <p class="mb-0 fw-medium">{{ date('d/m/Y', strtotime($value->created_at)) }}</p>
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
                                    <p class="mb-0 fw-medium">{{ date('H:i:s', strtotime($value->created_at)) }}</p>
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
                                    @if ($value->status == 'Pending')
                                      <span class="badge bg-label-secondary">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'On-Hold')
                                        <span class="badge bg-label-warning">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'Cancelled')
                                        <span class="badge bg-label-danger">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'Processing')
                                        <span class="badge bg-label-success">{{ $value->status }}</span>
                                    @endif
                                    @if ($value->status == 'Completed')
                                        <span class="badge bg-label-success">{{ $value->status }}</span>
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
                                    <p class="mb-0 fw-medium">{{ date('H:i:s', strtotime($value->updated_at)) }}</p>
                                    <small>Riwayat</small>
                                  </div>
                                </div>
                              </div>

                              <div wire:ignore.self id="{{ $value->invoice_number }}" class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap mt-3">
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
                                    @foreach ($value->product as $key => $row)
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
                                    <h6 class="mb-0">{{ idr($value->total) }}</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      @endif
                    @endforeach
                  @endif
                </div>
                <div class="card-footer text-center">
                    <small>Terima Kasih Atas Kunjungan Anda</small><br>
                    <small><strong>Kopi Mustika Bali</strong></small>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //PrintBill
        function PrintReceipt(el) {
            var data =
                '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">' +
                '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />';
            data += document.getElementById(el).innerHTML;
            myReceipt = window.open("", "myWin", "left=512, top=64, width=340, height=500");
            myReceipt.screenX = 0;
            myReceipt.screenY = 0;
            myReceipt.document.write(data);
            myReceipt.document.title = 'Kopi Mustika Bali';
            myReceipt.focus();
            setTimeout(() => {
                myReceipt.close();
            }, 240000);
        }
    </script>
@endpush
