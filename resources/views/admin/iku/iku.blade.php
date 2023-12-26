@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>IKU</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">IKU</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.iku.add')}}" class="btn btn-md btn-primary add-data"><i class="fas fa-plus"></i> Tambah Data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Isi Iku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table_data"></tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <!-- Pagination -->
                {{ $iku->links('pagination.table_pagination') }}
            </div>
        </div>
    </div>

    <!-- Form Update -->
    <form action="{{route('admin.iku.update')}}" method="POST">
        @csrf
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit IKU</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="uuid_iku" name="uuid">
                        <div class="form-group">
                            <label>Isi IKU</label>
                            <textarea name="isi_iku" id="isi_iku" class="form-control" rows="3"></textarea>
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
    <form action="{{route('admin.iku.delete')}}" method="post">
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
                    <td>${row.isi_iku}</td>
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
        generateTable(<?php echo json_encode($iku); ?>);
    }

    $(document).on('click', '.edit', function() {
        let base = "<?php echo route('admin.iku.GetData') ?>"
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
        var xhr = new XMLHttpRequest()
        let uri = url + "?uuid=" + uuid

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var result = JSON.parse(xhr.responseText);
                    $('#uuid_iku').val(result.uuid)
                    $('#isi_iku').val(result.isi_iku)
                }
            }
        };
        xhr.open("GET", uri, true);
        xhr.send();
    }
</script>
@endpush