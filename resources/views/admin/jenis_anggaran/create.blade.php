@extends('../templates/main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Tambah Jenis Anggaran</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.jenis_anggaran') }}">Jenis Anggaran</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.jenis_anggaran.add') }}" method="POST">
                    <div class="card-body">
                        @csrf

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group mr-5 ml-3">
                                    <label>Nomor Anggaran</label>

                                    <input name="nomor_anggaran" type="text" class="form-control" required>

                                </div>
                                <div class="form-group mr-5 ml-3">
                                    <label>Nama Anggaran</label>

                                    <input name="nama_anggaran" type="text" class="form-control" required>

                                </div>

                                <div class="form-group mr-5 ml-3 ">
                                    <label>Kode Anggaran</label>

                                    <input name="kode_anggaran" type="text" class="form-control" required>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group mr-5">
                                    <label>Sumber Anggaran</label>

                                    <input type="text" class="form-control" name="sumber_anggaran" required>

                                </div>


                                <div class="form-group mr-5 ">
                                    <label>Jenis Akun</label>

                                    <select name="jenis_akun" class="form-control input-group" required>
                                        <option value="" hidden>--pilih jenis akun--</option>
                                        <option value="blu">BLU</option>
                                        <option value="boptn">BOPTN</option>
                                    </select>   

                                </div>

                            </div>

                        </div>






                    </div>

                    <div class="card-footer">
                        <button type="submit" class='btn btn-primary float-right'>SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
