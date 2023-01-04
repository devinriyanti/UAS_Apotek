@extends('layouts.conquer')
@section('title')
Transaksi
@endsection
@section('content')

<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
    <h2>Transaksi Pembelian</h2>
    <table id='myTable' class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pembeli</th>
                <th>Tanggal Transaksi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $ts)
            <tr>
                <td>{{$ts->id}}</td>
                <td>{{$ts->user->name}}</td>
                <td>{{date('d-m-Y',strtotime($ts->tanggal_transaksi))}}</td>
                <td>
                <a class="btn btn-default" data-toggle="modal" href="#basic" 
                    onclick="getDetailData({{$ts->id}});">Lihat Rincian Pembelian</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="Modal Title">Rincian</h4>
            </div>
            <div class="modal-body" id="msg">
                
            </div>
            <div class="modal-footer">
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
@section('javascript')
<script>
    $('#myTable').DataTable();
    function getDetailData(id){
        $.ajax({
            type:'POST',
            url:'{{route("transaksi.showAjax")}}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id
                },
            success: function(data){
            $('#msg').html(data.msg)
            }
        });
    }
</script>
@endsection
