<?php
session_start();
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
					</div>
				</div>

			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationLoginMember);
		</script>
		<?php
} else if ($action == 'register') {
		?>
		<form class="form-horizontal" id="loginMember">
			<fieldset>
				<div class="form-group" id="errorLogin">

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
						<input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan ulang password Anda"  title="Password Anda"/>
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
					</div>
				</div>

			</fieldset>
		</form>
		<script type="text/javascript">
			LoadBootstrapValidatorScript(validationRegisterMember);
		</script>
		<?php
} else if (($action == 'viewCart') && (isset($_SESSION['transaksi']))) {
		?>
		<form method="post" id="checkout" >
		<table class="table table-striped">
			<thead>
				<th>Service ID</th>
				<th>Name</th>
				<th>Size</th>
				<th>Price</th>
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
			echo '<td></td>';
			echo '</tr>';
			$total += $cart['service_price'];
			$cart++;
		}
		?>



			</tbody>
		</table>

		<h4>Total :  <?php echo 'Rp. ' . number_format($total, 0, "", ".") . ''?></h4>
		<button class="btn btn-primary pull-right">
		Checkout
		</button>

		</form>
		<?php

	} else {
		echo "<center><h3>Belum Ada Transaksi</h3></center>";
	}
}
?>