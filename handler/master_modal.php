<?php
session_start();
include "connection_handler.php";
if (isset($_GET['act'])) {
	$action = $_GET['act'];
	if ($action == 'login') {
		?>
		<form class="form-horizontal" id="loginMember">
			<fieldset>
				<div class="form-group" id="errorLogin">

				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="username" name="username" placeholder="Username Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password Anda"  title="Password Anda"/>
						<p style="padding-top:5px;">Belum punya akun ? <a href="#" id="registerModal()" onclick=registerModal()>Daftar disini</a></p>
					</div>
				</div>

			</fieldset>
		</form>
		<?php
} else if ($action == 'register') {
		?>
		<form class="form-horizontal" id="registerMember">
			<fieldset>
				<div class="form-group" id="errorRegister">
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Name</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="name" name="name" placeholder="Nama Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="username" name="username" placeholder="Username Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="email" name="email" placeholder="Email Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password Anda"  title="Password Anda"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Retype Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" id="retype" name="retype" placeholder="Masukkan ulang password Anda"  title="Password Anda"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Phone</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="phone" name="phone" placeholder="Nomor hp/telp Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Address</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="address" name="address" placeholder="Alamat Anda" />
						<p>Sudah punya akun ? <a href="#" onclick=loginModal()>Login disini</a></p>
					</div>
				</div>
			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationRegisterMember);
		</script>
		<?php
} else if (($action == 'viewCart')) {
		if (isset($_SESSION['transaksi'])) {

			?>
			<button class="btn btn-danger" onclick=destroyCart()>Empty Cart</button>
			<form method="post" id="checkout"action="checkout.php">
				<table class="table table-striped">
					<thead>
						<th>Service ID</th>
						<th>Name</th>
						<th>Size</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Delete</th>
					</thead>
					<tbody>
						<?php
foreach ($_SESSION["transaksi"] as $cart) {
				echo '<tr>';
				echo '<td>' . $cart['service_id'] . '</td>';
				echo '<td>' . $cart['service_name'] . '</td>';
				echo '<td>' . $cart['service_size'] . '</td>';
				echo '<td>' . $cart['service_price'] . '</td>';
				echo '<td>' . $cart['service_qty'] . '</td>';
				echo '<td><a href="#" onclick=deleteCart("' . md5($cart['service_id']) . '","' . md5($cart['service_size']) . '")><i class="fa fa-trash-o" ></i></a></td>';
				echo '</tr>';
				$total += $cart['service_price']*$cart['service_qty'];
				$cart++;
			}
			?>
					</tbody>
				</table>
				<h4>Total :  <?php echo 'Rp. ' . number_format($total, 0, "", ".") . ''?></h4>
				<button class="btn btn-primary pull-right" type="submit">
					Checkout
				</button>

			</form>
			<?php
} else {
			echo "<center><h3>Belum Ada Transaksi</h3></center>";
		}
	} else if ($action == "setting") {
		?>

				<form class="form-horizontal" id="settingMember">
			<fieldset>
			<div class="form-group" id="errorSetting">
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Name</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="name" name="name" value="<?php echo trim($_SESSION['member']['member_name']);?>" placeholder="Nama Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="username" value="<?php echo trim($_SESSION['member']['member_username']);?>" readonly="" name="username" placeholder="Username Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Email</label>
					<div class="col-sm-8 col-md-6">
						<input type="email" class="form-control" autofocus="on" id="email" name="email" value="<?php echo trim($_SESSION['member']['member_email']);?>" placeholder="Email Anda" data-toggle="tooltip" data-placement="bottom" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password Anda"  title="Password Anda"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Retype Password</label>
					<div class="col-sm-8 col-md-6">
						<input type="password" class="form-control" id="password1" name="retype" placeholder="Masukkan ulang password Anda"  title="Password Anda"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Phone</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="phone" name="phone" value="<?php echo trim($_SESSION['member']['member_phone']);?>" placeholder="Nomor hp/telp Anda" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Address</label>
					<div class="col-sm-8 col-md-6">
						<input type="text" class="form-control" autofocus="on" id="address" name="address" value="<?php echo trim($_SESSION['member']['member_address']);?>" placeholder="Alamat Anda" />
					</div>
				</div>

			</fieldset>
		</form>
	<?php } else if ($action == "confirm") {
		?>


<form class="form-horizontal" id="loginMember">
			<fieldset>
				<div class="form-group">
					<label class="col-sm-4 control-label">Invoice No.</label>
					<div class="col-sm-8 col-md-6">
						<select class="populate placeholder form-control">
							
							<?php
								$sql="SELECT transaksi_ID
										FROM transaksi 
										where member_member_username='".$_SESSION['member']['member_username']."'
										and transaksi_close is NULL";
								$result = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($result)) {
									echo'<option>'.$row["transaksi_ID"].'</option>';
								}
							?>
							
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Bukti Transfer</label>
					<div class="col-sm-8 col-md-6">
						<input type="file" class="form-control" id="password" name="password" placeholder="Bukti Transfer"  title="Password Anda"/>
						<p style="color:gray;"* >Max. Size 500kB. Format JPG/PNG</p>
					</div>
				</div>


			</fieldset>
		</form>
		<?php
}

}
?>
