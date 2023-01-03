<form role="form" action="{{ route('supplier.update', $data->id)}}" method='POST'>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Supplier</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" id='eName' value='{{$data->name}}' required>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn btn-info" data-dismiss='modal' onclick="saveDataUpdateTD({{$data->id}})">Submit</button>
                <a href="{{url('supplier')}}" class="btn btn-default" data-dismiss='modal'>Cancel</a>
            </div>
        </div>
    </div>
</form>