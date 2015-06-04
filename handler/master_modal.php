<?php 
if(isset($_GET['act'])){
	$action=$_GET['act'];
	if($action=='login'){
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
<<<<<<< HEAD
	}else if($action=='register'){
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
=======
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
	}
	else if($action=='viewCart'){
		?>
		<table class="table table-striped">
			<thead>
				<th>Service ID</th>
				<th>Service Nama</th>
				<th>Service Price</th>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
			<h4>Total : </h4>
		
		<?php

	}
}
?>