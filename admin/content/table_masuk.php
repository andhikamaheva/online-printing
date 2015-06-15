<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Tanggal Masuk</span><input type="text" name="search_votes" value="Cari Tanggal Masuk" class="search_init" /></label></th>
			<th><label>Pembayaran</label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		$query="SELECT md5(transaksi_ID) as id, transaksi_open, transaksi_payment FROM db_online_printing.transaksi WHERE transaksi_approve is null and transaksi_close is null";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
		$nom++;
		$byr=($data['transaksi_payment']!=null ? '<a href="javascript:void(0)" onclick="return imgByr(\''.$data['id'].'\')">Lunas</a>' : 'Belum');
		$apv=($data['transaksi_payment']!=null ? 'onclick="return transaksiApv(\''.$data['id'].'\')"' : 'disabled');
		$dcl=($data['transaksi_payment']!=null ? 'onclick="return transaksiDcl(\''.$data['id'].'\')"' : 'disabled');
	?>
		<tr>
			<td><?php echo $nom;?></td>
			<td><?php echo $data['transaksi_open']; ?></td>
			<td><?php echo $byr; ?></td>
			<td><center>
				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-primary" <?php echo $apv; ?> >
							<i class="fa fa-refresh"></i> Proses
						</button>
					</div>
					<div class="col-md-6">
						<button class="btn btn-danger" <?php echo $dcl; ?> >
							<i class="fa fa-times"></i> Tolak
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
			<th>Tanggal Masuk</th>
			<th>Pembayaran</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<script>
	LoadDataTablesScripts(TableCustom);
</script>
