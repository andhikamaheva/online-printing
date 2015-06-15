<div class="row">
	<div class="col-xs-12">
		<h3><i class="fa fa-times"></i> Transaksi Tolak</h3>
		<br>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header-no-button">
				<div class="box-name-no-button">
					<i class="fa fa-list-alt"></i>
					<span>Daftar Transaksi Tolak</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive box-no-button" id="dataService">
			<?php
				include "table_tolak.php";
			?>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="transaksiModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="transaksiModalContent">
        ...
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
});
</script>
