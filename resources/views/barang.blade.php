@extends('templates.main')
@section('content')
<div class="">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>
            <div class="card-tools">
                <div class="p-2" style="width: 150px;">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add_data">Tambah</button>
                </div>
            </div>
        </div>



        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Minimal</th>
                        <th>Harga Maksimal</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table_data">

                </tbody>
            </table>
            {{ $data_barang->links('pagination.table_pagination') }}
        </div>


        <!-- Modal -->
        <div class="modal fade" id="add_data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                    <form action="{{url('barang/input')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input name="nama_barang" type="text" class="form-control" id="nama_barang" placeholder="Nama Barang">
                                <!-- <small id="nama_barang_hint" class="form-text text-muted">Ini contoh hint broo</small> -->
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input name="satuan" type="text" class="form-control" id="satuan" placeholder="Satuan Barang">
                            </div>
                            <div class="form-group">
                                <label for="harga_min">Harga Minimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input name="h_min" type="number" min="1" class="form-control no-spinners" id="harga_min" placeholder="Minimal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_max">Harga Maksimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input name="h_max" type="number" min="1" class="form-control no-spinners" id="harga_max" placeholder="Maksimal">
                                </div>
                            </div>
                            <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="contoh">
                                <label class="form-check-label" for="contoh">Contohhhhhhhhhhhhhhhhhhh</label>
                            </div> -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" onclick="clearForm()">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Data -->
        <div class="modal fade" id="edit_data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                    <form action="{{url('barang/saveEdit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" hidden name="id" id="data_id_edit">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input name="nama_barang" type="text" class="form-control" id="nama_barang_edit" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input name="satuan" type="text" class="form-control" id="satuan_edit" placeholder="Satuan Barang">
                            </div>
                            <div class="form-group">
                                <label for="harga_min">Harga Minimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input name="h_min" type="number" min="1" class="form-control no-spinners" id="harga_min_edit" placeholder="Minimal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_max">Harga Maksimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input name="h_max" type="number" min="1" class="form-control no-spinners" id="harga_max_edit" placeholder="Maksimal">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <!-- Modal -->
        <div class="modal fade" id="delete_alert" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda yakin ingin menghapus data tersebut?</h5>
                        <h6 class="modal-title" id="staticBackdropLabel">Data yang telah dihapus tidak dapat dikembalikan.</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" id="deleteConfirmButton" onclick="doDelete(this.value)" data-dismiss="modal">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toast -->
        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            <div class="toast" id="myToast" style="position: absolute; top: 0; right: 0;">
                <div class="toast-header">
                    <img src="..." class="rounded mr-2" alt="...">
                    <strong class="mr-auto">Bootstrap</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
        </div>
    </div>

    <script>
        function generateTableBarang(dataBarang) {
            let tableBody = document.getElementById('table_data')

            dataBarang.data.forEach(function(row) {
                let rowData = document.createElement('tr')
                rowData.innerHTML = `
                    <td>${row.nama_barang}</td>
                    <td>${row.satuan}</td>
                    <td>${row.harga_min}</td>
                    <td>${row.harga_max}</td>
                    <td>
                        <button type="button" value="${row.id}" data-id="${row.id}" class="btn btn-secondary edit" data-toggle="modal" data-target="#edit_data">Edit</button>
                        <button type="button" value="${row.id}" data-id="${row.id}" class="btn btn-danger delete-button" data-toggle="modal" data-target="#delete_alert">
                            Hapus
                        </button>
                    </td>
                `;
                tableBody.appendChild(rowData)
            });
        }

        window.onload = function() {
            generateTableBarang(<?php echo json_encode($data_barang); ?>)
        };

        function clearForm() {
            document.getElementById('nama_barang').value = '';
            document.getElementById('satuan').value = '';
            document.getElementById('harga_min').value = '';
            document.getElementById('harga_max').value = '';
        }

        document.addEventListener("DOMContentLoaded", (event) => {
            $(document).on('click', '.edit', function() {
                let id = $(this).data('id')
                let url = "{{ url('api/barang/getData?id=') }}"
                fetchData(url, id)
            });

            $(document).on('click', '.delete-button', function() {
                document.getElementById('deleteConfirmButton').value = $(this).data('id')
            });
        });
    </script>


</div>

@endsection