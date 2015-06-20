<?php
session_start();
if (isset($_GET['f']) or isset($_GET['logout'])) {
	$konten_filter = $_GET['f'];
	if ($konten_filter == 'about') {
		include "../halaman/about.php";
	} elseif ($konten_filter == 'contact') {
		include "../halaman/contact.php";
	} else {
		include "../handler/connection_handler.php";
		$sql = "SELECT s.service_id, sd.service_name, sd.service_desc, s.service_price, s.service_size 
		from service_det sd join service s on sd.service_ID=s.service_ID where service_name='" . $konten_filter . "'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo '	<h4 class="konten-filter-title">' . $konten_filter . '</h4>
		<div class="col-sm-12 col-lg-12 col-md-12">

			<div class="col-sm-6 col-lg-6 col-md-6 thumbnail panel-primary">

				<table width="100%" style="margin-left:10%; margin-top:10px; margin-bottom:10px;">
					<tr>
						<td width="20%"><b>Ukuran</b></td>
						<td width="20%"><b>Harga</b></td>
						<td width="50%"><b>Jumlah</b></td>
					</tr>';

			while ($row = mysqli_fetch_assoc($result)) {
				echo '<tr>
						<td>' . $row["service_size"] . '</td>
						<td>Rp ' . number_format($row["service_price"], 0, "", ".") . '</td>
						<td style="padding-top:5px;">
							<input type="number" value="1" min="0" id="qty'. md5($row['service_size']) .'"/>
							<button class="btn btn-success btn-sm" onclick=addCart("' . md5($row['service_id']) . '","' . md5($row['service_size']) . '")>add to cart</button>
						</td>
					</tr>';
				$desc = $row['service_desc'];
			}
			echo '
				</table>

				<hr>
				<div style="margin-left:10%; margin-top:10px; margin-bottom:10px;">
					<strong>Product Description :</strong>
					<p>';
			if ($desc != NULL) {
				echo $desc;
			} else {
				echo "Service Description is not available yet!";
			}
			echo '</p>
					</div>
				</div>
				
				<div class="col-sm-5 col-lg-5 col-md-5 thumbnail panel-primary" style="margin-left:5%">';
			//Foto-------------------------------------------------------------------------------
			$sql = "SELECT g.gambar as gbr from gambar g join service_det sd on g.service_det_id=sd.service_ID where sd.service_name='" . $konten_filter . "'";
			$result = mysqli_query($conn, $sql);
			$z = 0;
			if (mysqli_num_rows($result) > 1) {
				echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">';
				$x = 0;
				while ($row = mysqli_fetch_assoc($result)) {
					if ($x == 0) {
						echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
					} else {
						echo '<li data-target="#myCarousel" data-slide-to="' . $x . '"></li>';
					}
					$x = $x + 1;
				}
				echo '</ol>
							<div class="carousel-inner" role="listbox">';
				$sql = "SELECT g.gambar as gbr from gambar g join service_det sd on g.service_det_id=sd.service_ID where sd.service_name='" . $konten_filter . "'";
				$result = mysqli_query($conn, $sql);
				$x = 0;
				while ($row = mysqli_fetch_assoc($result)) {
					if ($x == 0) {
						echo '<div class="item active"><center>';
					} else {
						echo '<div class="item"><center>';
					}
					if ($row['gbr'] == null) {
						echo '	<img style="min-height:200px;min-width:200px; width:100%;"
										src="img/logo-200.png" class="foto-det img-responsive">';
					} else {
						echo '	<img style="min-height:200px;min-width:200px width:100%;"
										src="data:image/png;base64,' . base64_encode($row['gbr']) . '" class="foto-det img-responsive">';
					}
					echo '</center></div>';
					$x = $x + 1;
				}

				echo '</div>
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>

							';
			} else if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				echo '<center>';
				echo '	<img style="min-height:200px;min-width:200px; margin:5%;"
							src="data:image/png;base64,' . base64_encode($row['gbr']) . '" class="foto-det img-responsive">';
				echo '</center>';
			} else {
				echo '<center>';
				echo '	<img style="min-height:200px;min-width:200px; margin:5%;"
							src="img/logo-200.png" class="foto-det img-responsive">';
				echo '</center>';
			}
			echo '</div>
					</div>';
		}
	}
}mysqli_close($conn);
?>
