<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('meta-title') | Kopi Mustika Bali</title>

    <meta name="description" content="@yield('meta-description')" itemprop="description" />
    <meta name="originalTitle" content="@yield('meta-title')" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="kopimustikabali" />
    <meta property="og:title" content="@yield('meta-title')" />
    <meta property="og:image" content="@yield('meta-gambar')" />
    <meta property="og:description" content="@yield('meta-description')" />
    <meta property="og:url" content="@yield('meta-url')" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="366" />

    <meta name="copyright" content="kopimustikabali" itemprop="dateline" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot-news" content="index, follow" />
    <meta name="googlebot" content="index, follow" />

    <meta name="idfokus" content=""  />
    <meta name="author" content="Kopi Mustika Bali"  />
    <meta content="@yield('meta-title')" itemprop="headline" />
    <meta name="keywords" content="@yield('meta-title')" itemprop="keywords" />
    <meta name="thumbnailUrl" content="@yield('meta-gambar')" itemprop="thumbnailUrl" />
    <meta content="@yield('meta-url')" itemprop="url" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@kopimustikabali" />
    <meta name="twitter:site:id" content="@kopimustikabali" />
    <meta name="twitter:creator" content="@kopimustikabali" />
    <meta name="twitter:description" content="@yield('meta-description')" />
    <meta name="twitter:image" content="@yield('meta-gambar')" />

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- service worker javascript -->
    <script>
        // Check that service workers are supported
        if ('serviceWorker' in navigator) {
            // Use the window load event to keep the page load performant
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('serviceworker.js');
            });
        }
    </script>
    <div class="body_wrap">

        <!-- backtotop - start -->
        {{-- <div class="backtotop">
        <a href="#" class="scroll">
          <i class="far fa-arrow-up"></i>
          <i class="far fa-arrow-up"></i>
        </a>
      </div> --}}

        {{-- <a href="https://wa.me/6281228430523?text=Hi%20Qiscus" class="floating" target="_blank">
            <i class="fab fa-whatsapp fab-icon"></i>
        </a> --}}
        <!-- backtotop - end -->

        <!-- preloader - start -->
        <div id="preloader"></div>
        <!-- preloader - end -->

        <!-- header_section - start
      ================================================== -->
        <header class="header_section">
            <div class="content_wrap">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-2 col-md-6 col-6">
                            <div class="brand_logo">
                                <a class="brand_link" href="{{ url('/') }}">
                                    <img src="{{ asset('assets/images/logo/logo.png') }}"
                                        srcset="{{ asset('assets/images/logo/logo.png') }}"
                                        alt="logo_not_found">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-10 col-md-6 col-6">
                            <nav class="main_menu navbar navbar-expand-lg">
                                <button class="mobile_menu_btn navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#main_menu_dropdown" aria-controls="main_menu_dropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="fal fa-bars"></i></span>
                                </button>
                                <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                                    <ul class="main_menu_list ul_li">
                                        <li>
                                            <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ url('coffee') }}">Kopi</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ url('produk') }}">Produk</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ url('tentangkami') }}">Tentang Kami</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ url('kontak') }}">Kontak</a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="header_btns_group ul_li_right">
                                    @if (Route::has('login'))
                                        @auth
                                            <li>
                                                <a class="btn btn_primary text-uppercase"
                                                    href="{{ route('home') }}">Dashboard</a>
                                            </li>
                                        @else
                                            <li>
                                                <a class="btn btn_primary text-uppercase"
                                                    href="{{ route('login') }}">Login</a>
                                            </li>
                                        @endauth
                                    @endif
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

            <!-- collapse search - start -->
            <div class="main_search_collapse collapse" id="main_search_collapse">
                <div class="main_search_form card">
                    <div class="container maxw_1560">
                        <form action="#">
                            <div class="form_item">
                                <input type="search" name="search" placeholder="Search here...">
                                <button type="submit" class="submit_btn"><i class="fal fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- collapse search - end -->
        </header>
        <!-- header_section - end
      ================================================== -->
        <!-- main body - start
      ================================================== -->
        <main>
            @yield('content')
            {{ isset($slot) ? $slot : null }}
        </main>
        <!-- main body - end
      ================================================== -->

        <!-- footer_section - start
      ================================================== -->
        <footer class="footer_section text-white deco_wrap"
            style="background-image: url({{ asset('assets/images/backgrounds/bg_05.png') }});">
            <div class="overlay"></div>
            <div class="footer_widget_area">
                <div class="container">

                    <div class="row justify-content-lg-between">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="footer_widget footer_about wow fadeInUp" data-wow-delay=".1s">
                                <div class="brand_logo">
                                    <a class="brand_link" href="{{ url('/') }}">
                                        <img src="{{ asset('assets/images/logo/logo.png') }}"
                                            srcset="{{ asset('assets/images/logo/logo.png') }}"
                                            alt="logo_not_found">
                                    </a>
                                </div>
                                <p>
                                    Kopi Mustika Bali merupakan usaha rumahan yang baru berdiri dan
                                    belum mempunyai legalitas hukum yang jelas dan mengikat.
                                    Namun apabila nantinya tingkat penjualan produk ini semakin meningkat,
                                    kopi mustika bali akan mengurus perizinan agar terdaftar jelas dan
                                    dilindungi hukum yang mengikat dan jelas.
                                </p>

                                {{-- <ul class="social_links social_icons ul_li">
                    <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#!"><i class="fab fa-behance"></i></a></li>
                  </ul> --}}
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="footer_widget footer_contact wow fadeInUp" data-wow-delay=".2s">
                                <h3 class="footer_widget_title text-uppercase">HUBUNGI KAMI</h3>
                                <ul class="ul_li_block">
                                    <li><strong class="text-uppercase">Alamat : </strong> Sepang Kelod, Kec. Busung
                                        Biu, Kabupaten Buleleng, Bali 81154</li>
                                    <li><strong class="text-uppercase">GMail : </strong> kadekardiana201@gmail.com</li>
                                    <li><strong class="text-uppercase">Telepon : </strong> +62 8311 7951 508</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="footer_widget footer_opening_time wow fadeInUp" data-wow-delay=".3s">
                                <h3 class="footer_widget_title text-uppercase">Jam buka</h3>
                                <ul class="ul_li_block">
                                    <li>
                                        Minggu
                                        <span>07:30 - 21:00</span>
                                    </li>
                                    <li>
                                        Senin
                                        <span>07:30 - 21:00</span>
                                    </li>
                                    <li>
                                        Selasa
                                        <span>07:30 - 21:00</span>
                                    </li>
                                    <li>
                                        Rabu
                                        <span>07:30 - 21:00</span>
                                    </li>
                                    <li>
                                        Kamis
                                        <span>07:30 - 21:00</span>
                                    </li>
                                    <li>
                                        Jumat
                                        <span>07:30 - 21:00</span>
                                    </li>
                                    <li>
                                        Sabtu
                                        <span>07:30 - 21:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="footer_widget footer_recent_post wow fadeInUp" data-wow-delay=".4s">
                                <h3 class="footer_widget_title text-uppercase">Produk</h3>
                                @php
                                    $recent = App\Models\Produk::where('status', 'active')
                                        ->orderBy('id', 'desc')
                                        ->limit(2)
                                        ->get();
                                @endphp
                                @foreach ($recent as $item)
                                    <div class="recent_post">
                                        <a class="item_image" href="{{route('showproduk', $item->slug)}}">
                                            <img src="{{ asset('storage/uploads/' . $item->gambar) }}" alt="image_not_found">
                                        </a>
                                        <div class="item_content">
                                            <h4 class="item_title">
                                                <a href="{{route('showproduk', $item->slug)}}">{{ $item->nama }}</a>
                                            </h4>
                                            <span class="post_date text-uppercase">{{ idr($item->harga) }}</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="footer_bottom text-center">
                    <p class="copyright_text mb-0 wow fadeInUp" data-wow-delay=".2s">Copyright@ 2023 Desing by <a
                            class="btn_text" href="#"><span>Kopi Mustika Bali</span></a></p>
                </div>
            </div>
        </footer>

    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/mCustomScrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
