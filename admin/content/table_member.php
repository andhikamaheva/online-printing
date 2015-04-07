<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Nama</span><input type="text" name="search_name" value="Cari Nama" class="search_init" /></label></th>
			<th><label><span class="sr-only">Alamat</span><input type="text" name="search_addr" value="Cari Alamat" class="search_init" /></label></th>
			<th><label><span class="sr-only">Telpon</span><input type="text" name="search_phone" value="Cari Telpon" class="search_init" /></label></th>
			<th><label><span class="sr-only">Email</span><input type="text" name="search_email" value="Cari Email" class="search_init" /></label></th>
			<th><label>Bergabung</label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		$query="SELECT md5(member_username) as member_id, member_name, 
				member_phone, member_email, member_address, member_join, member_active 
				FROM member";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo $data['member_name']; ?></td>
			<td><?php echo $data['member_address']; ?></td>
			<td><?php echo $data['member_phone']; ?></td>
			<td><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $data['member_email']; ?>"><?php echo $data['member_email']; ?></a></td>
			<td><?php echo $data['member_join']; ?></td>
			<td><center>
				<div class="row">
					<?php
						if($data['member_active']==true){
					?>
					<div class="col-md-12">
						<button class="btn btn-danger" onclick="memberDelete('<?php echo $data['member_id']; ?>',false);">
							<i class="fa fa-lock"></i> Kunci
						</button>
					</div>
					<?php
						}else{
					?>
					<div class="col-md-12">
						<button class="btn btn-success" onclick="memberDelete('<?php echo $data['member_id']; ?>',true);">
							<i class="fa fa-unlock-alt"></i> Buka
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
			<th>Alamat</th>
			<th>Telpon</th>
			<th>Email</th>
			<th>Bergabung</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
