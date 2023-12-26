@extends('../templates/main')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Bidang Anggaran</h4>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Bidang Anggaran</li>
          </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
              <a href="{{ route('admin.bidang_anggaran.create') }}" class="btn btn-md btn-primary"><i class="fas fa-plus"></i> Tambah Bidang Anggaran</a>
              <table class="table mt-3">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Bidang</th>
                          <th>Tahun Anggaran</th>
                          <th>Jumlah Alokasi</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                   @foreach ($bidang_anggaran as $index => $item)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_bidang }}</td>
                        <td>{{ $item->nama_tahun_anggaran }}</td>
                        <td>{{ $item->jumlah_alokasi }}</td>
                        <td>
                          <div class="row">
                            <div class="col col-12 col-sm-6 col-md-auto mb-2 mb-sm-0">
                              <button type="button" class="btn btn-warning btn-md btn-edit" data-uuid="{{ $item->uuid }}" data-uuid-bidang="{{ $item->uuid_bidang}}" data-uuid-tahun-anggaran="{{ $item->uuid_tahun_anggaran }}" data-jumlah-alokasi="{{ $item->jumlah_alokasi }}">Edit</button>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-auto">
                              <button type="button" class="btn btn-danger btn-md btn-delete" data-uuid="{{ $item->uuid }}" data-nama-bidang="{{ $item->nama_bidang  }}" data-nama-tahun-anggaran="{{ $item->nama_tahun_anggaran }}" data-jumlah-alokasi="{{ $item->jumlah_alokasi}}">Hapus</button>
                            </div>
                          </div>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
              </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            {{$bidang_anggaran->links('templates.components.pagination')}}
          </div>
        </div>
        <form action="{{ route('admin.bidang_anggaran.delete') }}" method="POST">
          @method('DELETE')
          @csrf
          <div class="modal fade" id="modal-delete-bidang-anggaran" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Bidang</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" name="uuid" required>
                          <h5>Apakah kamu yakin ingin menghapus bidang ini ?</h5>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger btn-save">Yes</button>
                      </div>
                  </div>
              </div>
          </div>
        </form>
        <form action="{{ route('admin.bidang_anggaran.update') }}" method="POST">
          @method('PUT')
          @csrf
          <div class="modal fade" id="modal-edit-bidang-anggaran" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Bidang Anggaran</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" name="uuid">
                          <div class="form-group">
                            <label class="form-label">Nama Bidang</label>
                            <select name="nama_bidang" class="form-control" value="">
                              @foreach ($bidang as $item)
                                <option value="{{ $item->uuid }}">{{ $item->nama_bidang }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label">Tahun Anggaran</label>
                            <select name="tahun_anggaran" class="form-control" value="">
                              @foreach ($tahun_anggaran as $item)
                                <option value="{{ $item->uuid }}">{{ $item->nama_tahun_anggaran }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="form-label">Jumlah Alokasi</label>
                            <input type="number" name="jumlah_alokasi" class="form-control">
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
  </div>
</section>
@endsection
@push('addon-js')
    <script>
        $('.btn-edit').on('click', function(e){
            $('#modal-edit-bidang-anggaran').modal()
            let uuid = $(this).data('uuid')
            let data_bidang = $(this).data('uuid-bidang')
            let data_tahun_anggaran = $(this).data('uuid-tahun-anggaran')
            let data_jumlah_alokasi = $(this).data('jumlah-alokasi')
            $('input[name="uuid"]').val(uuid)
            $('select[name="nama_bidang"]').val(data_bidang)
            $('select[name="tahun_anggaran"]').val(data_tahun_anggaran)
            $('input[name="jumlah_alokasi"]').val(data_jumlah_alokasi)
        })

    </script>
    <script>
      $('.btn-delete').on('click', function(e) {
        $('#modal-delete-bidang-anggaran').modal()
        let uuid = $(this).data('uuid')
        $('input[name="uuid"]').val(uuid)
      })
    </script>
@endpush
