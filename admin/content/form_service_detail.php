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
	<div id="grpUkuran" class="form-group">
		<label class="col-sm-4 control-label">Ukuran</label>
		<div class="col-sm-8 col-md-6">
			<div class="row">
				<div class="col-xs-6">
					<input type="text" class="form-control" name="panjang" placeholder="Panjang" data-toggle="tooltip" data-placement="bottom" title="Ukuran Panjang" />
				</div>
				<div class="col-xs-6">
					<input type="text" class="form-control" name="lebar" placeholder="Lebar" data-toggle="tooltip" data-placement="bottom" title="Ukuran Lebar" />
				</div>
			</div>
		</div>
	</div>
	<div id="grpHarga" class="form-group">
		<label class="col-sm-4 control-label">Harga</label>
		<div class="col-sm-8 col-md-6">
			<input type="text" class="form-control" name="harga" placeholder="Harga Satuan" data-toggle="tooltip" data-placement="bottom" title="Harga Satuan Service" />
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
	function loadSelectNama(){
		LoadSelect2Script(selectNama);
	}
	function selectNama(){
		$('select').select2();
	}
	LoadDataTablesScripts(loadSelectNama);
</script>
