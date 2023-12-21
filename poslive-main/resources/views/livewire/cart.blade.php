@section('title', 'Kasir')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                {{-- <div class="card-header">
                    <h6 class="text-center pt-1 title">DINE IN <small><i class="fas fa-utensils"></i></small></h6>
                    @include('livewire.search')
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        @foreach ($products as $product)
                            @if ($product->status == 'active' && $product->idmetode == 1)
                                <div class="col-sm-6 col-lg-6">
                                    <div class="card p-2 h-100 shadow-none border">
                                        <div class="rounded-2 text-center mb-3">
                                            <a href="javascript:void(0);"
                                            wire:click="addItem({{ $product->id }})"><img class="img-fluid"
                                                    src="{{ asset('storage/uploads/' . $product->gambar) }}"
                                                    alt="tutor image 1" /></a>
                                        </div>
                                        <div class="card-body p-3 pt-2">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                @if ($search == '')
                                                    <span
                                                        class="badge bg-label-primary">{{ $product->category->nama }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-label-warning">{{ $product->category->nama }}</span>
                                                @endif

                                                @if ($search == '')
                                                    <span
                                                        class="badge bg-label-primary">{{ $product->option->nama }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-label-info">{{ $product->option->nama }}</span>
                                                @endif
                                            </div>
                                            <a href="javascript:void(0);" class="h5"
                                                wire:click="addItem({{ $product->id }})">{{ $product->nama }}</a>
                                            <p class="d-flex align-items-center">{{ idr($product->harga) }}</p>
                                            <h6 class="d-flex align-items-center me-1">
                                                Stok <span class="text-muted">({{ $product->stok }})</span>
                                            </h6>
                                            <div class="w-100">
                                                <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center"
                                                    href="javascript:void(0);"
                                                    wire:click="addItem({{ $product->id }})">
                                                    <span class="me-2">Tambah</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                {{-- <div class="card-header text-secondary bg-white py-0 px-0">
                    <h6 class="text-center font-weight-bold pt-1 title">TRANSAKSI</h6>
                </div> --}}
                <div class="card-body">
                    <table class="table table-sm text-secondary">
                        <thead>
                            <tr>
                                <th class="bg-light border-0" style="top:0;">No</th>
                                <th class="bg-light border-0" style="top:0;">Nama</th>
                                <th class="bg-light border-0" style="top:0;">Qty</th>
                                <th class="bg-light border-0" style="top:0;">Harga</th>
                                {{-- <th class="bg-light border-0" style="top:0;">Subtotal</th> --}}
                                <th class="bg-light border-0" style="top:0;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse($carts as $key=>$cart)
                                    <td>
                                        <small>
                                            @if ($cart['attributes']['order_method'] == 2)
                                                <i class="fas fa-utensils" style="font-size:10px;"></i>
                                            @endif
                                            @if ($cart['attributes']['order_method'] == 1)
                                                <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                            @endif
                                            {{ $key + 1 }}
                                        </small>
                                    </td>
                                    <td><strong>{{ $cart['name'] }}</strong>&nbsp;<small>{{ $cart['attributes']['option'] }}</small><br>
                                    </td>
                                    <td>{{ $cart['quantity'] }}</td>
                                    <td>Rp.{{ number_format($cart['pricesingle'], 0) }}</td>
                                    {{-- <td>Rp.{{ number_format($cart['price'], 0) }}</td> --}}
                                    <td>
                                        <ul class="list-group list-group-horizontal py-0 px-0 border-0">
                                            <li class="list-group-item py-0 px-0 border-0">
                                                <button class="btn rounded-pill btn-icon btn-label-primary waves-effect btn-sm me-1" type="button"
                                                    wire:click="increaseItem('{{ $cart['rowId'] }}')"> <i
                                                        class="fas fa-plus-square"></i> 
                                                </button>
                                            </li>
                                            <li class="list-group-item py-0 px-0 border-0">
                                                <button class="btn rounded-pill btn-icon btn-label-secondary waves-effect btn-sm me-1" type="button"
                                                    wire:click="decreaseItem('{{ $cart['rowId'] }}')"> <i
                                                        class="fas fa-minus-square"></i> 
                                                </button>
                                            </li>
                                            <li class="list-group-item py-0 px-0 border-0">
                                                <button class="btn rounded-pill btn-icon btn-label-danger waves-effect btn-sm me-1" type="button"
                                                    wire:click="removeItem('{{ $cart['rowId'] }}')"> <i
                                                        class="fas fa-trash-alt"></i> 
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary">
                                    <small>Menerima Pembayaran</small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Gerbang_Pembayaran_Nasional_logo.svg" alt="BCA" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="BNI" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/1200px-Logo_dana_blue.svg.png" alt="DANA" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Gopay_logo.svg/2560px-Gopay_logo.svg.png" alt="GOPAY" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/LinkAja.svg/1200px-LinkAja.svg.png" alt="LINKAJA" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                            </tr>
                            {{-- <tr>
                                <td colspan="4" class="text-center text-secondary">
                                    <small>Pembayaran lainnya yang sudah di dukung :</small>
                                </td>
                                <td colspan="1" class="text-center text-secondary">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Gerbang_Pembayaran_Nasional_logo.svg" alt="GPN" class="img-fluid px-0 py-0"
                                        style="height:24px;"><br>
                                </td>
                                <td colspan="1" class="text-center text-secondary">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS" class="img-fluid px-0 py-0"
                                        style="height:24px;">
                                </td>
                            </tr> --}}
                            <tr>
                                <td colspan="6" class="text-center text-secondary">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/1200px-Logo_QRIS.svg.png" alt="QRIS" class="img-fluid mt-2 mb-2"
                                        style="height:125px;">
                                </td>
                            </tr>
                            @endforelse
                            @if (session()->has('error'))
                                <tr>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <span class="alert-icon text-danger me-2">
                                          <i class="ti ti-bell ti-xs"></i>
                                        </span>
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </tr>
                            @endif
                            @if (session()->has('message'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <span class="alert-icon text-danger me-2">
                                      <i class="ti ti-bell ti-xs"></i>
                                    </span>
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button wire:click="clearCart" class="btn btn-label-primary waves-effect w-100 title mb-2"
                        style="border-radius:0;"><span class="ti-xs ti ti-trash me-1"></span> KOSONGKAN
                        KERANJANG</button>

                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label" for="basic-default-name" id="inputGroup-sizing-lg">SUBTOTAL</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control title"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                            value="Rp.{{ number_format($summary['sub_total'], 0) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label" for="basic-default-name" id="inputGroup-sizing-lg">PPN 10%</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control hidden-xs"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                            value="Rp.{{ number_format($summary['pajak'], 0) }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label" for="basic-default-name" id="inputGroup-sizing-lg">GRAND
                            TOTAL</label>
                        <div class="col-sm-6">
                            <input type="text" readonly class="form-control title"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                            value="Rp.{{ number_format($summary['total'], 0) }}">
                        </div>
                    </div>

                    <div class="btn-group w-100 mb-3" role="group" aria-label="Basic mixed styles example">
                        <button wire:click="enableTax" class="btn btn-label-primary waves-effect"
                            style="border-radius:0;"><i class="fa fa-plus-square me-1" aria-hidden="true"></i>
                            PPN</button>
                        <button wire:click="disableTax" class="btn btn-label-secondary waves-effect"
                            style="border-radius:0;"><i class="fa fa-minus-square me-1" aria-hidden="true"></i> NON
                            PPN</button>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-6 col-form-label" for="basic-default-name" id="inputGroup-sizing-lg">TOTAL</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="totalCart" value="{{ $summary['total'] }}">
                            <input wire:ignore.self wire:model="payment" id="payment" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>

                    <form wire:submit.prevent="handleSubmit">
                        {{-- <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="basic-default-name" id="inputGroup-sizing-lg">Pembayaran</label>
                            <div class="col-sm-6">
                                <span wire:ignore id="pembayaran" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="basic-default-name" id="inputGroup-sizing-lg">Kembalian</label>
                            <div class="col-sm-6">
                                <span wire:ignore.self id="kembalian" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                            </div>
                        </div> --}}

                        <button wire:ignore.self id="pay-button" disable
                            class="btn btn-label-success waves-effect title active w-100" style="border-radius:0;"><i
                                class="fa fa-money"></i> BAYAR</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Cart -->
    <div wire:ignore.self class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-1 bg-success text-white">
                    <h6 class="modal-title" id="cartModalLabel">TRANSAKSI</h6>
                    <button type="button" class="btn btn-xs btn-success" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body py-0 px-0">
                    <div class="card-body px-0 py-0" style="overflow-y:scroll;height:40vh;">
                        <table class="table table-sm text-secondary" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th class="bg-light border-0" style="top:0;">No</th>
                                    <th class="bg-light border-0" style="top:0;">Nama</th>
                                    <th class="bg-light border-0" style="top:0;">Qty</th>
                                    <th class="bg-light border-0" style="top:0;">Harga</th>
                                    <th class="bg-light border-0" style="top:0;">Subtotal</th>
                                    <th class="bg-light border-0" style="top:0;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse($carts as $key=>$cart)
                                        <td>
                                            <small>
                                                @if ($cart['attributes']['order_method'] == 2)
                                                    <i class="fas fa-utensils" style="font-size:10px;"></i>
                                                @endif
                                                @if ($cart['attributes']['order_method'] == 1)
                                                    <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                                @endif
                                                {{ $key + 1 }}
                                            </small>
                                        </td>
                                        <td><strong>{{ $cart['name'] }}</strong>&nbsp;<small>{{ $cart['attributes']['option'] }}</small><br>
                                        </td>
                                        <td>{{ $cart['quantity'] }}</td>
                                        <td>Rp.{{ number_format($cart['pricesingle'], 0) }}</td>
                                        <td>Rp.{{ number_format($cart['price'], 0) }}</td>
                                        <td>
                                            <ul class="list-group list-group-horizontal py-0 px-0 border-0">
                                                <li class="list-group-item py-0 px-0 border-0"><button
                                                        class="btn btn-label-success waves-effect" type="button"
                                                        wire:click="increaseItem('{{ $cart['rowId'] }}')"> <i
                                                            class="fas fa-plus-square"></i> </button></li>
                                                <li class="list-group-item py-0 px-0 border-0"><button
                                                        class="btn btn-label-secondary waves-effect" type="button"
                                                        wire:click="decreaseItem('{{ $cart['rowId'] }}')"> <i
                                                            class="fas fa-minus-square"></i> </button></li>
                                                <li class="list-group-item py-0 px-0 border-0"><button
                                                        class="btn btn-label-danger waves-effect" type="button"
                                                        wire:click="removeItem('{{ $cart['rowId'] }}')"> <i
                                                            class="fas fa-trash-alt"></i> </button></li>
                                            </ul>
                                        </td>
                                </tr>
                            @empty
                                <td colspan="6">
                                    <h6 class="text-center font-weight-bold">Keranjang Kosong</h6>
                                </td>
                                @endforelse
                                @if (session()->has('error'))
                                    <tr>
                                        <div class=" alert alert-danger">
                                            {{ session('error') }}
                                            <button type="button" class="text-danger close" data-dismiss="alert"
                                                aria-hidden="true"
                                                style="position:absolute;right:0;top:0;">&times;</button>
                                        </div>
                                    </tr>
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert alert-success d-flex">
                                        {{ session('message') }}
                                        <button type="button" class="text-danger close" data-dismiss="alert"
                                            aria-hidden="true"
                                            style="position:absolute;right:0;top:0;">&times;</button>
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer px-0 py-0">
                        <button wire:click="clearCart" class="btn btn-label-primary waves-effect w-100 title"
                            style="border-radius:0;"><span class="ti-xs ti ti-trash me-1"></span> KOSONGKAN
                            KERANJANG</button>
                        <div class="input-group input-group-md">
                            <span class="input-group-text font-weight-bold col-6 title"
                                id="inputGroup-sizing-lg">SUBTOTAL</span>
                            <input type="text" readonly class="form-control col-6 title"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                value="Rp.{{ number_format($summary['sub_total'], 0) }}">
                            <span class="input-group-text font-weight-bold col-6  hidden-xs"
                                id="inputGroup-sizing-lg">PPN 10%</span>
                            <input type="text" readonly class="form-control col-6 hidden-xs"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                value="Rp.{{ number_format($summary['pajak'], 0) }}">
                            <span class="input-group-text font-weight-bold col-6 title"
                                id="inputGroup-sizing-lg">GRAND TOTAL</span>
                            <input type="text" readonly class="form-control col-6 title"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"
                                value="Rp.{{ number_format($summary['total'], 0) }}">
                        </div>
                        <div class="btn-group w-100 hidden-xs" role="group"
                            aria-label="Basic mixed styles example">
                            <button wire:click="enableTax" class="btn btn-label-primary waves-effect"
                                style="border-radius:0;"><i class="fa fa-plus-square me-1" aria-hidden="true"></i>
                                PPN</button>
                            <button wire:click="disableTax" class="btn btn-label-secondary waves-effect"
                                style="border-radius:0;"><i class="fa fa-minus-square me-1" aria-hidden="true"></i>
                                NON PPN</button>
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text font-weight-bold" id="inputGroup-sizing-lg"><i
                                    class="fa fa-money" aria-hidden="true"></i></span>
                            <input type="hidden" id="totalCart" value="{{ $summary['total'] }}">
                            <input wire:ignore.self wire:model="payment" id="payment" type="text"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-lg">
                        </div>
                        <form wire:submit.prevent="handleSubmit">
                            <!--<div class="input-group input-group-lg">
                                <span class="input-group-text font-weight-bold col-lg-4">Pembayaran</span>
                                <span wire:ignore id="pembayaran" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                            </div>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text font-weight-bold col-lg-4 title">Kembalian</span>
                                <span wire:ignore id="kembalian" readonly class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                            </div>-->
                            <button wire:ignore id="pay-button" disable class="btn btn-lg btn-success active w-100"
                                style="border-radius:0;"><i class="fa fa-money"></i> BAYAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal End-->

    <div id="snap-container"></div>
</div>
@push('scripts')
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-u738vfQYUNrLXyOx"></script>
    <script>
        payment.oninput = () => {
            const pembayaran = document.getElementById("payment").value
            const totalCart = document.getElementById("totalCart").value

            const kembalian = pembayaran - totalCart

            document.getElementById("kembalian").innerHTML = `Rp.${rupiah(kembalian)}`
            document.getElementById("pembayaran").innerHTML = `Rp.${rupiah(pembayaran)}`

            const saveButton = document.getElementById("saveButton")

            if (kembalian < 0) {
                saveButton.disable = true
            } else {
                saveButton.disable = false
            }
        }
        const rupiah = (angka) => {
            const numberString = angka.toString()
            const split = numberString.split(',')
            const sisa = split[0].length % 3
            let rupiah = split[0].substr(0, sisa)
            const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

            if (ribuan) {
                const separator = sisa ? ',' : ''
                rupiah += separator + ribuan.join(',')
            }
            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah
        }

        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.embed('{!! $snapToken !!}', {
                embedId: 'snap-container',
                onSuccess: function (result) {
                /* You may add your own implementation here */
                alert("payment success!"); console.log(result);
                },
                onPending: function (result) {
                /* You may add your own implementation here */
                alert("wating your payment!"); console.log(result);
                },
                onError: function (result) {
                /* You may add your own implementation here */
                alert("payment failed!"); console.log(result);
                },
                onClose: function () {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
@endpush
