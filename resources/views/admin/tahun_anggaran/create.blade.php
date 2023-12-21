@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Tambah Tahun Anggaran</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.tahun_anggaran')}}">Tahun Anggaran</a></li>
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
                <form action="{{route('admin.tahun_anggaran.add')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tahun Anggaran</label>
                        <select name="tahun" class="form-control" required>
                            <option value="" hidden>--pilih tahun--</option>
                            @for ($i = 2019; $i < date('Y'); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
