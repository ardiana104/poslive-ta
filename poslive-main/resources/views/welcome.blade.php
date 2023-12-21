@extends('layouts.masterweb')

@section('meta-title', 'Beranda')
@section('meta-description', 'Kopi Mustika Bali merupakan usaha rumahan yang baru berdiri dan
belum mempunyai legalitas hukum yang jelas dan mengikat.
Namun apabila nantinya tingkat penjualan produk ini semakin meningkat,
kopi mustika bali akan mengurus perizinan agar terdaftar jelas dan
dilindungi hukum yang mengikat dan jelas.')
@section('meta-gambar', ''.asset('assets/images/logo/logo.png').'')
@section('meta-url', ''.url('/').'')

@section('content')

    <!-- cart_sidebar - start
                    ================================================== -->
    <div class="sidebar-menu-wrapper">
        <div class="cart_sidebar">
            <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
            <h2 class="heading_title text-uppercase">Cart Items - <span>4</span></h2>

            <div class="cart_items_list">
                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/images/recent_post/img_03.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet, sectetur adipisi cingey.
                        </h4>
                        <span class="item_price">$19.00</span>
                        <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>

                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/images/recent_post/img_04.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet, sectetur adipisi cingey.
                        </h4>
                        <span class="item_price">$19.00</span>
                        <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>

                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/images/recent_post/img_05.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet, sectetur adipisi cingey.
                        </h4>
                        <span class="item_price">$19.00</span>
                        <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>

                <div class="cart_item">
                    <div class="item_image">
                        <img src="assets/images/recent_post/img_06.jpg" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">
                            Rorem ipsum dolor sit amet, sectetur adipisi cingey.
                        </h4>
                        <span class="item_price">$19.00</span>
                        <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="total_price text-uppercase">
                <span>Sub Total:</span>
                <span>$76.00</span>
            </div>
            <ul class="btns_group ul_li">
                <li><a href="cart.html" class="btn btn_primary text-uppercase">View Cart</a></li>
                <li><a href="checkout.html" class="btn btn_border border_black text-uppercase">Checkout</a></li>
            </ul>
        </div>
        <div class="cart_sidebar_overlay"></div>
    </div>
    <!-- cart_sidebar - end
                    ================================================== -->

    <!-- slider_section - start
                    ================================================== -->
    <section class="slider_section slider_dark" style="background-image: url(assets/images/backgrounds/bg_01.png);">
        <div class="main_slider pb-0 wow fadeInUp" data-wow-delay=".1s">
            <div class="slider_item text-white" style="background-image: url(assets/images/slider/img_01.png);">
                <div class="container">
                    <div class="row justify-content-lg-start justify-content-md-center">
                        <div class="col-lg-6 col-md-8">
                            <h3 class="title_text text-white text-uppercase" data-animation="fadeInUp" data-delay=".2s">
                                Kopi Mustika Bali
                            </h3>
                            <p data-animation="fadeInUp" data-delay=".4s">
                                Kopi robusta 100% asli tanpa bahan campuran
                            </p>
                            <ul class="btns_group ul_li" data-animation="fadeInUp" data-delay=".6s">
                                <li><a class="btn btn_primary text-uppercase" href="menu.html">Kopi Kami</a></li>
                                <li><a class="btn btn_border border_white text-uppercase" href="shop_details.html">Produk Kami
                                        </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shape_image">
                    <img src="assets/images/slider/shape_01.png" alt="image_not_found">
                </div>
            </div>

            <div class="slider_item text-white" style="background-image: url(assets/images/slider/img_01.png);">
                <div class="container">
                    <div class="row justify-content-lg-start justify-content-md-center">
                        <div class="col-lg-6 col-md-8">
                            <h3 class="title_text text-white text-uppercase" data-animation="fadeInUp" data-delay=".2s">
                                Suplayer kopi asli sepang Bali mustika
                            </h3>
                            <p data-animation="fadeInUp" data-delay=".4s">
                                kopi mantap di lambung jeg pasti jaen
                            </p>
                            <ul class="btns_group ul_li" data-animation="fadeInUp" data-delay=".6s">
                                <li><a class="btn btn_primary text-uppercase" href="menu.html">Kopi Kami</a></li>
                                <li><a class="btn btn_border border_white text-uppercase" href="shop_details.html">Produk Kami
                                        </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shape_image">
                    <img src="assets/images/slider/shape_01.png" alt="image_not_found">
                </div>
            </div>

            <div class="slider_item text-white" style="background-image: url(assets/images/slider/img_01.png);">
                <div class="container">
                    <div class="row justify-content-lg-start justify-content-md-center">
                        <div class="col-lg-6 col-md-8">
                            <h3 class="title_text text-white text-uppercase" data-animation="fadeInUp" data-delay=".2s">
                                Kopi Mustika Bali Robusta
                            </h3>
                            <p data-animation="fadeInUp" data-delay=".4s">
                                Minum kopi mustika jeg ilang kiap pe
                            </p>
                            <ul class="btns_group ul_li" data-animation="fadeInUp" data-delay=".6s">
                                <li><a class="btn btn_primary text-uppercase" href="menu.html">Kopi Kami</a></li>
                                <li><a class="btn btn_border border_white text-uppercase" href="shop_details.html">Produk kami
                                        </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shape_image">
                    <img src="assets/images/slider/shape_01.png" alt="image_not_found">
                </div>
            </div>

            <div class="slider_item text-white" style="background-image: url(assets/images/slider/img_01.png);">
                <div class="container">
                    <div class="row justify-content-lg-start justify-content-md-center">
                        <div class="col-lg-6 col-md-8">
                            <h3 class="title_text text-white text-uppercase" data-animation="fadeInUp" data-delay=".2s">
                                Kopi Bali Mustika
                            </h3>
                            <p data-animation="fadeInUp" data-delay=".4s">
                                kopi untuk kuat megadang pasti 24jam full megadang lembur
                            <ul class="btns_group ul_li" data-animation="fadeInUp" data-delay=".6s">
                                <li><a class="btn btn_primary text-uppercase" href="menu.html">kopi kami</a></li>
                                <li><a class="btn btn_border border_white text-uppercase" href="shop_details.html">Produk
                                        kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shape_image">
                    <img src="assets/images/slider/shape_01.png" alt="image_not_found">
                </div>
            </div>
        </div>
        <div class="carousel_nav">
            <button class="main_left_arrow" type="button"><i class="fal fa-arrow-up"></i></button>
            <button class="main_right_arrow" type="button"><i class="fal fa-arrow-down"></i></button>
        </div>
        <div class="slider_social_wrap">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 col-md-4 order-last">
                        <a class="popup_video video_btn1 text-uppercase wow fadeInRight"
                            href="http://www.youtube.com/watch?v=0O2aH4XLbto">
                            <span class="pulse"><i class="fas fa-play"></i></span>
                            <small>Play video</small>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <ul class="social_links social_text ul_li text-uppercase wow fadeInLeft">
                            <li><a href="https://www.facebook.com/"><i class=""></i>WhatsApp</a></li>
                            <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i>Instagram</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider_section - end
                    ================================================== -->

    <!-- about_section - start
                    ================================================== -->
    <section class="about_section sec_ptb_120">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 col-md-6 order-last">
                    <div class="about_image1 wow fadeInRight" data-wow-delay=".1s">
                        <img src="assets/images/about/img_01.png" alt="image_not_found">
                        <div class="year_content_wrap text-uppercase"
                            style="background-image: url(assets/images/about/bg_01.png);">
                            <div class="content_wrap">
                                <span> <small></small></span>
                                <strong></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_content">
                        <div class="section_title text-uppercase">
                            <h2 class="small_title"><i class="fas fa-coffee"></i>Kopi kami</h2>
                            <h3 class="big_title wow fadeInUp" data-wow-delay=".1s">
                                Biji Robusta pilihan
                            </h3>
                        </div>
                        <p class="wow fadeInUp" data-wow-delay=".2s">
                            deskripsi kopi olahan kopi kami .......
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque dolore officiis, odit cum molestias quos dolorem provident quisquam autem ad non beatae eaque vero modi incidunt, illo deserunt, aut ut?
                        </p>
                        <ul class="about_info ul_li_block">
                            <li class="wow fadeInUp" data-wow-delay=".3s">
                                <h4 class="text-uppercase"><i class="far fa-square-full"></i> KAMI MEMILIH LANGSUNG BIJI KOPI :</h4>
                                <p class="mb-0">
                                  Kopi sendiri dihasilkan dari biji pohon kopi yang telah melalui serangkaian proses pengolahan. Mulai dari pemetikan biji, penjemuran, peyangraian hingga penggilingan untuk menghasilkan cita rasa kopi yang nikmat.
                                </p>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay=".4s">
                                {{-- <h4 class="text-uppercase"><i class="far fa-square-full"></i> This is followed by the grinding</h4> --}}
                                <p class="mb-0">
                                    untuk saat ini kami hanya memasarkan produk kopi robusta saja kedepanya pengembangan produk yang lain akan menyusul selanjutnya "teruslah ikuti kami"
                                </p>
                            </li>
                        </ul>
                        {{-- <ul class="btns_group ul_li wow fadeInUp" data-wow-delay=".5s">
                    <li>
                      <a class="btn btn_primary text-uppercase" href="about.html">Learn more</a>
                    </li>
                    <li>
                      <div class="chip_item">
                        <div class="chip_thumbnail">
                          <img src="assets/images/meta/img_01.png" alt="image_not_found">
                        </div>
                        <div class="chip_content text-uppercase">
                          <h5 class="chip_name">rasalina De Willamson</h5>
                          <span class="chip_title">Founder & CO</span>
                        </div>
                      </div>
                    </li>
                  </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about_section - end
                    ================================================== -->

    <!-- shop_section - start
                    ================================================== -->
    <section class="shop_section sec_ptb_120 bg_gray">
        <div class="container">
            <div class="section_title text-uppercase">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i>
                            special produk shop</h2>
                        <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                            popular product
                        </h3>
                    </div>

                    <div class="col-lg-6 col-md-4">
                        <div class="abtn_wrap text-lg-end text-md-end wow fadeInUp" data-wow-delay=".3s">
                            <a class="btn btn_border border_black" href="{{ url('produk') }}">Product Selanjutnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @php
                    $products = App\Models\Produk::where('status', 'active')
                        ->orderBy('id', 'desc')
                        ->limit(6)
                        ->get();
                @endphp
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="shop_card wow fadeInUp" data-wow-delay=".1s">
                            <a class="item_image" href="{{ route('showproduk', $item->slug) }}">
                                <img src="{{ asset('storage/uploads/' . $item->gambar) }}" alt="image_not_found">
                            </a>
                            <div class="item_content">
                                <h3 class="item_title text-uppercase">
                                    <a href="{{ route('showproduk', $item->slug) }}">{{ $item->nama }}</a>
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
    </section>
    <!-- shop_section - end
                    ================================================== -->

    <!-- blog_section - start
                    ================================================== -->
    <section class="blog_section sec_ptb_120" style="background-image: url(assets/images/backgrounds/bg_03.png);">
        <div class="container">

            <div class="section_title text-uppercase text-center">
                <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i> Berita & Blog</h2>
                <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">Kopi Petani Desa Sepang</h3>
            </div>

            <div class="row justify-content-center">
                @php
                    $post = App\Models\Post::where('status', '1')
                        ->orderBy('id', 'desc')
                        ->limit(6)
                        ->get();
                @endphp

                @foreach ($post as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog_grid wow fadeInUp" data-wow-delay=".1s">
                            <a class="item_image" href="{{ route('showblog', $item->slug) }}">
                                <img src="{{ asset('storage/uploads/blog/' . $item->gambar) }}" alt="image_not_found">
                            </a>
                            <div class="item_content">
                                <h3 class="item_title text-uppercase">
                                    <a href="{{ route('showblog', $item->slug) }}">{{ $item->judul }}</a>
                                </h3>
                                <p>
                                    {!! substr($item->isi, 0, 80) !!}...
                                </p>
                                <a class="btn_text text-uppercase"
                                    href="{{ route('showblog', $item->slug) }}"><span>Selengkapnya</span> <i
                                        class="far fa-angle-double-right"></i></a>
                                <ul class="post_meta ul_li">
                                    <li><a href="#!"><i class="fal fa-user"></i> Admin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <div class="load_more text-center wow fadeInUp" data-wow-delay=".1s">
              <a class="btn btn_border border_black text-uppercase" href="#!">See all Blog</a>
            </div> --}}

        </div>
    </section>
    <!-- blog_section - end
                    ================================================== -->
@endsection
