@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Tambah User</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('dataUser')}}">Data Users</a></li>
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
                <form action="{{route('doAddUser')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <select name="uuid_unit_kerja" class="form-control" required>
                            <option hidden >Pilih Unit Kerja</option>
                            @foreach ($unitKerja as $item)
                            <option value="{{$item->uuid}}">{{$item->nama_unit_kerja}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="nama_user" id="nama_user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="mail" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telp / Wa</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" id="level" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" id="status" class="form-control" required>
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