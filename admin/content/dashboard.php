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
					<div class="col-xs-12">
						<h4 class="page-header">PENJUALAN</h4>
						<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
							<thead>
								<tr>
									<th>Layanan</th>
									<th>Perubahan</th>
									<th>Mingguan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="m-ticker"><b>BRDM</b><span>Broadem Inc.</span></td>
									<td class="m-change"><i class="fa fa-angle-up"></i> 1.45 (27&#37;)</td>
									<td class="td-graph"></td>
								</tr>
								<tr>
									<td class="m-ticker"><b>ASWLL</b><span>Aswell Corp.</span></td>
									<td class="m-change"><i class="fa fa-angle-up"></i> 6.32 (12&#37;)</td>
									<td class="td-graph"></td>
								</tr>
								<tr>
									<td class="m-ticker"><b>MIXL</b><span>Mixal LTD.</span></td>
									<td class="m-change"><i class="fa fa-angle-down"></i> 7.2 (12&#37;)</td>
									<td class="td-graph"></td>
								</tr>
								<tr>
									<td class="m-ticker"><b>LMPRD</b><span>L.A. Prod.</span></td>
									<td class="m-change"><i class="fa fa-angle-up"></i> 5.3 (18&#37;)</td>
									<td class="td-graph"></td>
								</tr>
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
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">Total Permintaan<b>1245634</b></div>
								</div>
								<div class="row">
									<div class="col-xs-12">Total Proses<b>1245634</b></div>
								</div>
								<div class="row">
									<div class="col-xs-12">Total Penolakan<b>227</b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="ow-donut" class="row">
					<div class="col-xs-12">
						<h4 class="page-header">&Sigma; RINGKASAN</h4>
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
		<div id="dashboard-clients" class="row" style="visibility: hidden; position: absolute;">
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-users"></i></div>
				<div class="col-xs-2"><b>Nama</b></div>
				<div class="col-xs-2">Diterima</div>
				<div class="col-xs-2">Ditolak</div>
				<div class="col-xs-2">Pemasukan</div>
				<div class="col-xs-3">Terakhir</div>
			</div>
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-user"></i></div>
				<div class="col-xs-2"><b>USA</b></div>
				<div class="col-xs-2">109455</div>
				<div class="col-xs-2">54322344</div>
				<div class="col-xs-2"><i class="fa fa-usd"></i> 354563</div>
				<div class="col-xs-2 message-date">12/31/13</div>
			</div>
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-user"></i></div>
				<div class="col-xs-2"><b>U.K.</b></div>
				<div class="col-xs-2">86549</div>
				<div class="col-xs-2">43242344</div>
				<div class="col-xs-2"><i class="fa fa-usd"></i> 265563</div>
				<div class="col-xs-2 message-date">12/25/13</div>
			</div>
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-user"></i></div>
				<div class="col-xs-2"><b>FRANCE</b></div>
				<div class="col-xs-2">79399</div>
				<div class="col-xs-2">45376844</div>
				<div class="col-xs-2"><i class="fa fa-usd"></i> 309456</div>
				<div class="col-xs-2 message-date">12/30/13</div>
			</div>
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-user"></i></div>
				<div class="col-xs-2"><b>GERMANY</b></div>
				<div class="col-xs-2">94567</div>
				<div class="col-xs-2">35322344</div>
				<div class="col-xs-2"><i class="fa fa-usd"></i> 301040</div>
				<div class="col-xs-2 message-date">12/26/13</div>
			</div>
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-user"></i></div>
				<div class="col-xs-2"><b>CANADA</b></div>
				<div class="col-xs-2">89525</div>
				<div class="col-xs-2">1342344</div>
				<div class="col-xs-2"><i class="fa fa-usd"></i> 298764</div>
				<div class="col-xs-2 message-date">12/30/13</div>
			</div>
			<div class="row one-list-message">
				<div class="col-xs-1"><i class="fa fa-user"></i></div>
				<div class="col-xs-2"><b>CHINA</b></div>
				<div class="col-xs-2">120865</div>
				<div class="col-xs-2">43522344</div>
				<div class="col-xs-2"><i class="fa fa-usd"></i> 776563</div>
				<div class="col-xs-2 message-date">12/29/13</div>
			</div>
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
// Array for random data for Sparkline
var sparkline_arr_1 = SparklineTestData();
var sparkline_arr_2 = SparklineTestData();
var sparkline_arr_3 = SparklineTestData();
$(document).ready(function() {
	// Make all JS-activity for dashboard
	DashboardTabChecker();
	// Load Knob plugin and run callback for draw Knob charts for dashboard(tab-servers)
	LoadKnobScripts(DrawKnobDashboard);
	// Load Sparkline plugin and run callback for draw Sparkline charts for dashboard(top of dashboard + plot in tables)
	LoadSparkLineScript(DrawSparklineDashboard);
	// Load Morris plugin and run callback for draw Morris charts for dashboard
	LoadMorrisScripts(MorrisDashboard);
	// Make beauty hover in table
	$("#ticker-table").beautyHover();
});
</script>
