<?php
if ($_GET['p'] == 'editAdmin' and isset($_GET['id'])) {
    ?>
		<form class="form-horizontal" id="editAdminForm">
			<fieldset>
				<div class="form-group">
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-8 col-md-6">
						<?php
$id = $_GET['id'];
    include "../handler/connection_handler.php";
    $query = "SELECT admin_username, admin_name, admin_email FROM admin
											WHERE md5(admin_username)='" . $id . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
						<input type="text" class="form-control" name="username" readonly value="<?php echo $data['admin_username'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Nama</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" name="namaD" placeholder="Nama Depan" data-toggle="tooltip" data-placement="bottom" title="Nama Depan Anda" value="<?php echo $data['admin_name'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-8 col-md-6">
						<input type="email" class="form-control" name="email" value="<?php echo $data['admin_email'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" name="password" placeholder="Password" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Ulangi Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" name="re_password" placeholder="Password" />
					</div>
				</div>
			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationAdminEdit);
		</script>
<?php
} else if ($_GET['p'] == 'deleteAdmin' and isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../handler/connection_handler.php";
    $query = "SELECT admin_username FROM admin
						WHERE md5(admin_username)='" . $id . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
		Yakin ingin ubah status data dengan username <strong><em><?php echo $data['admin_username'];?></em></strong>?
<?php
} else if ($_GET['p'] == 'deleteMember' and isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../handler/connection_handler.php";
    $query = "SELECT member_email FROM member
						WHERE md5(member_username)='" . $id . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
		Yakin ingin ubah status data dengan email <strong><em><?php echo $data['member_email'];?></em></strong>?
<?php
} else if ($_GET['p'] == 'editService' and isset($_GET['id'])) {
    ?>
		<form class="form-horizontal" id="editServiceForm">
			<fieldset>
				<div class="form-group">
					<label class="col-sm-4 control-label">Nama</label>
					<div class="col-sm-8 col-md-6">
						<?php
$id = $_GET['id'];
    include "../handler/connection_handler.php";
    $query = "SELECT service_name FROM service_det
											WHERE md5(service_ID)='" . $id . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
						<input type="text" class="form-control" name="namaD" placeholder="Nama Layanan" data-toggle="tooltip" data-placement="bottom" title="Nama Layanan Dasar" value="<?php echo $data['service_name'];?>"/>
					</div>
				</div>
			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationServiceEdit);
		</script>
<?php
} else if ($_GET['p'] == 'editServiceDet' and isset($_GET['id'])) {
    ?>
		<form class="form-horizontal" id="editServiceDetForm">
			<fieldset>
				<div class="form-group">
					<label class="col-sm-4 control-label">Layanan</label>
					<div class="col-sm-8 col-md-6">
						<select class="populate placeholder form-control" name="layanan" >
							<?php
include "../handler/connection_handler.php";
    $id    = $_GET['id'];
    $size  = $_GET['size'];
    $query = "SELECT service_id as service_id, service_name
										FROM service_det WHERE service_det_active = 1 order by service_id = '" . $id . "' desc";
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        ?>
							<option value= <?php echo $data['service_id']?> ><?php echo $data['service_name'];?></option>
							<?php
}
    mysqli_close($conn);
    ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 control-label">Ukuran</label>
					<?php
$id = $_GET['id'];
    include "../handler/connection_handler.php";
    $query = "SELECT service_det.service_name as service_name, service.service_size as service_size, service.service_price as service_price, substring(service.service_size FROM 1 FOR (locate('x',service.service_size)-2)) as panjang, substring(service.service_size,(locate('x',service.service_size)+2)) as lebar
								FROM service_det left join service
						on service_det.service_ID = service.service_ID
								WHERE md5(service_det.service_ID)= '" . $id . "' and md5(service.service_size)= '" . $size . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
					<div class="col-xs-6 col-sm-4 col-md-3">
						<input type="text" class="form-control" name="panjang"  data-toggle="tooltip" data-placement="bottom" title="Ukuran" value="<?php echo $data['panjang'];?>"/>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-3">
						<input type="text" class="form-control" name="lebar"  data-toggle="tooltip" data-placement="bottom" title="Ukuran" value="<?php echo $data['lebar'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Harga</label>
					<div class="col-sm-8 col-md-6">
					<input type="text" class="form-control" name="price"  data-toggle="tooltip" data-placement="bottom" title="Harga" value="<?php echo $data['service_price'];?>"/>
					</div>
				</div>
			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationServiceDetEdit);
		</script>
