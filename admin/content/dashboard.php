<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-12">
		<h3><i class="fa fa-dashboard"></i> DASHBOARD</h3>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	<div id="dashboard_links" class="col-xs-12 col-sm-2 pull-right">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#" class="tab-link" id="overview">Keseluruhan</a></li>
			<li><a href="#" class="tab-link" id="clients">Pelanggan</a></li>
			<li><a href="#" class="tab-link" id="graph">Statistik</a></li>
		</ul>
	</div>
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<div class="row">
					<div class="col-xs-12" style=" max-height:500px; overflow-x:auto">
						<h4 class="page-header">PENJUALAN HARIAN</h4>
						<table id="ticker-table" class="table m-table table-bordered table-hover table-heading"
						style="max-height:500px;overflow-x:auto">
							<thead>
								<tr>
									<th>Layanan</th>
									<th>Kemarin</th>
									<th>Hari ini</th>
									<th>Prosentase perubahan</th>
								</tr>
							</thead>
							<tbody id="dashboard-penjualan">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
			<br>
				<div id="ow-summary" class="row">
					<div class="col-xs-12">
						<h4 class="page-header">&Sigma; RINGKASAN</h4>
						<div class="row">
							<?php
								include "../handler/connection_handler.php";
								$query="SELECT minta.jmlM, proses.jmlP, tolak.jmlT
												FROM	(SELECT count(transaksi_ID) jmlM
														FROM db_online_printing.transaksi) as minta,
														(SELECT count(transaksi_ID) jmlP
														FROM db_online_printing.transaksi
														WHERE transaksi_approve is not null) as proses,
														(SELECT count(transaksi_ID) as jmlT
														FROM db_online_printing.transaksi
														WHERE transaksi_approve is null
														and transaksi_close is not null) as tolak";
								$result=mysqli_query($conn,$query);
								$jml=mysqli_fetch_array($result);
								mysqli_close($conn);
							?>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">Total Permintaan<b><?php echo $jml['jmlM']; ?></b></div>
								</div>
								<div class="row">
									<div class="col-xs-12">Total Proses<b><?php echo $jml['jmlP']; ?></b></div>
								</div>
								<div class="row">
									<div class="col-xs-12">Total Penolakan<b><?php echo $jml['jmlP']; ?></b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="ow-donut" class="row">
					<div class="col-xs-12">
						<h4 class="page-header">&#37; Prosentase</h4>
						<div class="row">
							<div class="col-sm-6">
								<div id="morris_donut_1" style="width:120px;height:120px;"></div>
							</div>
							<div class="col-sm-6">
								<div id="morris_donut_2" style="width:120px;height:120px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Dashboard Tab 1-->
		<!--Start Dashboard Tab 2-->
		<div id="dashboard-clients" class="row" style="visibility: hidden; position: absolute; max-height:500px; overflow-x:auto">
		</div>
		<!--End Dashboard Tab 2-->
		<!--Start Dashboard Tab 3-->
		<div id="dashboard-graph" class="row" style="width:100%; visibility: hidden; position: absolute;" >
			<div class="col-xs-12">
				<h4 class="page-header">Statistik Penjualan</h4>
				<div id="stat-graph" style="height: 300px;"></div>
			</div>
		</div>
		<!--End Dashboard Tab 3-->
	</div>
	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
<script type="text/javascript">
$(document).ready(function() {
	// Make all JS-activity for dashboard
	DashboardTabChecker();
	LoadPelanggan();
	LoadPenjualan();
	// Load Morris plugin and run callback for draw Morris charts for dashboard
	LoadMorrisScripts(ChartDashboard);
});
</script>
