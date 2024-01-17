@extends('../templates/main')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Tambah Satuan</h4>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.satuan') }}">Satuan</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
            <form action="{{ route('admin.satuan.add') }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label">Satuan</label>
                <input type="text" name="nama_satuan" class="form-control" placeholder="Masukkan nama satuan" required>
              </div>
              <div class="form-group">
                <button class="btn btn-md btn-primary float-right" type="submit">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
        </div>
  </div>
</section>
@endsection
