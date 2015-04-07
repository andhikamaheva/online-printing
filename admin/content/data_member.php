<div class="row">
	<div class="col-xs-12">
		<h3><i class="fa fa-smile-o"></i> Pelanggan</h3>
		<br>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header-no-button">
				<div class="box-name-no-button">
					<i class="fa fa-list-alt"></i>
					<span>Daftar Pelanggan</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive box-no-button" id="dataMember">
			<?php
				include "table_member.php";
			?>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="memberModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="memberModalContent">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button id="memberModalConfirm" type="button" class="btn btn-primary">Save changes</button>
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
	// Add tooltip to form-controls
	$('.form-control').tooltip();
});
</script>
