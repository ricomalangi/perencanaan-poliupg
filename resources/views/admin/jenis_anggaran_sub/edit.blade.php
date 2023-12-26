@extends('../templates/main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Edit Sub Jenis Anggaran</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.sub_anggaran') }}">Sub Jenis Anggaran</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form action="{{ route('admin.sub_anggaran.update') }}" method="POST">
                    <div class="card-body">
                        @method('PUT')
                        @csrf

                        <input name="uuid" value="{{ $sub_anggaran->uuid }}" type="hidden" class="form-control"
                            required>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group mr-5">
                                    <label>Nama Sub Anggaran</label>

                                    <input name="nama_sub_anggaran" value="{{ $sub_anggaran->nama_sub_anggaran }}"
                                        type="text" class="form-control" required>

                                </div>
                                <div class="form-group mr-5">
                                    <label>Satuan Anggaran</label>

                                    <input name="satuan_anggaran" value="{{ $sub_anggaran->satuan_anggaran }}"
                                        type="text" class="form-control" required>

                                </div>
                            </div>

                            @if ($jenis_anggaran->kode_anggaran == 'b001')
                                <div class="col-md-6">

                                    <div class="form-group mr-5 ">
                                        <label>Harga Min</label>

                                        <input name="harga_min" value="{{ $sub_anggaran->harga_min }}" type="text"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group mr-5 ">
                                        <label>Harga Max</label>
                                        <input name="harga_max" value="{{ $sub_anggaran->harga_max }}" type="text"
                                            class="form-control" required>
                                    </div>

                                </div>
                            @elseif ($jenis_anggaran->kode_anggaran == 'b002')
                                <div class="col-md-6">

                                    <div class="form-group mr-5 ">
                                        <label for="" class="col-2">Luasan</label>

                                        <input name="luasan" value="{{ $sub_anggaran->luasan }}" type="text"
                                            class="form-control" required>
                                    </div>
                                </div>
                                
                            @endif
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
