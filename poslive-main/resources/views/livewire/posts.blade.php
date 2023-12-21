@section('title', 'Blog')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between mb-2">
        <h5><span class="text-muted fw-light">Blog</span></h5>
        <div>
            <button type="button" class="btn btn-primary" data-bs-target="#createPostForm" data-bs-toggle="modal">
                <span class="ti-xs ti ti-plus me-1"></span>
                Tambah Blog
            </button>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header flex-column flex-md-row">
                    <div class="dt-action-buttons text-center pt-3 pt-md-0">
                        <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $value)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/uploads/blog/' . $value->gambar) }}" alt=""
                                        class="rounded-2" width="100">
                                </td>
                                <td>{{ $value->judul }}</td>
                                <td>{!! substr($value->isi, 0, 50) !!}...</td>
                                <td class="text-center">
                                    <button type="button" wire:click="edit({{ $value->id }})"
                                        class="btn btn-label-primary waves-effect btn-sm"
                                        data-bs-target="#updatePostForm" data-bs-toggle="modal">
                                        <span class="ti-xs ti ti-edit me-1"></span>
                                        Ubah
                                    </button>
                                    <button type="button" wire:click="delete({{ $value->id }})"
                                        class="btn btn-label-danger waves-effect btn-sm">
                                        <span class="ti-xs ti ti-trash me-1"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        @if ($updateMode)
                            @include('livewire.post-update')
                        @else
                            @include('livewire.post-create')
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewUpdatePost').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#updatePostInput2").change(function() {
            readURL(this);
        });
    </script>
@endpush
