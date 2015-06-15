<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Tanggal Masuk</span><input type="text" name="search_votes" value="Cari Tanggal Masuk" class="search_init" /></label></th>
			<th><label><span class="sr-only">Pelanggan</span><input type="text" name="search_votes" value="Cari Pelanggan" class="search_init" /></label></th>
			<th><label><span class="sr-only">Tanggal Selesai</span><input type="text" name="search_votes" value="Cari Tanggal Selesai" class="search_init" /></label></th>
			<th><label><span class="sr-only">Admin</span><input type="text" name="search_votes" value="Cari Admin" class="search_init" /></label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		session_start();
		$admin_admin_username=$_SESSION['admin']['admin_username'];
		$query="SELECT t.transaksi_open, t.transaksi_close, m.member_name, a.admin_name FROM transaksi t left join member m on t.member_member_username=m.member_username left join admin a on t.admin_admin_username=a.admin_username WHERE t.transaksi_payment is not null and t.transaksi_approve is not null and t.transaksi_close is not null";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
		$cls='onclick="return transaksiDcl(\''.$data['id'].'\')"';
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo $data['transaksi_open']; ?></td>
			<td><?php echo $data['member_name']; ?></td>
			<td><?php echo $data['transaksi_close']; ?></td>
			<td><?php echo $data['admin_name']; ?></td>
		</tr>
	<?php
		}
		mysqli_close($conn);
	?>
	</tbody>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Tanggal Masuk</th>
			<th>Pelanggan</th>
			<th>Tanggal Selesai</th>
			<th>Admin</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
