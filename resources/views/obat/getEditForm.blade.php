<form method="POST" action="{{url('obat/'.$data->id)}}">
    @csrf
    @method("PUT")
    <div class="portlet">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-reorder"></i> Edit Medicine
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form role="form">
			<div class="form-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Nama Obat</label>
					<input type="text" class="form-control" id="eName" placeholder="Enter text" name="txtObat" value="{{$data->nama_obat}}">
					<span class="help-block">
					A block of help text. </span>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="form-control" rows="3" id="eDescription" name="txtDeskripsi">{{$data->deskripsi}}</textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Formula</label>
					<input type="text" class="form-control" id="eFormula" placeholder="Enter text" name="txtFormula" value="{{$data->formula}}">
					<span class="help-block">
					A block of help text. </span>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Batasan Formula</label>
					<input type="text" class="form-control" id="eFormBatasan" placeholder="Enter text" name="txtBatasan" value="{{$data->restriction_formula}}">
					<span class="help-block">
					A block of help text. </span>
				</div>
				<div class="form-group">
					<label>Fasilitas Kesehatan</label>
					<div class="checkbox-list">
						<label><input type="checkbox" name="cbFaskes1" id="faskes_tk1" {{ ($data->faskes_tk1 == 1) ? 'checked' : ''}}> Tingkat 1</label>
						<label><input type="checkbox" name="cbFaskes2" id="faskes_tk2" {{ ($data->faskes_tk2 == 1) ? 'checked' : ''}}> Tingkat 2</label>
						<label><input type="checkbox" name="cbFaskes3" id="faskes_tk3" {{ ($data->faskes_tk3 == 1) ? 'checked' : ''}}> Tingkat 3</label>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputFile1">Foto Obat</label>
					<input type="file" id="exampleInputFile1">
					<p class="help-block">
						some help text here.
					</p>
				</div>
				<div class="form-group">
					<label>Kategori Obat</label>
					<select class="form-control" name="rdoKategori">
						@foreach($kategori as $k)
							<option value="{{ $k->id }}" {{ $k->id == $data->kategori_id ? 'selected' : ''}}>{{ $k->name }}</option>
						@endforeach
					</select>
				</div>
                <div class="form-group">
					<label>Supplier</label>
					<select class="form-control" name="rdoSupplier">
						@foreach($supplier as $s)
							<option value="{{$s->id}}" {{ $s->id == $data->supplier_id ? 'selected' : ''}}>{{ $s->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-info">Submit</button>
					<button type="button" class="btn btn-default">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</form>