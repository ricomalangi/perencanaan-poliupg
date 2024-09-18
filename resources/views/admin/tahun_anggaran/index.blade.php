@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="pagetitle">
        <h1>Tahun Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Tahun Anggaran</li>
            </ol>
        </nav>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-body">
            <!-- <h5 class="card-title">Default Table</h5> -->
            <a href="{{route('admin.tahun_anggaran.create')}}" class="mt-4 btn btn-md btn-primary add-data"><i class="fas fa-plus"></i> Tambah Data</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tahun Anggaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($tahun_anggaran as $item)
                    <tr class="tahun-anggaran-row">
                        <td scope="row">{{$no++}}</td>
                        <td>{{$item->nama_tahun_anggaran}}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-md btn-edit" data-uuid="{{$item->uuid}}" data-tahun="{{$item->nama_tahun_anggaran}}">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$tahun_anggaran->links('templates.components.pagination')}}
        </div>
    </div>


    <form action="{{route('admin.tahun_anggaran.update')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tahun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="uuid">
                        <label class="form-label">Tahun</label>
                        <select name="tahun" class="form-control" required>
                            <option value="" hidden>--pilih tahun--</option>
                            @for ($i = 2019; $i < date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
@push('addon-js')
<script>
    $('.btn-edit').on('click', function(e) {
        $('.modal').modal()
        let uuid = $(this).data('uuid')
        let tahun = $(this).data('tahun')
        $('input[name="uuid"]').val(uuid)
        $('select[name="tahun"]').val(tahun)
    })
</script>
@endpush