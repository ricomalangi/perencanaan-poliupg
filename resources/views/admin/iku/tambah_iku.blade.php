@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Tambah IKU</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.iku')}}">Iku</a></li>
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
                <form action="{{route('admin.iku.doAdd')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Isi IKU</label>
                        <textarea name="isi_iku" id="isi_iku" class="form-control" rows="3"></textarea>
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
