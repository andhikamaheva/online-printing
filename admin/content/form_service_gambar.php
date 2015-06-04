<fieldset>
	<div id="grpNama" class="form-group">
		<label class="col-sm-4 control-label">Layanan</label>
		<div class="col-sm-8 col-md-6">
			<select class="populate placeholder" name="layanan" >
			<?php
		include "../handler/connection_handler.php";
		$query="SELECT service_id as service_id, service_name
				FROM service_det WHERE service_det_active = 1";
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){

		?>

		<option value= <?php echo $data['service_id'] ?> ><?php echo $data['service_name']; ?></option>
		<?php } 
			mysqli_close($conn);
		?>
			</select>
		</div>
	</div>
	<div id="grpPlusGambar" class="form-group">
		<label class="col-sm-4 control-label">Gambar</label>
		<div class="col-sm-8 col-md-6">
			<button class="btn btn-info btn-label-left" onclick="return tbhInputGbr()"><span><i class="fa fa-plus"></i></span> Tambah Gambar</button>
		</div>
	</div>
	<div id="grpGambar" class="form-group">
		<div class="row" id="gbr1">
			<div class="col-sm-offset-4 col-sm-8 col-md-6">
				<div class="input-group">
					<input type="file" class="form-control" name="harga" placeholder="Harga Satuan" data-toggle="tooltip" data-placement="bottom" title="Gambar yang ditampilkan pada pelanggan" />
					<span class="input-group-btn">
						<button class="btn btn-danger" type="button" onclick="hpsInputGbr('1')"><i class="fa fa-minus"></i></button>
					</span>
				</div><!-- /input-group -->
			</div>
		</div>
	</div>
</fieldset>
<div class="form-group">
	<div class="col-xs-6 col-sm-3 col-sm-offset-4">
		<button type="button" class="btn btn-primary btn-block" onclick="serviceDetAdd();">Buat</button>
	</div>
	<div class="col-xs-6 col-sm-3">
		<button type="button" class="btn btn-danger btn-block" onclick="serviceDetReset();">Batal</button>
	</div>
</div>
<script>
	function hpsInputGbr(id){
		$('#gbr'+id).remove();
	}
	function tbhInputGbr(){
		var banyak=$('#grpGambar > .row').length;
		var konten=$('#grpGambar');
		konten.append('<div class="row" id="gbr'+(banyak+1)+'"><div class="col-sm-offset-4 col-sm-8 col-md-6"><div class="input-group"><input type="file" class="form-control" name="harga" placeholder="Harga Satuan" data-toggle="tooltip" data-placement="bottom" title="Gambar yang ditampilkan pada pelanggan" /><span class="input-group-btn"><button class="btn btn-danger" type="button" onclick="hpsInputGbr(\''+(banyak+1)+'\')"><i class="fa fa-minus"></i></button></span></div></div></div>');
		return false;
	}
	function loadSelectNama(){
		LoadSelect2Script(selectNama);
	}
	function selectNama(){
		$('select').select2();
	}
	LoadDataTablesScripts(loadSelectNama);
</script>
