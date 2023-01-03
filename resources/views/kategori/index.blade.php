@extends('layouts.conquer')
<<<<<<< HEAD
@section('judul_halaman')
    Master Categories
=======
@section('title')
Kategori
>>>>>>> 059f013211be6a5804d46b49cd8a4cbadb4dd967
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
            <i class="fa fa-reorder"></i>Master Categories
          </div>
            <div class="actions">
                <a href="#modalCreate" data-toggle='modal' class="btn btn-info" type="button">Tambah kategori</a>
            </div>
        </div>
		<div class="portlet-body">
            <table id='myTable' class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                        <tr id='tr_{{$d->id}}'>
                            <td>{{$d->id}}</td>
                            <td class='editable' id='td_name_{{$d->id}}'>{{$d->name}}</td>
                            <td>
                                <a href="#modalEdit" data-toggle='modal' class='btn btn-warning btn-xs' onclick="getEditForm({{$d->id}})">EDIT</a>
                                <a class='btn btn-danger btn-xs' onclick="if(confirm('Apakah yakin ingin menghapus data?')) deleteDataRemoveTR({{$d->id}})">DELETE</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>         
          </div>                          
        </div> 
	</div>
@endsection


<!-- modal add new -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('kategori') }}" class="form-horizontal" method='POST'>
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" id='name' required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{url('kategori')}}" class="btn btn-default" data-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id='modalContent'>
        </div>
    </div>
</div>

@section('javascript')
<script>
    $('#myTable').DataTable();
    
    function getEditForm(id) {
        $.ajax({
                type: 'POST',
                url: '{{route("kategori.getEditForm")}}',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            },

        );
    }

    function saveDataUpdateTD(id) {
        var eName = $('#eName').val();
        var eAddress = $('#eAddress').val();
        $.ajax({
            type: 'POST',
            url: '{{route("kategori.saveData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'name': eName,
            },
            success: function(data) {
                if (data.status == 'ok') {
                    alert(data.msg)
                    $('#td_name_' + id).html(eName);
                }
            }
        });
    }

    function deleteDataRemoveTR(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("kategori.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                if (data.status == 'ok') {
                    alert(data.msg)
                    $('#tr_' + id).remove();
                } else {
                    alert(data.msg)
                }
            }
        });
    }
</script>
@endsection
@section('initialscript')
<script>
//   $('.editable').editable({
//     closeOnEnter :true,
//     callback:function(data){
//       if(data.content){
//         alert(data.content)
//       }
//     }
//   });

//     var s_id = data.$el[0].id
//     var fname = s_id.split('_')[1]
//     var id = s_id.split('_')[2]
//     $.ajax({
//         type: 'POST',
//         url: '{{route("kategori.saveDataField")}}',
//         data: {
//             '_token': '<?php echo csrf_token() ?>',
//             'id': id,
//             'fname': fname,
//             'value': data.content

//         },
//         success: function(data) {
//             alert(data.msg)
//         }
//     });
</script>
@endsection