<?php
	if($_GET['p']=='editAdmin' and isset($_GET['id'])){
?>
		<form class="form-horizontal" id="editAdminForm">
			<fieldset>
				<div class="form-group">
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-8 col-md-6">
						<?php
							$id=$_GET['id'];
							include "../handler/connection_handler.php";
							$query="SELECT admin_username, admin_name, admin_email FROM admin 
											WHERE md5(admin_username)='".$id."'";
							$result=mysqli_query($conn,$query);
							$data=mysqli_fetch_array($result);
							mysqli_close($conn);
						?>
						<input type="text" class="form-control" name="username" readonly value="<?php echo $data['admin_username']; ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Nama</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" name="namaD" placeholder="Nama Depan" data-toggle="tooltip" data-placement="bottom" title="Nama Depan Anda" value="<?php echo $data['admin_name']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-8 col-md-6">
						<input type="email" class="form-control" name="email" value="<?php echo $data['admin_email']; ?>" />
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
	}
	else if($_GET['p']=='deleteAdmin' and isset($_GET['id'])){
		$id=$_GET['id'];
		include "../handler/connection_handler.php";
		$query="SELECT admin_username FROM admin 
						WHERE md5(admin_username)='".$id."'";
		$result=mysqli_query($conn,$query);
		$data=mysqli_fetch_array($result);
		mysqli_close($conn);
?>
		Yakin ingin ubah status data dengan username <strong><em><?php echo $data['admin_username']; ?></em></strong>?
<?php
	}
	else if($_GET['p']=='deleteMember' and isset($_GET['id'])){
		$id=$_GET['id'];
		include "../handler/connection_handler.php";
		$query="SELECT member_email FROM member 
						WHERE md5(member_username)='".$id."'";
		$result=mysqli_query($conn,$query);
		$data=mysqli_fetch_array($result);
		mysqli_close($conn);
?>
		Yakin ingin ubah status data dengan email <strong><em><?php echo $data['member_email']; ?></em></strong>?
<?php
	}
	else if($_GET['p']=='editService' and isset($_GET['id'])){
?>
		<form class="form-horizontal" id="editServiceForm">
			<fieldset>
				<div class="form-group">
					<label class="col-sm-4 control-label">Nama</label>
					<div class="col-sm-8 col-md-6">
						<?php
							$id=$_GET['id'];
							include "../handler/connection_handler.php";
							$query="SELECT service_name FROM service_det 
											WHERE md5(service_ID)='".$id."'";
							$result=mysqli_query($conn,$query);
							$data=mysqli_fetch_array($result);
							mysqli_close($conn);
						?>
						<input type="text" class="form-control" name="namaD" placeholder="Nama Layanan" data-toggle="tooltip" data-placement="bottom" title="Nama Layanan Dasar" value="<?php echo $data['service_name']; ?>"/>
					</div>
				</div>
			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationServiceEdit);
		</script>
<?php
	}
	else if($_GET['p']=='deleteService' and isset($_GET['id'])){
		$id=$_GET['id'];
		include "../handler/connection_handler.php";
		$query="SELECT service_name FROM service_det 
						WHERE md5(service_id)='".$id."'";
		$result=mysqli_query($conn,$query);
		$data=mysqli_fetch_array($result);
		mysqli_close($conn);
?>
		Yakin ingin ubah status data <strong><em><?php echo $data['service_name']; ?></em></strong>?
<?php
	}


		else if($_GET['p']=='deleteServiceDet' and isset($_GET['id'])){
		$id=$_GET['id'];
		include "../handler/connection_handler.php";
		$query="SELECT service_det.service_name FROM service_det left join service on service_det.service_id 
						= service.service_id
						WHERE md5(service.service_id)='".$id."'";
		$result=mysqli_query($conn,$query);
		$data=mysqli_fetch_array($result);
		mysqli_close($conn);
?>
		Yakin ingin ubah status data <strong><em><?php echo $data['service_name']; ?></em></strong>?
<?php
	}
?>
