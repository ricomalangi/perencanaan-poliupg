@extends('../templates/main')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>Tambah Bidang Anggaran</h4>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.bidang_anggaran') }}">Bidang Anggaran</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
      <div class="card">
          <div class="card-body">
            <form action="{{ route('admin.bidang_anggaran.add') }}" method="POST">
              @csrf
              <div class="form-group">
                <label class="form-label">Nama Bidang</label>
                <select name="nama_bidang" class="form-control" required>
                    <option value="" hidden>--Pilih Bidang--</option>
                  @foreach ($bidang as $item)
                    <option value="{{ $item->uuid }}">{{ $item->nama_bidang }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Tahun Anggaran</label>
                <select name="tahun_anggaran" class="form-control" required>
                  <option value="" hidden>--Pilih Tahun Anggaran--</option>
                  @foreach ($tahun_anggaran as $item)
                    <option value="{{ $item->uuid }}">{{ $item->nama_tahun_anggaran }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Jumlah Alokasi</label>
                <input type="text" name="jumlah_alokasi" class="form-control" id="jumlah-alokasi" required>
              </div>
              <div class="form-group">
                <button class="btn btn-md btn-primary float-right" type="submit">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
        </div>
  </div>
</section>
@endsection
@push('addon-js')
  <script>

    var dengan_rupiah = document.getElementById('jumlah-alokasi');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
      dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix)
    {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
        
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }


  </script>
@endpush
