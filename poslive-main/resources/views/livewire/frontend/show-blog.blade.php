@section('meta-title', ''.$post->judul.'')
@section('meta-description', ''.$post->isi.'')
@section('meta-gambar', ''.asset('storage/uploads/blog/'.$post->gambar).'')
@section('meta-url', ''.route('showblog', $post->slug).'')

<section class="breadcrumb_section text-uppercase" style="background-image: url({{asset('assets/images/breadcrumb/breadcrumb_bg_01.jpg')}});">
    <div class="container">
      <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">{{$post->judul}}</h1>
      <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
        <li><a href="{{url('/')}}"><i class="fas fa-home"></i> Beranda</a></li>
        <li>{{$post->judul}}</li>
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

  <section class="details_section blog_details sec_ptb_120 bg_default_gray">
    <div class="container">
      <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-lg-8 col-md-8">
          <div class="details_content mb-0">
            <div class="details_image wow fadeInUp" data-wow-delay=".1s">
              <img src="{{asset('storage/uploads/blog/'.$post->gambar)}}" alt="image_not_found">
            </div>
            <div class="wrap_space">
              <ul class="post_meta ul_li wow fadeInUp" data-wow-delay=".1s">
                <li><a href="#!"><i class="fal fa-user"></i> Admin</a></li>
                <li><a href="#komentar"><i class="fal fa-comment-alt"></i> {{$totalkomentar}} Komentar</a></li>
                <li><i class="fal fa-calendar-alt"></i> {{tanggal($post->created_at)}}</li>
              </ul>
              <h2 class="details_title text-uppercase wow fadeInUp" data-wow-delay=".1s">{{$post->judul}}</h2>
              <p class="wow fadeInUp" data-wow-delay=".1s">
                {!! $post->isi !!}
              </p>
            </div>

            <hr class="m-0 wow fadeInUp" data-wow-delay=".1s">
            <div class="wrap_space" id="komentar">
              <div class="comment_area">
                <h3 class="area_title text-uppercase wow fadeInUp" data-wow-delay=".1s">{{$totalkomentar}} - Komentar</h3>
                <ul class="comment_list ul_li_block">
                  @foreach ($com as $item)
                    <li class="comment_item wow fadeInUp" data-wow-delay=".2s">
                      <div class="comment_thumbnail">
                        <img src="https://placehold.co/60x60" alt="image_not_found">
                      </div>
                      <div class="comment_content">
                        <h4 class="comment_name">{{$item->nama}}</h4>
                        <span class="comment_date">{{tanggal($item->created_at)}}</span>
                        <p class="mb-0">
                          {{$item->body}}
                        </p>
                        {{-- <a class="reply_btn" href="#"><i class="fas fa-reply"></i> Reply</a> --}}
                      </div>
                      {{-- <ul class="comment_list ul_li_block">
                        <li class="comment_item wow fadeInUp" data-wow-delay=".3s">
                          <div class="comment_thumbnail">
                            <img src="https://placehold.co/60x60" alt="image_not_found">
                          </div>
                          <div class="comment_content">
                            <h4 class="comment_name">Hilexxa Dentina Ross</h4>
                            <span class="comment_date">December 7/2020</span>
                            <p class="mb-0">
                              Rorem ipsum dolor sit amet, consectetur adipisicing elit, sedeiusmod tempor incididunt labore dolomagna aliqua. Ut enim adye.
                            </p>
                            <a class="reply_btn" href="#"><i class="fas fa-reply"></i> Reply</a>
                          </div>
                        </li>
                      </ul> --}}
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <hr class="m-0 wow fadeInUp">
            <div class="comment_form wow fadeInUp" data-wow-delay=".1s">
              <div class="wrap_space">
                <h3 class="area_title text-uppercase">Tinggalkan Komentar</h3>
                <form>
                  <div class="row">
                    <input type="hidden" wire:model="idpost">
                    <div class="col-lg-6">
                      <div class="form_item">
                        <input type="text" wire:model="nama" placeholder="Nama:">
                        @error('nama')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_item">
                        <input type="email" wire:model="email" placeholder="Email:">
                        @error('email')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form_item">
                    <textarea wire:model="body" placeholder="Tulis Komentar :"></textarea>
                    @error('body')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="text-center">
                    <button wire:click="store" class="btn btn_primary text-uppercase">Kirim Komentar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-8">
          <aside class="sidebar_section">
            {{-- <div class="sb_widget sb_search wow fadeInUp" data-wow-delay=".1s">
              <h3 class="sb_widget_title text-uppercase">Pencarian</h3>
              <form action="#">
                <div class="form_item mb-0">
                  <input id="sb_search_input" type="search" name="search" placeholder="Search">
                  <label class="form_icon" for="sb_search_input"><i class="far fa-search"></i></label>
                </div>
              </form>
            </div> --}}

            <div class="sb_widget sb_category wow fadeInUp" data-wow-delay=".1s">
              <h3 class="sb_widget_title text-uppercase">Kategori</h3>
              <ul class="ul_li_block">
                @foreach ($kategori as $item)
                  <li>
                    <a href="#!">
                      <span><i class="fal fa-angle-double-right"></i> {{$item->nama}}</span>
                      <span>{{count($kategori->where('id', $post->idkategori))}}</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>

            <div class="sb_widget sb_popular_post wow fadeInUp" data-wow-delay=".1s">
              <h3 class="sb_widget_title text-uppercase">Blog Terkini</h3>

              @foreach ($data as $d)
                <div class="recent_post">
                  <a class="item_image" href="{{route('showblog', $d->slug)}}">
                    <img src="{{asset('storage/uploads/blog/'.$d->gambar)}}" alt="image_not_found" style="width: 90px; height: 95px;">
                  </a>
                  <div class="item_content">
                    <h4 class="item_title">
                      <a href="{{route('showblog', $d->slug)}}">{{$d->judul}}</a>
                    </h4>
                    <span class="post_date text-uppercase">{{tanggal($post->created_at)}}</span>
                  </div>
                </div>
              @endforeach

            </div>

          </aside>
        </div>

      </div>
    </div>
  </section>