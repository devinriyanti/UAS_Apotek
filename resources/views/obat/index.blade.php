@extends('layouts.conquer')
@section('title')
Obat
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
  <h2>Daftar Obat</h2>
  <div class="table">
    <div>
      <a href="#modalCreate" data-toggle='modal' class="btn btn-info" type="button">Tambah Obat</a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Obat</th>
          <th>Formula</th>
          <th>Restriction Formula</th>
          <th>Kategori</th>
          <th>Supplier</th>
          <th></th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
        <tr id='tr_{{$d->id}}'>
          <td>{{$d->id}}</td>
          <td id='td_name_{{$d->id}}'>{{$d->nama_obat}}</td>
          <td id='td_form_{{$d->id}}'>{{$d->formula}}</td>
          <td id='td_desc_{{$d->id}}'>{{$d->restriction_formula}}</td>
          <!-- kategori dan supplier harus memunculkan nama, contoh "kategori->nama" -->
          <td id='td_catg_{{$d->id}}'>{{$d->kategori_id}}</td>
          <td id='td_catg_{{$d->id}}'>{{$d->supplier_id}}</td>
          <td> <a class="btn btn-default" data-toggle="modal" href="#detail_{{$d->id}}">Detail</a>
            <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">{{$d->nama_obat}}</h4>
                  </div>
                  <div class="modal-body">
                    <img src="{{asset ('images/'.$d->gambar)}}" height='200px' style="display:block; margin:auto" />
                    <hr>
                    <b>Deskripsi</b>
                    <p>{{$d->deskripsi}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <!-- <td>
            <a class='btn btn-info' href="{{route('obat.show',$d->id)}}" data-target="#show{{$d->id}}" data-toggle='modal'>detail</a>
            <div class="modal fade" id="show{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <img src="assets\img\loading2.gif" alt="" style="display:block; margin:auto">
                </div>
              </div>
            </div>s
          </td> -->
          <td>
            <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onClick="getEditForm({{$d->id}})">EDIT</a>
            <a class='btn btn-danger btn-xs' onclick="if(confirm('Are you sure you wanna delete this data?')) deleteDataRemoveTR({{$d->id}})">DELETE</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

<!-- add new medicine -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Medicine</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('obat.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
          @csrf
          <div class="form-body">
            <div class="form-group">
              <label>Nama Obat</label>
              <input type="text" name="nama_obat" class="form-control">
            </div>
            <div class="form-group">
              <label>Formula</label>
              <input type="text" name="formula" class="form-control">
            </div>
            <div class="form-group">
              <label>Restriction Formula</label>
              <input type="text" name="restriction_formula" class="form-control">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea type="text" class="form-control" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
              <label>Fasilitas Kesehatan</label>
              <div class="checkbox-list">
                <label><input type="checkbox" name="faskes_tk1" class="form-control">Tingkat 1</label>
                <label><input type="checkbox" name="faskes_tk2" class="form-control">Tingkat 2</label>
                <label><input type="checkbox" name="faskes_tk3" class="form-control">Tingkat 3</label>
              </div>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="rdoKategori" id="kategori">
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Supplier</label>
              <select class="form-control" name="rdoSupplier" id="supplier">
                @foreach ($supplier as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga"><br>
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control" id="gambar" name="gambar"><br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- update modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content" id="modalContent">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Kategori</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>

@section('javascript')
<script>
  function getEditForm(id) {
    $.ajax({
        type: 'POST',
        url: '{{route("obat.getEditForm")}}',
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
    var eDesc = $('#eDesc').val();
    var eCatg = $('#eCatg').val();
    var eSupplier = $('#eSupplier').val();
    var eForm = $('#eForm').val();
    var eRescForm = $('#eRescForm').val();
    var eFaskes1 = $('#eFaskes1').val();
    var eFaskes2 = $('#eFaskes2').val();
    var eFaskes3 = $('#eFaskes3').val();

    $.ajax({
      type: 'POST',
      url: '{{route("obat.saveData")}}',
      data: {
        '_token': '<?php echo csrf_token() ?>',
        'id': id,
        'nama_obat': eName,
        'deskripsi': eDesc,
        'kategori': eCatg,
        'supplier': eSupplier,
        'formula': eForm,
        'restriction_formula': eRescForm,
        'faskes_tk1': eFaskes1,
        'faskes_tk2': eFaskes2,
        'faskes_tk3': eFaskes3,
      },
      success: function(data) {
        if (data.status == 'ok') {
          alert(data.msg)
          $('#td_name_' + id).html(eName);
          $('#td_form_' + id).html(eForm);
          $('#td_desc_' + id).html(eDesc);
          $('#td_catg_' + id).html(eCatg);

        }
      }
    });
  }

  function deleteDataRemoveTR(id) {
    $.ajax({
      type: 'POST',
      url: '{{route("obat.deleteData")}}',
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