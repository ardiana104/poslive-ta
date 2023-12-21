@section('css')
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/pages/page-profile.css') }}" />
@endsection

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> Profile</h4>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="{{asset('admin/img/pages/profile-banner.png')}}" alt="Banner image" class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{asset('storage/avatars/'.Auth::user()->avatar)}}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ Auth::user()->address->nama_depan }} {{ Auth::user()->address->nama_belakang }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-mail"></i> {{Auth::user()->email}}
                                    </li>
                                </ul>
                            </div>
                            <form>
                                @if($avatar)
                                <img src="{{$avatar->temporaryUrl()}}" class="img-fluid bg-white" alt="Preview Image">
                                @endif
                                <div class="input-group">
                                    <div class="custom-file">
                                        {{-- <label class="custom-file-label text-left" for="customFile">Update Foto</label> --}}
                                        <input wire:model="avatar" type="file" class="form-control" id="customFile" />
                                        @error('avatar')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    <button wire:click.prevent="updateAvatar()" class="btn btn-outline-primary waves-effect"> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            @if(isset($address))
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">Biodata</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user text-heading"></i><span class="fw-medium mx-2 text-heading">Nama Lengkap:</span> <span>{{$address->nama_depan}} {{$address->nama_belakang}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-map-pin-filled text-heading"></i><span
                                class="fw-medium mx-2 text-heading">Alamat:</span> <span>{{$address->alamat_1}},{{$address->alamat_2}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-map-pin-filled text-heading"></i><span
                                class="fw-medium mx-2 text-heading">Kecamatan:</span> <span>{{$address->kelurahan}}, {{$address->kecamatan}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-map-pin-filled text-heading"></i><span
                                class="fw-medium mx-2 text-heading">Provinsi:</span> <span>{{$address->provinsi}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-file-description text-heading"></i><span
                                class="fw-medium mx-2 text-heading">Kode Pos:</span> <span>{{$address->kode_pos}}</span>
                        </li>
                    </ul>
                    <small class="card-text text-uppercase">Kontak</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-phone-call"></i><span class="fw-medium mx-2 text-heading">Telepon:</span>
                            <span>{{$address->telepon}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-mail"></i><span class="fw-medium mx-2 text-heading">Email:</span>
                            <span>{{Auth::user()->email}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user"></i><span class="fw-medium mx-2 text-heading">Role:</span>
                            <span>{{Auth::user()->role}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <button class="btn btn-label-primary waves-effect w-100" data-bs-toggle="modal" data-bs-target="#createAddressForm"><i class="ti ti-circle-plus me-2" aria-hidden="true"></i> Tambah Alamat</button>
            @endif

            @if($updateMode)
            @include('livewire.address-update')
            @else
            @include('livewire.address-create')
            @endif
        </div>
    </div>
</div>
