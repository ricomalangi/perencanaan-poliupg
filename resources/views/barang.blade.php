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
            <!-- <h3 class="card-title mb-0 text-bold">Data Barang</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> -->
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
                    <form action="" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang">
                                <!-- <small id="nama_barang_hint" class="form-text text-muted">Ini contoh hint broo</small> -->
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" placeholder="Satuan Barang">
                            </div>
                            <div class="form-group">
                                <label for="harga_min">Harga Minimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" min="1" class="form-control no-spinners" id="harga_min" placeholder="Minimal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_max">Harga Maksimal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" min="1" class="form-control no-spinners" id="harga_max" placeholder="Maksimal">
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="contoh">
                                <label class="form-check-label" for="contoh">Contohhhhhhhhhhhhhhhhhhh</label>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" onclick="clearForm()">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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
                        <button type="button" value="${row.id}" onclick="console.log(this.value)" class="btn btn-secondary">Edit</button>
                        <button type="button" value="${row.id}" onclick="console.log(this.value)" class="btn btn-danger">Hapus</button>
                    </td>
                `;
                tableBody.appendChild(rowData)
            });
        }

        window.onload = function() {
            generateTableBarang(<?php echo json_encode($data_barang); ?>)
        };

        function clearForm(){
            document.getElementById('nama_barang').value = '';
            document.getElementById('satuan').value = '';
            document.getElementById('harga_min').value = '';
            document.getElementById('harga_max').value = '';
        }
    </script>


</div>

@endsection