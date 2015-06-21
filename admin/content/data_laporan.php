<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-custom">
	<thead>
		<tr>
			<th><label>No</label></th>
			<th><label><span class="sr-only">Tanggal Masuk</span><input type="text" name="search_votes" value="Cari Tanggal Masuk" class="search_init" /></label></th>
			<th><label>Pelanggan</label></th>
			<th><label>Status</label></th>
			<th><label>Aksi</label></th>
		</tr>
	</thead>
	<tbody>
	<?php
		include "../handler/connection_handler.php";
		$query="SELECT MD5(transaksi_ID) as id, transaksi_open, transaksi_approve, transaksi_close, member_member_username FROM db_online_printing.transaksi";
		$nom=0;
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_array($result)){
			$nom++;
			$pelanggan=$data["member_member_username"];
			$status='';
			if($data["transaksi_approve"]==null and $data["transaksi_close"]==null){
				$status='pending';
			}elseif($data["transaksi_approve"]==null and $data["transaksi_close"]<>null){
				$status='<font color="red">cancel</font>';
			}elseif($data["transaksi_approve"]<>null and $data["transaksi_close"]==null){
				$status='<font color="blue">process</font>';
			}else{
				$status='<font color="green">finish</font>';
			}
			$apv='onclick=detiltransaksi("'.$data["id"].'")';
			?>
			<tr>
				<td><?php echo $nom;?></td>
				<td><?php echo date("l, d F Y (H:i:s)", strtotime($data['transaksi_open'])); ?></td>
				<td><?php echo $pelanggan; ?></td>
				<td><?php echo $status; ?></td>
				<td><center>
					<div class="row">
						<div class="col-md-6">
							<a class="btn btn-primary" <?php echo $apv; ?> >
								Detail
							</a>
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
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>
<div class="modal fade" id="detilModal" tabindex="-1" role="dialog" aria-labelledby="detilModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="detilModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="detilModalContent">
        ...
      </div>
    </div>
  </div>
</div>
<script>
	LoadDataTablesScripts(TableCustom);
</script>