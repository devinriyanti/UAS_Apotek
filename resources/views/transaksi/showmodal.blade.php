<div class="portlet">
  <div class="portlet-title">
    <b>Tampilan Transaksi dari: {{ $data->id }} - {{ $data->tanggal_transaksi}}</b>
  </div>
  <div class="portlet-body">
    <div class='row'>
      <div class="col-md-4">
      @foreach($data->obat as $do)
          <div class="tumbnail">
            <div class="caption">
              <h4><b>{{ strtoupper($do->nama_obat) }}</b></h4>
              <img src="{{ asset('images/'.$do->gambar) }}" height='200px' /></a> <br>
              <p>Jumlah Beli: {{ $do->pivot->kuantitas }}</p>
              <p>Harga per obat : Rp.{{ number_format($do->harga, 0) }}</p>
            </div>
          </div>
      @endforeach
      <b>Total Harga: Rp.{{ number_format($total, 0) }}</b>
      </div>
    </div>
  </div>
</div>