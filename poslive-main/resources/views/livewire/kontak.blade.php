@section('meta-title', 'Kontak')
@section('meta-description', 'Kopi Mustika Bali merupakan usaha rumahan yang baru berdiri dan
belum mempunyai legalitas hukum yang jelas dan mengikat.
Namun apabila nantinya tingkat penjualan produk ini semakin meningkat,
kopi mustika bali akan mengurus perizinan agar terdaftar jelas dan
dilindungi hukum yang mengikat dan jelas.')
@section('meta-gambar', ''.asset('assets/images/logo/logo.png').'')
@section('meta-url', ''.url('kontak').'')

<section class="breadcrumb_section text-uppercase"
    style="background-image: url({{ asset('assets/images/breadcrumb/breadcrumb_bg_01.jpg') }});">
    <div class="container">
        <h1 class="page_title text-white wow fadeInUp" data-wow-delay=".1s">Kontak Kami</h1>
        <ul class="breadcrumb_nav ul_li wow fadeInUp" data-wow-delay=".2s">
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li>Kontak Kami</li>
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

<section class="contact_section sec_ptb_120 bg_default_gray">
    <div class="container">
        <div class="contact_form bg_white wow fadeInUp" data-wow-delay=".1s">
            <div class="main_contact_info_wrap">
                <div class="contact_info_item">
                    <div class="item_icon"><i class="fal fa-envelope"></i></div>
                    <div class="item_content">
                        <h3 class="item_title text-uppercase">Alamat email</h3>
                        <p>kadekardiana201@gmail.com</p>
                        <p>kopimustikabali@gmail.com</p>
                    </div>
                </div>
                <div class="contact_info_item">
                    <div class="item_icon"><i class="fal fa-map-marker-alt"></i></div>
                    <div class="item_content">
                        <h3 class="item_title text-uppercase">Lokasi Kami</h3>
                        <p> Desa Sepang Kelod, Kec. Busung Biu, Kabupaten Buleleng, Provensi Bali</p>
                    </div>
                </div>
                <div class="contact_info_item">
                    <div class="item_icon"><i class="fal fa-phone"></i></div>
                    <div class="item_content">
                        <h3 class="item_title text-uppercase">Nomor telepon</h3>
                        <p>+62 87860133965</p>
                        <p>+62 83117951508</p>
                    </div>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form wire:submit="store">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form_item">
                            <input type="text" wire:model="nama" placeholder="Your name :">
                            @error('nama')
                                <span class="mt-1 ml-1 text-sm text-red-700">{{ $nama }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form_item">
                            <input type="email" wire:model="email" placeholder="Your Mail :">
                            @error('email')
                                <span class="mt-1 ml-1 text-sm text-red-700">{{ $email }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form_item">
                    <textarea wire:model="pesan" placeholder="Your Massage :"></textarea>
                    @error('pesan')
                        <span class="mt-1 ml-1 text-sm text-red-700">{{ $pesan }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn_primary text-uppercase">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="map_section">
    <div id="mapBox" class="wow fadeInUp" data-wow-delay=".1s" data-lat="114.90623648098527" data-lon="-8.323991788684607"
        data-zoom="12" data-info="MWF4+MF9, Unnamed Road, Sepang Kelod, Kec. Busung Biu, Kabupaten Buleleng, Bali 81154" data-mlat="114.90623648098527"
        data-mlon="-8.323991788684607">
    </div>
</div>
