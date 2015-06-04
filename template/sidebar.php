<div class="col-md-3">
	<h4>Services</h4>
	<div class="list-group" style="max-height:500px;overflow-x:auto">
		<?php
			$sql="select service_name from service_det order by service_name";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if(isset($_GET['f'])){
						$konten_filter=$_GET['f'];
						$active = $row['service_name'];
						if($konten_filter==$active){
						echo '<a href="produk.php?f='.$row["service_name"].'" class="list-group-item active">'.$row["service_name"].'</a>';
						}
						else{
						echo '<a href="produk.php?f='.$row["service_name"].'" class="list-group-item">'.$row["service_name"].'</a>';	
						}
					}else{
						echo '<a href="produk.php?f='.$row["service_name"].'" class="list-group-item">'.$row["service_name"].'</a>';
					}
				}
			} else {
				echo "0 results";
			}
		?>
	</div>
</div>
