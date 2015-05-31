<div class="col-md-3">
	<h4>Services</h4>
	<div class="list-group">
		<?php
			$sql="select service_name from service_det";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo '<a href="index.php?f='.$row["service_name"].'" class="list-group-item">'.$row["service_name"].'</a>';
				}
			} else {
				echo "0 results";
			}
		?>
	</div>
</div>