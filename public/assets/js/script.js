
// ambil data yang mau di edit
function fetchData(url, id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url + id, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById('nama_barang_edit').value = data[0].nama_barang;
            document.getElementById('satuan_edit').value = data[0].satuan;
            document.getElementById('harga_min_edit').value = data[0].harga_min;
            document.getElementById('harga_max_edit').value = data[0].harga_max;
        }
    };

    xhr.send();
}