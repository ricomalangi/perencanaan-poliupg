@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Jenis Anggaran</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Jenis Anggaran</li>
            </ol>
          </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.jenis_anggaran.create')}}" class="btn btn-md btn-primary add-data"><i class="fas fa-plus"></i> Tambah Data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Anggaran</th>
                            <th>Nama Anggaran</th>
                            <th>Kode Anggaran</th>
                            <th>Sumber Anggaran</th>
                            <th>Jenis Akun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jenis_anggaran as $item)
                            <tr class="tahun-anggaran-row">
                                <td>{{$no++}}</td>
                                <td>{{$item->nomor_anggaran}}</td>
                                <td>{{$item->nama_anggaran}}</td>
                                <td>{{$item->kode_anggaran}}</td>
                                <td>{{$item->sumber_anggaran}}</td>
                                <td>{{$item->jenis_akun}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-md btn-edit" data-uuid="{{$item->uuid}}" data-na="{{$item->nomor_anggaran}}" data-nma="{{$item->nama_anggaran}}" data-kda="{{$item->kode_anggaran}}" data-sba="{{$item->sumber_anggaran}}" data-ja="{{$item->jenis_akun}}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-md btn-hapus" data-uuid="{{$item->uuid}}" >Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{$jenis_anggaran->links('templates.components.pagination')}}
            </div>
          </div>
    </div>

    <form action="{{route('admin.jenis_anggaran.update')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal fade" id="Editmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Anggaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="uuid" type="hidden" class="form-control" required>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-3">Nomor Anggaran</label>
                                    <div class="col-6">
                                        <input name="nomor_anggaran" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-3">Nama Anggaran</label>
                                    <div class="col-6">
                                        <input name="nama_anggaran" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="" class="col-3">Kode Anggaran</label>
                                    <div class="col-6">
                                        <input name="kode_anggaran" type="text" class="form-control" required>
                                    </div>
                                </div>
                      
                            </div>

                            <div class="col-md-6">
                   
                                <div class="form-group row">
                                    <label for="" class="col-3">Sumber Anggaran</label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="sumber_anggaran" required>
                                    </div>
                                </div>


                                <div class="form-group row ">
                                    <label for="" class="col-3">Jenis Akun</label>
                                    <div class="col-6">
                                        <select name="jenis_akun" class="form-control" required>
                                            <option value="" hidden>--pilih jenis akun--</option>
                                            <option value="blu" >BLU</option>
                                            <option value="boptn" >BOPTN</option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- MODAL CONFIRMATION DELETE -->
    <form action="{{route('admin.jenis_anggaran.delete')}}" method="POST">
        @method('POST')
        @csrf
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
                        <h4> Apa anda yakin untuk menghapus Jenis Anggaran ini?</h4>
                        
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
        $('.btn-edit').on('click', function(e){
            $('#Editmodal').modal()
            let uuid = $(this).data('uuid')
            let na = $(this).data('na')
            let nma = $(this).data('nma')
            let kda = $(this).data('kda')
            let sba = $(this).data('sba')
            let ja = $(this).data('ja')

            $('input[name="uuid"]').val(uuid)
            $('input[name="nomor_anggaran"]').val(na)
            $('input[name="nama_anggaran"]').val(nma)
            $('input[name="kode_anggaran"]').val(kda)
            $('input[name="sumber_anggaran"]').val(sba)
            $('select[name="jenis_akun"]').val(ja)
        })
        $('.btn-hapus').on('click', function(e){
            $('#deleteModal').modal()
            let uuid = $(this).data('uuid')
            $('input[name="uuid"]').val(uuid)
        })

    </script>
@endpush

