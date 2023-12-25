@extends('../templates/main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Lihat Sub Jenis Anggaran</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.sub_anggaran') }}">Sub Jenis Anggaran</a></li>
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
                    <input name="uuid" value="{{ $sub_anggaran->uuid }}" type="hidden" class="form-control" required>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group mr-4">
                                <label>Nama Sub Anggaran</label>
                               
                                    <input readonly name="nama_sub_anggaran" value="{{ $sub_anggaran->nama_sub_anggaran }}"
                                        type="text" class="form-control" required>
                              
                            </div>
                            <div class="form-group mr-4">
                                <label>Satuan Anggaran</label>
                               
                                    <input readonly name="satuan_anggaran" value="{{ $sub_anggaran->satuan_anggaran }}"
                                        type="text" class="form-control" required>
                            </div>


                        </div>

                        @if ($jenis_anggaran->kode_anggaran == 'b001')
                            <div class="col-md-6">

                                <div class="form-group mr-4">
                                    <label>Harga Min</label>
                                   
                                        <input readonly name="harga_min" value="{{ $sub_anggaran->harga_min }}"
                                            type="text" class="form-control" required>
                                </div>

                                <div class="form-group mr-4">
                                    <label>Harga Max</label>
                                   
                                        <input readonly name="harga_max" value="{{ $sub_anggaran->harga_max }}"
                                            type="text" class="form-control" required>
                                </div>

                            </div>
                        @elseif ($jenis_anggaran->kode_anggaran == 'b002')
                            <div class="col-md-6">

                                <div class="form-group mr-4">
                                    <label>Luasan</label>
                                   
                                        <input readonly name="luasan" value="{{ $sub_anggaran->luasan }}" type="text"
                                            class="form-control" required>
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
