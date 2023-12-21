<?php

namespace App\Http\Livewire;

use App\Models\Atribut;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Produk as ProductModel;
use App\Models\Kategori;
use App\Models\MetoderOrder;
use App\Models\Transactions;
use App\Models\ProductTransactions;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $clearSearch;
    public $tax = "0%";
    public $payment = 0;
    public $snapToken;

    public function clearSearch()
    {
        $this->search = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Kategori::all();
        $options = Atribut::all();
        $ordermethods = MetoderOrder::all();
        $products = ProductModel::where('nama', 'LIKE', '%' . $this->search . '%')
            ->orderBy('idkategori')
            ->get();
        $condition = new \Darryldecode\Cart\CartCondition([
            'name' => 'pajak',
            'type' => 'tax',
            'target' => 'total',
            'value' => $this->tax,
            'order' => 1
        ]);

        \Cart::session(Auth()->id())->condition($condition);
        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at', 'option', 'order_method');
        });

        if (\Cart::isEmpty()) {

            $cartData = [];
        } else {
            foreach ($items as $item) {
                $cart[] = [
                    'rowId' => $item->id,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'pricesingle' => $item->price,
                    'price' => $item->getPriceSum(),
                    'attributes' => $item->attributes
                ];
            }
            $cartData = collect($cart);
        }

        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();
        $newCondition = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $newCondition->getCalculatedValue($sub_total);

        $summary = [
            'sub_total' => $sub_total,
            'pajak' => $pajak,
            'total' => $total
        ];
        return view('livewire.cart', [
            'products' => $products,
            'categories' => $categories,
            'options' => $options,
            'ordermethods' => $ordermethods,
            'carts' => $cartData,
            'summary' => $summary
        ]);
    }

    public function addItem($id)
    {
        $rowId = "Cart" . $id;
        $cart = \Cart::session(Auth()->id())->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        $idProduct = substr($rowId, 4, 5);
        $product = ProductModel::find($idProduct);
        if ($cekItemId->isNotEmpty()) {
            if ($product->stok == $cekItemId[$rowId]->quantity) {
                session()->flash('error', 'Stock Limit');
            } else {
                \Cart::session(Auth()->id())->update($rowId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1
                    ]
                ]);
            }
        } else {
            if ($product->stok == 0) {
                session()->flash('error', 'Stock Limit');
            } else {
                \Cart::session(Auth()->id())->add([
                    'id' => "Cart" . $product->id,
                    'name' => $product->nama,
                    'price' => $product->harga,
                    'quantity' => 1,
                    'attributes' => [
                        'added_at' => Carbon::now(),
                        'option' => $product->idatribut,
                        'order_method' => $product->idmetode
                    ]
                ]);
            }
        }
    }

    public function enableTax()
    {
        $this->tax = "+10%";
    }
    public function disableTax()
    {
        $this->tax = "0%";
    }

    public function increaseItem($rowId)
    {
        $idProduct = substr($rowId, 4, 5);
        $product = ProductModel::find($idProduct);
        $cart = \Cart::session(Auth()->id())->getContent();
        $checkItem = $cart->whereIn('id', $rowId);
        if ($product->stok == $checkItem[$rowId]->quantity) {
            session()->flash('error', 'Stok Limit');
        } else {
            if ($product->stok == 0) {
                session()->flash('error', 'Stock Limit');
            } else {
                \Cart::session(Auth()->id())->update($rowId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1
                    ]
                ]);
            }
        }
    }

    public function decreaseItem($rowId)
    {
        \Cart::session(Auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => true,
                'value' => -1
            ]
        ]);
    }

    public function removeItem($rowId)
    {
        \Cart::session(Auth()->id())->remove($rowId);
    }

    public function clearCart()
    {
        \Cart::session(Auth()->id())->clear();
    }

    public function handleSubmit()
    {
        $cartTotal = \Cart::session(Auth()->id())->getTotal();
        $bayar = $this->payment;
        $kembalian = (int) $bayar - (int) $cartTotal;

        if (\Cart::isEmpty()) {
            return session()->flash('error', 'Transaksi Gagal!Cek Keranjang Mungkin Kosong.');
        }
        if ($bayar === 0) {
            return session()->flash('error', 'Transaksi Gagal! Silahkan Input Pembayaran.');
        }

        if ($kembalian >= 0) {
            DB::beginTransaction();
            try {
                $allCart = \Cart::session(Auth()->id())->getContent();

                $filterCart = $allCart->map(function ($item) {
                    return [
                        'id' => substr($item->id, 4, 5),
                        'name' => $item->name,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'attributes' => $item->attributes,
                    ];
                });

                foreach ($filterCart as $cart) {
                    $product = ProductModel::find($cart['id']);
                    if ($product->stok === 0) {
                        return session()->flash('error', 'Stok Limit');
                    }

                    $product->decrement('stok', $cart['quantity']);
                }

                // Available alpha caracters
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(100, 999)
                    . mt_rand(100, 999)
                    . $characters[rand(0, strlen($characters) - 1)];

                // shuffle the result
                $string = str_shuffle($pin);
                $id = 'TRP' . $string;
                //output: TRP-000001

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = 'SB-Mid-server-hmaE2E9n3Z-nQ3tnsp7Q5WJJ';
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $id,
                        'gross_amount' => $cartTotal,
                    ),
                    'customer_details' => array(
                        'first_name' => Auth::user()->address->nama_depan,
                        'last_name' => Auth::user()->address->nama_belakang,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->address->telepon,
                    ),
                );

                $this->snapToken = \Midtrans\Snap::getSnapToken($params);

                Transactions::create([
                    'invoice_number' => $id,
                    'user_id' => Auth()->id(),
                    'status' => 'Pending',
                    'pay' => $bayar,
                    'total' => $cartTotal
                ]);

                foreach ($filterCart as $cart) {
                    ProductTransactions::create([
                        'product_id' => $cart['id'],
                        'product_name' => $cart['name'],
                        'product_price' => $cart['price'],
                        'product_option' => $cart['attributes']['option'],
                        'order_method' => $cart['attributes']['order_method'],
                        'invoice_number' => $id,
                        'qty' => $cart['quantity']
                    ]);
                }

                \Cart::session(Auth()->id())->clear();
                $this->payment = 0;
                DB::commit();
            } catch (\Throwable $tr) {
                DB::rollback();
                return session()->flash('error', $tr);
            }
            return session()->flash('message', 'Transaksi Sukses');
            $this->resetPage();
        }
    }
}
