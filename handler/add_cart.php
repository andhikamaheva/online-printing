<?php
session_start();
include 'connection_handler.php';

if (isset($_GET['act'])) {
	if ($_GET['act'] == 'cart') {
		if (isset($_GET['id'])) {
			$service_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
			$service_size = filter_var($_POST['service_size'], FILTER_SANITIZE_STRING);
			$query = 'select s.service_id as id, d.service_name as name, s.service_size as size, s.service_price as price from service s right join service_det d on d.service_ID = s.service_ID where md5(s.service_id) = "' . $service_id . '" and md5(s.service_size) = "' . $service_size . '"';
			$result = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_assoc($result)) {

					$new_transaksi = array(array('service_id' => $row['id'], 'service_name' => $row['name'], 'service_size' => $row['size'],
						'service_price' => $row['price']));

					if (isset($_SESSION['transaksi'])) {

						$found = false;
						foreach ($_SESSION['transaksi'] as $cart) {
							if ($cart['service_id'] == $row['service_id']) {
								echo "Service telah ada. Pilih service lainnya";
								$found = true;
							} else {
								$service[] = array('service_id' => $cart['service_id'], 'service_name' => $cart['service_name'], 'service_size' => $cart['service_size'],
									'service_price' => $cart['service_price']);
							}
						}
						if ($found == false) {
							$_SESSION["transaksi"] = array_merge($new_transaksi, $service);
							echo "Service berhasil ditambahkan";
						}
					} else {

						$_SESSION["transaksi"] = $new_transaksi;
						echo "Service berhasil ditambahkan";
					}
				}
			} else {
				echo "gagal";
			}
		}
	}
}

?>