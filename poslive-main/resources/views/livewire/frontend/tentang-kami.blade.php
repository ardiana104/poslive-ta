@section('meta-title', 'Tentang Kami')
@section('meta-description', 'Kopi Mustika Bali merupakan usaha rumahan yang baru berdiri dan
belum mempunyai legalitas hukum yang jelas dan mengikat.
Namun apabila nantinya tingkat penjualan produk ini semakin meningkat,
kopi mustika bali akan mengurus perizinan agar terdaftar jelas dan
dilindungi hukum yang mengikat dan jelas.')
@section('meta-gambar', ''.asset('assets/images/logo/logo.png').'')
@section('meta-url', ''.url('tentangkami').'')

<section class="breadcrumb_section text-uppercase"
    style="background-image: url({{ asset('assets/images/breadcrumb/breadcrumb_bg_01.jpg') }});">
    <div class="container">
        <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">Tentang Kami</h1>
        <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li>Tentang Kami</li>
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

<section class="about_section sec_ptb_120">
    <div class="container">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 col-md-6 order-last">
                <div class="about_image2 wow fadeInUp" data-wow-delay=".1s">
                    <img src="assets/images/about/img_02.png" alt="image_not_found">
                    <div class="year_content_wrap text-uppercase">
                        <span></span>
                        <strong></strong>
                    </div>
                    <div class="leaf_image">
                        <img src="assets/images/decorations/leaf_02.png" alt="image_not_found">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5">
                <div class="about_content">
                    <div class="section_title text-uppercase">
                        <h2 class="small_title wow fadeInUp" data-wow-delay=".1s">
                          <i class="fas fa-coffee"></i>TENTANG KAMI</h2>
                        <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                            <p>Kopi Mustika</p>
                        </h3>
                    </div>
                    <p class="wow fadeInUp" data-wow-delay=".3s">
                        sejarah lengkap ..... Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Suscipit repellat in dolorum sunt ratione ipsa numquam vel laudantium illum!
                        Voluptate temporibus nam itaque tempora totam quae reprehenderit maiores qui architecto?
                    </p>
                    <ul class="about_info ul_li_block">
                        <li class="wow fadeInUp" data-wow-delay=".4s">
                            <h4 class="text-uppercase">Proses pembuatan Singkat</h4>
                            <p class="mb-0">
                              Produk yang ditawarkan adalah produk olahan dari kopi robusta murni, 
                              dimana proses pengolahannya dilakukan tanpa adanya campuran dari bahan lainnya.
                              Kelebihan dari produk kopi ini yaitu cita rasanya yang berbeda dengan kopi pada umumnya, 
                              karena kopi ini diproduksi dari kopi murni dan tanpa adanya campuran bahan lainnya,
                              sehingga kopi ini mempunya cita rasa yang khas. 
                            </p>
                        </li>
                        {{-- <li class="wow fadeInUp" data-wow-delay=".5s">
                            <h4 class="text-uppercase">This is followed by the grinding</h4>
                            <p class="mb-0">
                                The coffee is brewed by first roasting the green coffee beans over hot coals in a
                                brazier. Once the beans are roasted each participant is given an opportunity to sample
                                the aromatic smoke by wafting it towards them.
                            </p>
                        </li> --}}
                    </ul>
                    <ul class="btns_group ul_li wow fadeInUp" data-wow-delay=".6s">
                        <li>
                            <a class="btn btn_primary text-uppercase" href="about.html">Selengkapnya</a>
                        </li>
                        <li>
                            <div class="chip_item">
                                <div class="chip_thumbnail">
                                    <img src="assets/images/meta/img_01.png" alt="image_not_found">
                                </div>
                                <div class="chip_content text-uppercase">
                                    <h5 class="chip_name">Pande Made Mustika</h5>
                                    <span class="chip_title">Pemilik Usaha</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="our_history_area">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2">
                    <div class="item_icon wow fadeInUp" data-wow-delay=".1s">
                        <img src="assets/images/feature/icon_01.png" alt="icon_not_found">
                        <span class="bg_shape"></span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 order-first wow fadeInUp" data-wow-delay=".2s">
                    <h3 class="item_title text-uppercase">Sejarah Kopi Mustika</h3>
                </div>
                <div class="col-lg-5 col-md-5">
                    <p class="wow fadeInUp" data-wow-delay=".3s">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam animi nesciunt eum laudantium magnam nemo nihil, asperiores
                    similique quae aut voluptatum debitis voluptatem eligendi itaque vitae impedit recusandae! Fuga, quas?
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature_primary wow fadeInUp" data-wow-delay=".1s">
                    <div class="item_icon">
                        <span class="item_serial">1</span>
                        <img src="assets/images/feature/icon_01.png" alt="icon_not_found">
                    </div>
                    <h3 class="item_title text-uppercase">aroma luar biasa</h3>
                    <p class="mb-0">
                      kopi mustika bali dibuat dengan 100% robusta asli
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature_primary wow fadeInUp" data-wow-delay=".2s">
                    <div class="item_icon">
                        <span class="item_serial">2</span>
                        <img src="assets/images/feature/icon_02.png" alt="icon_not_found">
                    </div>
                    <h3 class="item_title text-uppercase">Ciri Khas Tersendiri</h3>
                    <p class="mb-0">
                        Kopi mustika bali memiliki ciri khas dari daerah pegunungan
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature_primary wow fadeInUp" data-wow-delay=".3s">
                    <div class="item_icon">
                        <span class="item_serial">3</span>
                        <img src="assets/images/feature/icon_03.png" alt="icon_not_found">
                    </div>
                    <h3 class="item_title text-uppercase">Biji Pilihan</h3>
                    <p class="mb-0">
                        Biji kopi yang di dapat langsung dari petani kopi robusta 
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature_primary wow fadeInUp" data-wow-delay=".4s">
                    <div class="item_icon">
                        <span class="item_serial">4</span>
                        <img src="assets/images/feature/icon_04.png" alt="icon_not_found">
                    </div>
                    <h3 class="item_title text-uppercase">Kemasan</h3>
                    <p class="mb-0">
                        Kopi mustika bali dikemas dengan disain yang sederhana 
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
