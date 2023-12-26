@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Tahun Anggaran</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Unit Kerja</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('FormTambahUnitKerja')}}" class="btn btn-md btn-primary add-data"><i class="fas fa-plus"></i> Tambah Data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bidang</th>
                            <th>Unit Kerja</th>
                            <th>Kode Unit Kerja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table_data"></tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <!-- Pagination -->
                {{ $unit_kerja->links('pagination.table_pagination') }}
            </div>
        </div>
    </div>


    <!-- Form Update -->
    <form action="{{route('UpdateUnitKerja')}}" method="POST">
        @csrf
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tahun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="uuid" name="uuid">
                        <div class="form-group">
                            <label>Bidang</label>
                            <select id="uuid_bidang" name="uuid_bidang" class="form-control" required>
                                <option value="qwerty">Bidang 1</option>
                                <option value="asdfgh">Bidang 2</option>
                                <option value="zxcvbn">Bidang 3</option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-save">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Delete -->
    <form action="{{route('DeleteUnitKerja')}}" method="post">
        @csrf
        <input id="uuidConfirm" type="hidden" name="uuid">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title">Apakah Anda Yakin?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger confirm" data-uuid="">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>



@endsection

@push('addon-js')
<script>
    // Tabel Data
    function generateTable(dataUnitKerja) {
        let tableBody = $('#table_data');
        let no = 1;

        dataUnitKerja.data.forEach(function(row) {
            let rowData = $('<tr></tr>');
            rowData.html(`
                    <td>${no}</td>
                    <td>${row.uuid_bidang}</td>
                    <td>${row.nama_unit_kerja}</td>
                    <td>${row.kode_unit_kerja}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-md edit" data-uuid="${row.uuid}">Edit</button>
                        <button type="button" class="btn btn-danger btn-md delete" data-uuid="${row.uuid}">Hapus</button>
                    </td>
                `);
            tableBody.append(rowData);
            no += 1
        });
    }

    window.onload = function() {
        generateTable(<?php echo json_encode($unit_kerja); ?>)
    }

    $(document).on('click', '.edit', function() {
        let base = "<?php echo route('GetEditDataUnitKerja') ?>"
        let uuid = $(this).data('uuid')
        fetchData(base, uuid)
        $('#editModal').modal('show')
    })

    $(document).on('click', '.delete', function() {
        let uuid = $(this).data('uuid')
        $('#uuidConfirm').val(uuid)
        $('#deleteModal').modal('show')
    })

    

    function fetchData(url, uuid) {
        var xhr = new XMLHttpRequest();
        let uri = url + "?uuid=" + uuid

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var result = JSON.parse(xhr.responseText);
                    $('#uuid').val(result.uuid)
                    $('#uuid_bidang').val(result.uuid_bidang)
                    $('#nama_unit_kerja').val(result.nama_unit_kerja)
                    $('#kode_unit_kerja').val(result.kode_unit_kerja)
                }
            }
        };
        xhr.open("GET", uri, true);
        xhr.send();
    }
</script>
@endpush