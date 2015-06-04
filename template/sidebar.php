<div class="col-md-3">
	<h4>Services</h4>
<<<<<<< HEAD
	<div class="list-group" style="max-height:500px;overflow-x:auto">
		<?php
			$sql="select service_name from service_det order by service_name";
=======
	<div class="list-group">
		<?php
			$sql="select service_name from service_det";
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if(isset($_GET['f'])){
<<<<<<< HEAD
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
=======
					$konten_filter=$_GET['f'];
					$active = $row['service_name'];
					if($konten_filter==$active){
					echo '<a href="index.php?f='.$row["service_name"].'" class="list-group-item active">'.$row["service_name"].'</a>';
					}
					else{
					echo '<a href="index.php?f='.$row["service_name"].'" class="list-group-item">'.$row["service_name"].'</a>';	
					}
				}
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
				}
			} else {
				echo "0 results";
			}
		?>
	</div>
<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
