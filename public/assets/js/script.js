// ambil data yang mau di edit
function fetchData(url, id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url + id, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById('data_id_edit').value = data[0].id;
            document.getElementById('nama_barang_edit').value = data[0].nama_barang;
            document.getElementById('satuan_edit').value = data[0].satuan;
            document.getElementById('harga_min_edit').value = data[0].harga_min;
            document.getElementById('harga_max_edit').value = data[0].harga_max;
        }
    };
    xhr.send();
}

function doDelete(url, id) {
    // console.log(data);
    // console.log("ini url: " + url)
    // console.log("ini id: " + id)
    // var xhr = new XMLHttpRequest()
    // xhr.open('GET', url + id, true)
    // xhr.send()
    window.location.href = url + id
    // console.log(this)

    // console.log(url+id)
}