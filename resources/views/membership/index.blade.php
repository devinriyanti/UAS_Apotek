@extends('layouts.conquer')
@section('judul_halaman')
    Master Medicine
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
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i>Master Membership
			</div>
		    <div class="actions">
		    </div>
	    </div>
		<div class="portlet-body">
            <table id='myTable' class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pembeli</th>
                        <th>Email</th>
                        <th>Poin</th>
                        <th>Member</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->poin}}</td>
                        <td>{{$d->membership->jenis}}</td>
                        <td>
                        <!-- SETTING PROGRESS BAR -->
                        <!-- {{$d->poin}} -->
                        @php
                        $batas_poin= $d->membership->jenis == "SILVER" ? 100:150 ;
                            if($d->membership->jenis == "SILVER"){
                                $batas_poin= 99;
                            } 
                            elseif($d->membership->jenis == "GOLD"){
                                $batas_poin= 149;
                            }                             
                            $percenant= ceil(($d->poin/$batas_poin) *100);
                        @endphp
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$percenant}}%;" 
                                aria-valuenow="{{$percenant}}" aria-valuemin="0" aria-valuemax="100">{{$percenant}}%</div>
                        </div>
                        <!-- @if($d->membership->jenis == "SILVER") 100
                        @elseif($d->membership->jenis == "GOLD") 150
                        @endif -->
                        </td>
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
    $('#myTable').DataTable();
</script>
@endsection