<fieldset>
	<div id="grpUser" class="form-group">
		<label class="col-sm-4 control-label">Username</label>
		<div class="col-sm-8 col-md-6">
			<input type="text" class="form-control" name="username" placeholder="Username" data-toggle="tooltip" data-placement="bottom" title="Username digunakan pada saat login" required />
		</div>
	</div>
	<div id="grpNama" class="form-group">
		<label class="col-sm-4 control-label">Nama</label>
		<div class="col-sm-8 col-md-6">
			<input type="text" class="form-control" name="namaD" placeholder="Nama Lengkap" data-toggle="tooltip" data-placement="bottom" title="Nama Lengkap Admin" required />
		</div>
	</div>
	<div id="grpEmail" class="form-group">
		<label class="col-sm-4 control-label">Email</label>
		<div class="col-sm-8 col-md-6">
			<input type="text" class="form-control" name="email" placeholder="Email" data-toggle="tooltip" data-placement="bottom" title="Seluruh pemberitahuan akan dikirimkan ke email ini" required />
		</div>
	</div>
</fieldset>
<div class="form-group">
	<div class="col-xs-6 col-sm-3 col-sm-offset-4">
		<button type="button" class="btn btn-primary btn-block" onclick="adminAdd();">Buat</button>
	</div>
	<div class="col-xs-6 col-sm-3">
		<button type="button" class="btn btn-danger btn-block" onclick="adminReset();">Batal</button>
	</div>
</div>