<?php
} else if ($_GET['p'] == 'deleteService' and isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../handler/connection_handler.php";
    $query = "SELECT service_name FROM service_det
						WHERE md5(service_id)='" . $id . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
		Yakin ingin ubah status data <strong><em><?php echo $data['service_name'];?></em></strong>?
<?php
} else if ($_GET['p'] == 'deleteServiceDet' and isset($_GET['id'])) {
    $id   = $_GET['id'];
    $size = $_GET['size'];
    include "../handler/connection_handler.php";
    $query = "SELECT s.service_name, d.service_size FROM service_det as s left join service as d on s.service_id=d.service_id
						WHERE md5(d.service_id)='" . $id . "' and md5(d.service_size)='" . $size . "'";
    $result = mysqli_query($conn, $query);
    $data   = mysqli_fetch_array($result);
    mysqli_close($conn);
    ?>
		Yakin ingin hapus data <strong><em><?php echo $data['service_name'];?></em></strong> dengan ukuran <strong><em><?php echo $data['service_size'];?></em></strong>?
<?php
} else if ($_GET['p'] == 'dtrans') {
    include "../handler/connection_handler.php";
    $query = '	SELECT transaksi_ID, transaksi_open, transaksi_approve, transaksi_close
					FROM transaksi WHERE md5(transaksi_ID) = "'.$_GET['id'].'" ';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

        $invoice = $row["transaksi_ID"];
        $open    = $row["transaksi_open"];
        $approve = "-";
        $close   = "-";
        if ($row["transaksi_approve"] != null) {
            $approve = $row["transaksi_approve"];
        }
        if ($row["transaksi_close"] != null) {
            $approve = $row["transaksi_close"];
        }
    
    //

    ?>
		<div>
			<div><div class="col-md-4"><b>Invoice</b></div><div class="col-md-8">: <?php echo $invoice;?></div></div>
			<div><div class="col-md-4"><b>Date In</b></div><div class="col-md-8">: <?php echo $open;?></div></div>
			<div><div class="col-md-4"><b>Date Approve</b></div><div class="col-md-8">: <?php echo $approve;?></div></div>
			<div><div class="col-md-4"><b>Date Finish</b></div><div class="col-md-8">: <?php echo $close;?></div></div>
		</div>
		<table width="100%"  border=1 frame=hsides rules=rows>
			<thead>
				<th><font color="red">Name</font></th>
				<th><font color="red">Size</font></th>
				<th><font color="red">Quantity</font></th>
				<th><font color="red">Price</font></th>
				<th><font color="red">SubTotal</font></th>
			</thead>
			<tbody>
		<?php
$query = "	SELECT service_id, size, quantity, price
				FROM transaksi_det
				WHERE transaksi_ID=" . $_GET['id'];
    $result = mysqli_query($conn, $query);
    $total  = 0;
    while ($row = mysqli_fetch_array($result)) {
        $snama = executeScalar("SELECT service_name from service_det where service_id='" . $row["service_id"] . "'");
        echo '
				<tr>
					<td>' . $snama . '</td>
					<td>' . $row["size"] . '</td>
					<td>' . $row["quantity"] . '</td>
					<td>Rp ' . number_format($row["price"], 0, "", ".") . '</td>
					<td>Rp ' . number_format(($row["quantity"] * $row["price"]), 0, "", ".") . '</td>
				</tr>';
        $total += ($row["quantity"] * $row["price"]);
    }
    ?>
			</tbody>
		</table><br>
		<div><strong>total = Rp <?php echo number_format($total, 0, "", ".");?></strong></div>
		<?php
mysqli_close($conn);
}
?>
