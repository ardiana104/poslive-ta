@section('meta-title', 'Kopi')
@section('meta-description', 'Kopi Mustika Bali merupakan usaha rumahan yang baru berdiri dan
belum mempunyai legalitas hukum yang jelas dan mengikat.
Namun apabila nantinya tingkat penjualan produk ini semakin meningkat,
kopi mustika bali akan mengurus perizinan agar terdaftar jelas dan
dilindungi hukum yang mengikat dan jelas.')
@section('meta-gambar', ''.asset('assets/images/logo/logo.png').'')
@section('meta-url', ''.url('coffee').'')

<section class="breadcrumb_section text-uppercase" style="background-image: url({{asset('assets/images/breadcrumb/breadcrumb_bg_01.jpg')}});">
    <div class="container">
      <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">BIJI KOPI KAMI</h1>
      <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Beranda</a></li>
        <li>Kopi kami</li>
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
              <h2 class="small_title wow fadeInUp" data-wow-delay=".1s"><i class="fas fa-coffee"></i>
                Kopi kami</h2>
              <h3 class="big_title wow fadeInUp" data-wow-delay=".2s">
                <u>Petani Kopi Robusta Sepang Kelod</u>
              </h3>
            </div>
            <p class="wow fadeInUp" data-wow-delay=".3s">
               Di desa Sepang Kelod sendiri sebagian besar penduduknya mata pencarianya sebagaian besar sebagai petani
               kopi robusta dikarenakan kopi robusta sendiri mudah pemeliharaanya dengan arabika,
               Untuk kopi arabika mempunyai harga yang lebih mahal dibanding kopi robusta.
               Hal ini dikarenakan perawatan kopi arabika lebih rumit karena tanaman ini hanya bisa tumbuh di lingkungan yang sejuk, 
               namun akan mati jika cuaca terlalu dingin
            </p>
            <ul class="about_info ul_li_block">
              <li class="wow fadeInUp" data-wow-delay=".4s">
                <h4 class="text-uppercase">Kami menggunakan varian kopi robusta </h4>
                <p class="mb-0">
                  kopi robusta kerap diolah menjadi kopi instan. Kemudian secara fisik, 
                  kopi arabika berbentuk lebih pipih dan lonjong dibanding biji kopi robusta.
                  Kopi robusta yang belum digiling sendiri bentuknya agak bundar dan ukurannya lebih kecil dibanding arabika. 
                  Dimana soal rasa, kopi arabika dianggap lebih unggul dibanding kopi robusta karena memiliki rasa yang lebih ringan dibanding kopi robusta. 
                  Salah satu penyebab perbedaan arabika dan robusta 
                  dari segi rasa ini dipengaruhi oleh kandungan kafein pada biji kopinya. 
                </p>
              </li>
              <li class="wow fadeInUp" data-wow-delay=".5s">
                {{-- <h4 class="text-uppercase">This is followed by the grinding</h4> --}}
                <p class="mb-0">
                  Kopi robusta mengandung 2,7 persen kafein, sedangkan kopi arabika hanya memiliki 1,5 persen kafein, 
                  sehingga rasa kopi robusta akan lebih pahit.
                  Namun kopi arabika ini sangat tidak baik untuk kesehatan tubuh apabila dikonsumsi secara terus menerus,
                  karena kopi arabika ini mengandung 60 persen lebih banyak lipid dan hampir dua kali lebih banyak gula alami 
                  dibanding robusta yang membuat rasa kopi arabika lebih manis.
                </p>
              </li>
            </ul>
            {{-- <ul class="btns_group ul_li wow fadeInUp" data-wow-delay=".6s">
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

      <div class="our_history_area">
        <div class="row align-items-center">
          <div class="col-lg-2 col-md-2">
            <div class="item_icon wow fadeInUp" data-wow-delay=".1s">
              <img src="assets/images/feature/icon_01.png" alt="icon_not_found">
              <span class="bg_shape"></span>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 order-first wow fadeInUp" data-wow-delay=".2s">
            <h3 class="item_title text-uppercase">KUALITAS</h3>
          </div>
          <div class="col-lg-5 col-md-5">
            <p class="wow fadeInUp" data-wow-delay=".3s">
                Kami memahami bahwa kualitas aroma dan rasa dari biji kopi adalah keutamaan.
                Kami di Coffee mustika bali menyadari hal ini, 
                oleh karena itu kami memastikan bahwa setiap proses perjalanan biji kopi, 
                mulai dari pemetikan sampai penyeduhan memegang peranan penting dalam mentukan kualitas satu cangkir kopi kamu.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
