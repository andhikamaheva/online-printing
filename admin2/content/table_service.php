<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Nama</span><input type="text" name="search_votes" value="Cari Nama" class="search_init" /></label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		$query="SELECT md5(service_ID) as service_id, service_name, service_det_active 
				FROM service_det";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo $data['service_name']; ?></td>
			<td><center>
				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary" onclick="serviceEdit('<?php echo $data['service_id']; ?>');">
							<i class="fa fa-pencil"></i> Ubah
						</button>
					</div>
					<?php
						if($data['service_det_active']==true){
					?>
					<div class="col-md-6">
						<button class="btn btn-danger" onclick="serviceDelete('<?php echo $data['service_id']; ?>',false);">
							<i class="fa fa-lock"></i> Non Aktif
						</button>
					</div>
					<?php
						}else{
					?>
					<div class="col-md-6">
						<button class="btn btn-success" onclick="serviceDelete('<?php echo $data['service_id']; ?>',true);">
							<i class="fa fa-unlock-alt"></i> Aktif
						</button>
					</div>
					<?php
						}
					?>
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
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
