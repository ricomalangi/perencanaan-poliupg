@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Lihat Jenis Sub Anggaran</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.sub_anggaran')}}">Sub Jenis Anggaran</a></li>
                    <li class="breadcrumb-item active">Lihat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                    @csrf
                    <input name="uuid" value="{{$sub_anggaran->uuid}}" type="hidden" class="form-control" required>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="" class="col-2">Nama Sub Anggaran</label>
                                    <div class="col-6">
                                        <input readonly name="nama_sub_anggaran" value="{{$sub_anggaran->nama_sub_anggaran}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-2">Satuan Anggaran</label>
                                    <div class="col-6">
                                        <input readonly name="satuan_anggaran" value="{{$sub_anggaran->satuan_anggaran}}" type="text" class="form-control" required>
                                    </div>
                                </div>

                       
                            </div>

                            @if ($jenis_anggaran->kode_anggaran == 'b001')

                                <div class="col-md-6">
                    
                                    <div class="form-group row ">
                                        <label for="" class="col-2">Harga Min</label>
                                        <div class="col-6">
                                            <input readonly name="harga_min" value="{{$sub_anggaran->harga_min}}" type="text" class="form-control" required>
                                        </div>
                                    </div>
                        
                                    <div class="form-group row ">
                                        <label for="" class="col-2">Harga Max</label>
                                        <div class="col-6">
                                            <input readonly name="harga_max" value="{{$sub_anggaran->harga_max}}" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                            @elseif ($jenis_anggaran->kode_anggaran == 'b002')

                                <div class="col-md-6">
                        
                                    <div class="form-group row ">
                                        <label for="" class="col-2">Luasan</label>
                                        <div class="col-6">
                                            <input readonly name="luasan" value="{{$sub_anggaran->luasan}}" type="text" class="form-control" required>
                                        </div>
                                    </div>
                        

                                </div>
                            @endif
                        </div>

            </div>

          
        </div>
    </div>
    </div>
</section>
@endsection