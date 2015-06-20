<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Tanggal Proses</span><input type="text" name="search_votes" value="Cari Tanggal Proses" class="search_init" /></label></th>
			<th><label><span class="sr-only">Pelanggan</span><input type="text" name="search_votes" value="Cari Pelanggan" class="search_init" /></label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		session_start();
		$admin_admin_username=$_SESSION['admin']['admin_username'];
		$query="SELECT md5(t.transaksi_ID) as id, t.transaksi_approve, m.member_name FROM transaksi t left join member m on t.member_member_username=m.member_username WHERE t.transaksi_payment is not null and t.transaksi_approve is not null and t.transaksi_close is null and t.admin_admin_username='".$admin_admin_username."'";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
		$cls='onclick="return transaksiDcl(\''.$data['id'].'\')"';
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo date("l, d F Y (H:i:s)", strtotime($data['transaksi_approve'])); ?></td>
			<td><?php echo $data['member_name']; ?></td>
			<td><center>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-primary" <?php echo $cls; ?> >
							<i class="fa fa-sign-out"></i> Selesai
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
			<th>Tanggal Proses</th>
			<th>Pelanggan</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
