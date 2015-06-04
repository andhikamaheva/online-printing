<div class="col-md-9">
			
	<div class="row">
		<?php
			session_start();
			echo '<h4 class="konten-filter-title">All Services</h4>';
			$sql = "SELECT sd.service_name, max(s.service_price) as maxsp, min(s.service_price) as minsp, g.gambar as gbr
			FROM service s join service_det sd on s.service_ID=sd.service_ID left join gambar g on sd.service_ID=g.service_det_id
			group by sd.service_name";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo '	
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								<div class="caption">
									<center>';
										if($row['gbr']==null){
											echo '	<a href="produk.php?f='.$row["service_name"].'">
													<img src="img/logo-200.png" style="min-height:200px;min-width:200px" 
													class="foto-konten img-responsive"></a>';
										}else{
											echo '	<a href="produk.php?f='.$row["service_name"].'" class="img-responsive">
													<img src="data:image/png;base64,'.base64_encode($row['gbr']).'" style="min-height:200px;min-width:200px" 
													class="foto-konten "></a>';
										}
										echo '<h4><a href="produk.php?f='.$row["service_name"].'">'.$row["service_name"].'</a></h4>';
										if($row["maxsp"] == $row["minsp"]){
											echo '<h4>Rp '.number_format($row["minsp"],0,"",".").'</h4>';
										}
										else {
											echo '<h4>Rp '.number_format($row["minsp"],0,"",".").' - Rp '.number_format($row["maxsp"],0,"",".").'</h4>';	
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
		?>
	</div>
</div>