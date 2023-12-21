@if (Route::has('login'))
@auth
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
          <a href="{{route('home')}}" class="app-brand-link">
              <img src="{{asset('assets/images/logo.png')}}" alt="" width="40">
              <span class="app-brand-text demo menu-text fw-bold">Kopi Mustika Bali</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
          </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
          <li class="menu-item {{ request()->is('home*') ? 'active' : '' }}">
              <a href="{{route('home')}}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-smart-home"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
              </a>
          </li>

          @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
            <li class="menu-item {{request()->is('categories*') || request()->is('atributs*') || request()->is('ordermethods*') ? 'active open' : ''}}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Master Data">Master Data</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{request()->is('categories*') ? 'active' : ''}}">
                  <a href="{{route('categories')}}" class="menu-link">
                    <div data-i18n="Kategori">Kategori</div>
                  </a>
                </li>
                <li class="menu-item {{request()->is('ordermethods*') ? 'active' : ''}}">
                  <a href="{{route('ordermethods')}}" class="menu-link">
                    <div data-i18n="Metode Order">Metode Order</div>
                  </a>
                </li>
                <li class="menu-item {{request()->is('atributs*') ? 'active' : ''}}">
                  <a href="{{route('atributs')}}" class="menu-link">
                    <div data-i18n="Atribut">Atribut</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item {{ request()->is('cart*') ? 'active' : '' }}">
              <a href="{{route('cart')}}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-devices-2"></i>
                  <div data-i18n="Kasir">Kasir</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('products*') ? 'active' : '' }}">
              <a href="{{ route('products') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                  <div data-i18n="Produk">Produk</div>
              </a>
            </li>
            
            <li class="menu-item {{ request()->is('reports*') ? 'active' : '' }}">
              <a href="{{ route('reports') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-file-description"></i>
                  <div data-i18n="Laporan Transaksi">Laporan Transaksi</div>
              </a>
            </li>

            <li class="menu-item {{ request()->is('post*') ? 'active' : '' }}">
              <a href="{{ route('post') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-article"></i>
                  <div data-i18n="Blog">Blog</div>
              </a>
            </li>
          @endif
      </ul>
  </aside>
@endauth
@endif