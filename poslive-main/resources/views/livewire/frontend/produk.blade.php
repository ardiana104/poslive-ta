@section('meta-title', 'Produk')
@section('meta-description', 'Kopi Mustika Bali merupakan usaha rumahan yang baru berdiri dan
belum mempunyai legalitas hukum yang jelas dan mengikat.
Namun apabila nantinya tingkat penjualan produk ini semakin meningkat,
kopi mustika bali akan mengurus perizinan agar terdaftar jelas dan
dilindungi hukum yang mengikat dan jelas.')
@section('meta-gambar', ''.asset('assets/images/logo/logo.png').'')
@section('meta-url', ''.url('produk').'')

<!-- breadcrumb_section - start
        ================================================== -->
<section class="breadcrumb_section text-uppercase"
    style="background-image: url({{ asset('assets/images/breadcrumb/breadcrumb_bg_01.jpg') }});">
    <div class="container">
        <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">Produk</h1>
        <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li>Produk</li>
        </ul>
    </div>
    <div class="breadcrumb_icon_wrap">
        <div class="container">
            <div class="breadcrumb_icon wow fadeInUp" data-wow-delay=".3s">
                <img src="{{ asset('assets/images/feature/icon_01.png') }}" alt="icon_not_found">
                <span class="bg_shape"></span>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb_section - end
        ================================================== -->

<!-- shop_section - start
================================================== -->
<section class="shop_section sec_ptb_120 bg_default_gray">
    <div class="container">
        {{-- <ul class="filters-button-group ul_li_center wow fadeInUp" data-wow-delay=".1s">
            <li><button class="button text-uppercase active" data-filter="*">all</button></li>
            @foreach ($categories as $c)
                <li><button class="button text-uppercase"
                        data-filter=".{{ $c->id }}">{{ $c->nama }}</button></li>
            @endforeach
        </ul> --}}

        <div class="shop_filter_grid grid wow fadeInUp" data-wow-delay=".3s">
            @foreach ($product as $item)
                <div class="element-item {{ $item->category->id }}" data-category="{{ $item->category->nama }}">
                    <div class="shop_card">
                        <a class="item_image" href="{{route('showproduk', $item->slug)}}">
                            <img src="{{ asset('storage/uploads/' . $item->gambar) }}" alt="image_not_found">
                        </a>
                        <div class="item_content">
                            <h3 class="item_title text-uppercase">
                                <a href="{{route('showproduk', $item->slug)}}">{{ $item->nama }}</a>
                            </h3>
                            <div class="btns_group">
                                <span class="item_price bg_default_brown">{{ idr($item->harga) }}</span>
                                {{-- <a class="btn btn_border border_black text-uppercase" href="#!">Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $product->links('paginate-kopi') }}
    </div>
</section>
