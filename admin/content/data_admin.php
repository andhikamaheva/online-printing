<div class="row">
	<div class="col-xs-12">
		<h3><i class="fa fa-key"></i> Admin</h3>
		<br>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-10 col-md-offset-1">
		<div class="box">
			<div class="box-header">
				<div class="box-name-no-button">
					<i class="fa fa-plus"></i>
					<span>Tambah Admin</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<form id="insertAdminForm" method="post" action="handler/insert_handler.php?t=admin" class="form-horizontal">
				<?php
					include "form_admin.php";
				?>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header-no-button">
				<div class="box-name-no-button">
					<i class="fa fa-list-alt"></i>
					<span>Daftar Admin</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive box-no-button" id="dataAdmin">
			<?php
				include "table_admin.php";
			?>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="adminModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="adminModalContent">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button id="adminModalConfirm" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function AllTables(){
		LoadSelect2Script(MakeSelect2);
	}
	function MakeSelect2(){
		$('select').select2();
		$('.dataTables_filter').each(function(){
			$(this).find('label input[type=text]').attr('placeholder', 'Search');
		});
	}
// Run Datables plugin and create 3 variants of settings
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Load example of form validation
	LoadBootstrapValidatorScript(validationAdminAdd);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
});
</script>
