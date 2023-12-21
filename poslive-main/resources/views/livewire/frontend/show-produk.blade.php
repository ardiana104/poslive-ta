@section('meta-title', ''.$product->nama.'')
@section('meta-description', ''.$product->deskripsi.'')
@section('meta-gambar', ''.asset('storage/uploads/' . $product->gambar).'')
@section('meta-url', ''.route('showproduk', $product->slug).'')

<section class="breadcrumb_section text-uppercase" style="background-image: url({{asset('assets/images/breadcrumb/breadcrumb_bg_01.jpg')}});">
    <div class="container">
        <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">{{$product->nama}}</h1>
        <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
            <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Beranda</a></li>
            <li>{{$product->nama}}</li>
        </ul>
    </div>
    <div class="breadcrumb_icon_wrap">
        <div class="container">
            <div class="breadcrumb_icon wow fadeInUp" data-wow-delay=".3s">
                <img src="{{asset('assets/images/feature/icon_01.png')}}" alt="icon_not_found">
                <span class="bg_shape"></span>
            </div>
        </div>
    </div>
</section>

<section class="details_section shop_details sec_ptb_120 bg_default_gray">
    <div class="container">

        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
            <div class="col-lg-6 col-md-7">
                <div class="details_image_wrap wow fadeInUp" data-wow-delay=".1s">
                    <div class="details_image_carousel">
                        <div class="slider_item">
                            <img src="{{ asset('storage/uploads/' . $product->gambar) }}" alt="image_not_found">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7">
                <div class="details_content wow fadeInUp" data-wow-delay=".2s">
                    <div class="details_flex_title">
                        <h2 class="details_title text-uppercase">{{$product->nama}}</h2>
                    </div>
                    <p>
                        {{$product->deskripsi}}
                    </p>
                    <div class="details_price">
                        <strong class="price_text">{{idr($product->harga)}}</strong>
                        @if ($product->stok != 0)
                            <span class="in_stuck"><i class="fal fa-check"></i> In stock</span>
                        @elseif($product->stok == 0)
                            <span class="in_stuck"><i class="fal fa-check"></i> Out stock</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="product_description_wrap wow fadeInUp" data-wow-delay=".3s">
            <ul class="tabs_nav ul_li nav" role="tablist">
                <li>
                    <button class="active" data-bs-toggle="tab" data-bs-target="#product_description" type="button" role="tab" aria-selected="true">Deskripsi</button>
                </li>
                <li>
                    <button data-bs-toggle="tab" data-bs-target="#product_additional_info" type="button" role="tab" aria-selected="false">Additionnal Imformation</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product_description" role="tabpanel">
                    <p class="mb-0">
                        {{$product->deskripsi}}
                    </p>
                </div>
                <div class="tab-pane fade" id="product_additional_info" role="tabpanel">
                    <div class="details_flex_title">
                        <h2 class="details_title text-uppercase">Kategori</h2>
                        <div class="details_review">
                            <span class="review_text">{{$product->category}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="related_products">
            <h4 class="area_title text-uppercase mb-0 wow fadeInUp" data-wow-delay=".1s">Produk Lainnya</h4>
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="shop_card wow fadeInUp" data-wow-delay=".2s">
                            <a class="item_image" href="{{ route('showproduk', $item->slug) }}">
                                <img src="{{ asset('storage/uploads/' . $item->gambar) }}" alt="image_not_found">
                            </a>
                            <div class="item_content">
                                <h3 class="item_title text-uppercase">
                                    <a href="{{ route('showproduk', $item->slug) }}">{{$item->nama}}</a>
                                </h3>
                                <div class="btns_group">
                                    <span class="item_price bg_default_brown">{{ idr($item->harga) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
  </section>