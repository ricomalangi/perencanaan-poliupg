@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Sub Jenis Anggaran</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Sub Jenis Anggaran</li>
            </ol>
          </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.sub_anggaran.create')}}" class="btn btn-md btn-primary add-data"><i class="fas fa-plus"></i> Tambah Data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Anggaran</th>
                            <th>Nama Anggaran</th>
                            <th>Nama Sub Anggaran</th>
                            <th>Satuan Anggaran</th>
                            <th>Jenis Akun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($sub_anggaran as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nomor_anggaran}}</td>
                                <td>{{$item->nama_anggaran}}</td>
                                <td>{{$item->nama_sub_anggaran}}</td>
                                <td>{{$item->satuan_anggaran}}</td>
                                <td>{{$item->jenis_akun}}</td>
                                <td>
                                    <a href="{{ url('admin/sub-anggaran/lihat', $item->uuid_sub_anggaran) }}" class="btn btn-secondary btn-md">Lihat</a>
                                    <a href="{{ url('admin/sub-anggaran/edit', $item->uuid_sub_anggaran) }}" class="btn btn-warning btn-md">Edit</a>
                                    <button type="button" class="btn btn-danger btn-md btn-hapus" data-uuid="{{$item->uuid_sub_anggaran}}" >Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{$sub_anggaran->links('templates.components.pagination')}}
            </div>
          </div>
    </div>

    <!-- MODAL CONFIRMATION DELETE -->
    @method('POST')
    @csrf
    <form action="{{route('admin.sub_anggaran.delete')}}" method="POST">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input name="uuid" type="hidden" class="form-control" required>
                    <h4> Apa anda yakin untuk menghapus Sub Anggaran ini?</h4>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection
@push('addon-js')
    <script>

        $('.btn-hapus').on('click', function(e){
            $('#deleteModal').modal()
            let uuid = $(this).data('uuid')
            $('input[name="uuid"]').val(uuid)
        })

    </script>
@endpush

