<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label>Username</label></th>
			<th><label>Nama</label></th>
			<th><label>Email</label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		$query="SELECT md5(admin_username) as admin_id, admin_username, admin_name, admin_email, admin_active 
				FROM admin";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo $data['admin_username']; ?></td>
			<td><?php echo $data['admin_name']; ?></td>
			<td><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $data['admin_email']; ?>"><?php echo $data['admin_email']; ?></a></td>
			<td><center>
				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary" onclick="adminEdit('<?php echo $data['admin_id']; ?>');">
							<i class="fa fa-pencil"></i> Ubah
						</button>
					</div>
					<?php
						session_start();
						if($data['admin_username']!=$_SESSION['admin']['admin_username']){
							if($data['admin_active']==true){
					?>
					<div class="col-md-6">
						<button class="btn btn-danger" onclick="adminDelete('<?php echo $data['admin_id']; ?>',false);">
							<i class="fa fa-lock"></i> Kunci
						</button>
					</div>
					<?php
							}else{
					?>
					<div class="col-md-6">
						<button class="btn btn-success" onclick="adminDelete('<?php echo $data['admin_id']; ?>',true);">
							<i class="fa fa-unlock-alt"></i> Buka
						</button>
					</div>
					<?php
							}
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
			<th>Username</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
