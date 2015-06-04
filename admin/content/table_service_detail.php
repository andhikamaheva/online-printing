<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Nama Layanan</span><input type="text" name="search_votes" value="Cari Nama" class="search_init" /></label></th>
			<th><label><span class="sr-only">Ukuran</span><input type="text" name="search_votes" value="Cari Ukuran" class="search_init" /></label></th>
			<th><label><span class="sr-only">Harga</span><input type="text" name="search_votes" value="Cari Harga" class="search_init" /></label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		$query="SELECT service_det.service_name as service_name, md5(service.service_id) as service_id, service.service_price as service_price, service.service_size as service_size, md5(service.service_size) as size
				FROM service left join service_det on service.service_id = service_det.service_id 
				WHERE service_det.service_det_active=true";
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo $data['service_name']; ?></td>
			<td><?php echo $data['service_size']; ?></td>
			<td><?php echo $data['service_price']; ?></td>
			<td><center>
				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary" onclick="serviceDetEdit('<?php echo $data['service_id']; ?>','<?php echo $data['size']; ?>');">
							<i class="fa fa-pencil"></i> Ubah
						</button>
					</div>
					<div class="col-md-6">
						<button class="btn btn-danger" onclick="serviceDetDelete('<?php echo $data['service_id']; ?>', '<?php echo $data['size'] ?>');">
							<i class="fa fa-lock"></i> Hapus
						</button>
					</div>
				</div>
				</center>
			</td>
		</tr>
	<?php
		}
		mysqli_close($conn);
	?>
	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Ukuran</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
