@extends('../templates/main')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Bidang</h4>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Bidang</li>
          </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
              <a href="{{ route('admin.bidang.create') }}" class="btn btn-md btn-primary"><i class="fas fa-plus"></i> Tambah Bidang</a>
              <table class="table mt-3">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Bidang</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($nama_bidang as $index => $item)
                    <tr>
                       <td>{{ $index + 1 }}</td>
                       <td>{{ $item->nama_bidang }}</td>
                       <td>
                          <div class="row align-items-center">
                            <div class="col col-12 col-sm-6 col-md-auto mb-2 mb-sm-0">
                              <button type="button" class="btn btn-warning btn-md btn-edit " data-uuid="{{ $item->uuid }}" data-bidang="{{ $item->nama_bidang }}">Edit</button>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-auto">
                              <button type="button" class="btn btn-danger btn-md btn-delete " data-uuid="{{ $item->uuid }}" data-bidang="{{ $item->nama_bidang }}">Hapus</button>
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
            {{$nama_bidang->links('templates.components.pagination')}}
          </div>
        </div>
        <form action="{{ route('admin.bidang.delete') }}" method="POST">
          @method('DELETE')
          @csrf
          <div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
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
        <form action="{{ route('admin.bidang.update') }}" method="POST">
          @method('PUT')
          @csrf
          <div class="modal fade" id="modal-edit" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Bidang</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" name="uuid">
                          <label class="form-label">Bidang</label>
                          <input type="text" name="nama_bidang" class="form-control" required>
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
            $('#modal-edit').modal()
            let uuid = $(this).data('uuid')
            let nama_bidang = $(this).data('bidang')
            $('input[name="uuid"]').val(uuid)
            $('input[name="nama_bidang"]').val(nama_bidang)
        })

    </script>
    <script>
      $('.btn-delete').on('click', function(e) {
        $('#modal-delete').modal()
        let uuid = $(this).data('uuid')
        $('input[name="uuid"]').val(uuid)
      })
    </script>
@endpush