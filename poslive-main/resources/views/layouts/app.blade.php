<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../../admin/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Kopi Mustika Bali</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/logo.png')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/pages/cards-advance.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/fullcalendar/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/quill/typography.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/quill/katex.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/quill/editor.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/pages/app-calendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/toastr/toastr.css')}}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/animate-css/animate.css')}}" />

    @yield('css')

    <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('admin/js/config.js') }}"></script>
</head>

<body>

    <div class="layout-wrapper layout-content-navbar" id="app">
        <div class="layout-container">

            @include('layouts.menu')

            <div class="layout-page">

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        {{-- <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0"
                                    href="javascript:void(0);">
                                    <i class="ti ti-search ti-md me-2"></i>
                                    <span class="d-none d-md-inline-block text-muted"> Cari (Ctrl+/)</span>
                                </a>
                            </div>
                        </div> --}}
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <i class="ti ti-md"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                            <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                            <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                            <span class="align-middle"><i
                                                    class="ti ti-device-desktop me-2"></i>System</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{asset('storage/avatars/'.Auth::user()->avatar)}}" alt
                                                class="rounded-circle" height="40" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{asset('storage/avatars/'.Auth::user()->avatar)}}"
                                                                alt class="rounded-circle" height="40" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ Auth::user()->address->nama_depan }} {{ Auth::user()->address->nama_belakang }}</span>
                                                    <small class="text-muted">
                                                        {{ Auth::user()->email }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">Biodata</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('cart') }}">
                                            <i class="ti ti-shopping-cart me-2 ti-sm"></i>
                                            <span class="align-middle">Keranjang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>

                <div class="content-wrapper">

                    @yield('content')
                    {{isset($slot) ? $slot : null}}
                    @yield('modal')

                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by <a href="{{url('/')}}" target="_blank"
                                        class="fw-medium">POS Livewire</a>
                                </div>
                            </div>
                        </div>
                    </footer>

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('admin/vendor/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/toastr/toastr.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/amcharts4/core.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/amcharts4/charts.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/amcharts4/animated.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/amcharts4/worldLow.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/amcharts4/maps.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/quill/katex.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/quill/quill.js')}}"></script>

    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/app-calendar-events.js') }}"></script>
    <script src="{{ asset('admin/js/app-calendar.js') }}"></script>
    <script src="{{ asset('admin/js/dropify.js') }}"></script>
    <script src="{{ asset('admin/js/forms-pickers.js') }}"></script>
    <script src="{{ asset('admin/js/forms-selects.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/forms-editors.js')}}"></script> --}}

    <script>
        function notifikasi(notif) {
          toastr[notif.type](notif.message, notif.title, {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
          });
        }
    </script>
    @yield('scripts')
    <script>
        @if (session('notif'))
          $(document).ready(function () {
            console.log({!! session('notif') !!});
            notifikasi({!! session('notif') !!});
          });
        @endif
    </script>

    @livewireScripts
</body>

</html>
