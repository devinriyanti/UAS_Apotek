@extends('layouts.conquer')
@section('judul_halaman')
    Laporan Transaksi
@endsection
@section('content')
    <!-- BEGIN Portlet PORTLET-->
    <div class="page-container">
          @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            <div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            <div>
            @endif
      </div>
        <form method="post">
            @csrf
            <br>
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="form-group row">
                            <label for="date" class="col-form-label col-sm-2">Dari Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm" id="date_range_filter_min" name="dariTgl" required/>
                            </div>
                            <label for="date" class="col-form-label col-sm-2">Sampai Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm" id="date_range_filter_max" name="sampaiTgl" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i>Laporan Transaksi
			</div>
		    <div class="actions">
		    </div>
	    </div>
        
		<div class="portlet-body">
            <table id='myTable' class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Pembelian</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        <th>Nama Obat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $l)
                    <tr>
                        <td>{{$l->name}}</td>
                        <td>{{$l->tanggal_transaksi}}</td>
                        <td>{{$l->kuantitas}}</td>
                        <td>{{$l->harga}}</td>
                        <td>{{$l->nama_obat}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>         
          </div>                          
        </div> 
	</div>
@endsection
@section('javascript')
<script>
    var table = $('#myTable').DataTable();
    $('#date_range_filter_min, #date_range_filter_max').on('change', function () {
        $.fn.dataTable.ext.search.pop();
        if($('#date_range_filter_min').val()!='' && $('#date_range_filter_max').val()!='' ){
            $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                min = new Date($('#date_range_filter_min').val());
                max = new Date( $('#date_range_filter_max').val());
                
            var date = new Date(data[1]);
            if ( ( min === null && max === null ) || ( min === null && date <= max ) || ( min <= date   && max === null ) || (min <= date && date <= max) ) {
                return true;
            }
                return false;
            });
        }
        table.draw();
    });
</script>
@endsection
