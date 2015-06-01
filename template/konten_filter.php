<?php
session_start();
if(isset($_GET['f'])){
	$konten_filter=$_GET['f'];
	if($konten_filter=='All'){
		echo '<h4 class="konten-filter-title">All Services</h4>';
		$sql = "SELECT sd.service_name, max(s.service_price) as maxsp, min(s.service_price) as minsp, g.gambar as gbr
		FROM service s join service_det sd on s.service_ID=sd.service_ID left join gambar g on sd.service_ID=g.service_det_id
		group by sd.service_name";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo '	<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<div class="caption">
						<center>';
							if($row['gbr']==null){
								echo '<img src="img/logo-200.png" style="min-height:200px;min-width:200px" class="foto-konten img-responsive">';
							}else{
								echo '<img style="min-height:200px;min-width:200px" class="foto-konten img-responsive" src="data:image/png;base64,'.base64_encode($row['gbr']).'" class="foto-konten">';
							}
							echo '<h4><a href="index.php?f='.$row["service_name"].'">'.$row["service_name"].'</a></h4>';
							if($row["maxsp"] == $row["minsp"]){
								echo '<h4>Rp '.number_format($row["minsp"],0,"",".").'</h4>';
							}
							else {
								echo '<h4>Rp '.number_format($row["minsp"],0,"",".").' - '.number_format($row["maxsp"],0,"",".").'</h4>';	
							}
							echo '
						</center>
					</div>
				</div>
			</div>
			';
		}
	} else {
		echo "0 results";
	}
}else{
	$sql="SELECT sd.service_name, s.service_price, s.service_size from service_det sd join service s on sd.service_ID=s.service_ID where service_name='".$konten_filter."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo '	<h4 class="konten-filter-title">'.$konten_filter.'</h4>
		<div class="col-sm-12 col-lg-12 col-md-12">
			<div class="col-sm-6 col-lg-6 col-md-6 thumbnail">
				<table width="100%" style="margin-left:10%; margin-top:10px; margin-bottom:10px;"><tr><td><b>Ukuran</b></td><td><b>Harga</b></td></tr>';
					while($row = mysqli_fetch_assoc($result)) {
						echo '<tr><td>'.$row["service_size"].'</td><td>Rp '.number_format($row["service_price"],0,"",".").'</td></tr>';
					}
					echo '	</table><hr>
					<div style="margin-left:10%; margin-top:10px; margin-bottom:10px;"><strong>Product Description :</strong></div>
					<hr>
					<form method="post" class="form-inline" style="margin-left:10%; margin-top:10px; margin-bottom:10px;">
						<div class="form-group">
						<div class="col-lg-8 col-md-3 col-sm-3">
							<div class="input-group">
							<div class="input-group-addon">Qty</div>
								<input type="text" class="form-control"  id="exampleInputAmount" placeholder="">
							</div>
						</div>
						</div>
						<div class="form-group">
						<div class="col-lg-5">
							<button class="btn btn-success btn-sm">add to cart</button>
						</div>
						</div>
					</form>

				</div>
				<div class="col-sm-5 col-lg-5 col-md-5 thumbnail" style="margin-left:5%;">
					<img src="img/logo-200.png" class="foto-konten">
				</div>
			</div>';
		}else{
			header("location:index.php?f=All");
		}
	}
}else{
	header("location:index.php?f=All");
}
?>
