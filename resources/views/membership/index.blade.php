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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Poin</th>
                        <th>Member</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->poin}}</td>
                        <td>{{$d->membership->jenis_membership}}</td>
                        <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                70%
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>         
          </div>                          
        </div> 
	</div>
@endsection
