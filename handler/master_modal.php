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