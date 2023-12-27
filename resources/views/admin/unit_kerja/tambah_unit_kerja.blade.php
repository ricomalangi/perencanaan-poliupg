@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Tambah Unit Kerja</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('UnitKerja')}}">Unit Kerja</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{route('doAddUnitKerja')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Bidang</label>
                        <select name="uuid_bidang" class="form-control" required>
                            <option hidden>Pilih Bidang</option>
                            @foreach ($data_bidang as $bidang)
                            <option value="{{$bidang->uuid}}" >{{$bidang->nama_bidang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Unit Kerja</label>
                        <input type="text" name="nama_unit_kerja" id="nama_unit_kerja" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Unit Kerja</label>
                        <input type="text" name="kode_unit_kerja" id="kode_unit_kerja" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary float-right">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
