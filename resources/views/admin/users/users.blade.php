@extends('../templates/main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Data User</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data User</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('FormTambahUser')}}" class="btn btn-md btn-primary add-data"><i class="fas fa-plus"></i> Tambah User</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Unit Kerja</th>
                            <th>Username</th>
                            <th>E-Mail</th>
                            <th>No. Telp / WA</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table_data"></tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <!-- Pagination -->
            </div>
        </div>
    </div>


    <!-- Form Update -->
    <form action="{{route('UpdateUser')}}" method="POST">
        @csrf
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="uuid" name="uuid">
                        <div class="form-group">
                            <label>Unit Kerja</label>
                            <select name="uuid_unit_kerja" id="uuid_unit_kerja" class="form-control" required>
                                <option hidden>Pilih Unit Kerja</option>
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
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="mail" name="email" id="email" class="form-control" required>
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
    <form action="{{route('DeleteUser')}}" method="post">
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
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>



@endsection

@push('addon-js')
<script>
    // Tabel
    function generateTable(dataUsers) {
        let tableBody = $('#table_data');
        let no = 1;

        dataUsers.data.forEach(function(row) {
            let rowData = $('<tr></tr>');
            rowData.html(`
                    <td>${no}</td>
                    <td>${row.nama_user}</td>
                    <td>${row.nama_unit_kerja}</td>
                    <td>${row.username}</td>
                    <td>${row.email}</td>
                    <td>${row.no_telp}</td>
                    <td>${row.level_user}</td>
                    <td>${row.status}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm edit" data-uuid="${row.uuid}">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm delete" data-uuid="${row.uuid}">Hapus</button>
                    </td>
                `);
            tableBody.append(rowData);
            no += 1
        });
    }

    window.onload = function() {
        generateTable(<?php echo json_encode($dataUsers); ?>)
    }

    $(document).on('click', '.edit', function() {
        let base = "<?php echo route('GetEditDataUser') ?>"
        let uuid = $(this).data('uuid')
        getUser(base, uuid)
        $('#editModal').modal('show')
    })

    $(document).on('click', '.delete', function() {
        let uuid = $(this).data('uuid')
        $('#uuidConfirm').val(uuid)
        $('#deleteModal').modal('show')
    })

    function getUser(url, uuid) {
        var xhr = new XMLHttpRequest();
        let uri = url + "?uuid=" + uuid

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var result = JSON.parse(xhr.responseText);
                    $('#uuid').val(result.uuid)
                    $('#uuid_unit_kerja').val(result.uuid_unit_kerja)
                    $('#nama_user').val(result.nama_user)
                    $('#username').val(result.username)
                    $('#password').val(result.password)
                    $('#email').val(result.email)
                    $('#no_telp').val(result.no_telp)
                    $('#level').val(result.level_user)
                    $('#status').val(result.status)
                }
            }
        };

        xhr.open("GET", uri, true);
        xhr.send();
    }
</script>
@endpush