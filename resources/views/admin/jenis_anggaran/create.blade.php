@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Edit Jenis Anggaran</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.jenis_anggaran')}}">Jenis Anggaran</a></li>
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
                <form action="{{route('admin.jenis_anggaran.add')}}" method="POST">
                    @csrf
                   
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-2">Nomor Anggaran</label>
                                    <div class="col-6">
                                        <input name="nomor_anggaran" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-2">Nama Anggaran</label>
                                    <div class="col-6">
                                        <input name="nama_anggaran" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="" class="col-2">Kode Anggaran</label>
                                    <div class="col-6">
                                        <input name="kode_anggaran" type="text" class="form-control" required>
                                    </div>
                                </div>
                      
                            </div>

                            <div class="col-md-6">
                   
                                <div class="form-group row">
                                    <label for="" class="col-2">Sumber Anggaran</label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="sumber_anggaran" required>
                                    </div>
                                </div>


                                <div class="form-group row ">
                                    <label for="" class="col-2">Jenis Akun</label>
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

            <div class="card-footer">
                <button type="submit" class='btn btn-primary float-right'>SIMPAN</button>
            </div>
          
            </form>
        </div>
    </div>
    </div>
</section>
@endsection