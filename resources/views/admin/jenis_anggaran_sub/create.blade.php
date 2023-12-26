@extends('../templates/main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Add Jenis Sub Anggaran</h4>
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
                <form action="{{ route('admin.sub_anggaran.add') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <input name="uuid_jenis_anggaran" type="hidden" class="form-control" required>

                        <input name="uuid" type="hidden" class="form-control" required>
                        <div class="row ">

                            <div class="col-md-6">
                                <div class="form-group mr-5">
                                    <label>Nama Sub Anggaran</label>
                                    <input name="nama_sub_anggaran" type="text" class="form-control" required>
                                </div>
                                <div class="form-group mr-5">
                                    <label>Satuan Anggaran</label>
                                    <input name="satuan_anggaran" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mr-5">
                                    <label>Jenis Anggaran</label>
                                    <select name="kode_anggaran" class="form-control " onchange="handleSelectChange(this)"
                                        required>
                                        <option value="" hidden>--pilih jenis anggaran--</option>
                                        @foreach ($jenis_anggaran as $item)
                                            <option data-uuid="{{ $item->uuid }}" value="{{ $item->kode_anggaran }}">
                                                {{ $item->nama_anggaran }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-5">
                                    <label for="">Kode Anggaran</label>
                                    <input readonly name="kode_anggaran" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr />
                                <div class="row">
                                    <div class="col-md-6" id="hargaLuasanSection">
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
    </section>
@endsection

@push('addon-js')
    <script>
        function handleSelectChange(select) {
            var selectedOption = select.options[select.selectedIndex];
            var selectedValue = selectedOption.value;
            var selectedUuid = selectedOption.getAttribute('data-uuid');
            var kodeAnggaranInput = $('[name="kode_anggaran"]');
            var uuidJenisAnggaranInput = $('[name="uuid_jenis_anggaran"]');
            kodeAnggaranInput.val(selectedValue);
            uuidJenisAnggaranInput.val(selectedUuid);

            var hargaLuasanSection = $('#hargaLuasanSection');
            hargaLuasanSection.empty(); // Clear existing content

            if (selectedValue === 'b001') {
                // Append Harga Min and Max inputs
                hargaLuasanSection.append(`
            <div class="form-group mr-5">
                <label>Harga Min</label>
                    <input name="harga_min" type="text" class="form-control" required>
            </div>
            <div class="form-group mr-5">
                <label>Harga Max</label>
                    <input name="harga_max" type="text" class="form-control" required>
            </div>
        `);
            } else if (selectedValue === 'b002') {
                // Append Luasan input
                hargaLuasanSection.append(`
            <div class="form-group mr-5">
                <label>Luasan</label>
                <input name="luasan" type="text" class="form-control" required>
         
            </div>
        `);
            }

            // Show or hide the hargaLuasanSection based on the selected value
            hargaLuasanSection.show();
        }
    </script>
@endpush
