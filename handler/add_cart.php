<?php
session_start();
include 'connection_handler.php';
if (isset($_GET['act'])) {
	if ($_GET['act'] == 'cart') {
		if (isset($_GET['id'])) {
			$service_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
			$service_size = filter_var($_POST['service_size'], FILTER_SANITIZE_STRING);
			$results = $mysqli->query("SELECT s.service_id as id, d.service_name as name, s.service_size as size, s.service_price as price from service s right join service_det d on d.service_ID = s.service_ID where md5(s.service_id) =  '$service_id' AND md5(s.service_size)= '$service_size' LIMIT 1");
			$obj = $results->fetch_object();

			if ($results) {
				$new_transaksi = array(array('service_id' => $obj->id, 'service_name' => $obj->name, 'service_size' => $obj->size,
					'service_price' => $obj->price));
				if (isset($_SESSION['transaksi'])) {

					$found = false;
					foreach ($_SESSION['transaksi'] as $cart) {
						if (($obj->id == $cart['service_id']) && ($obj->size == $cart['service_size'])) {
							$service[] = array('service_id' => $cart['service_id'], 'service_name' => $cart['service_name'], 'service_size' => $cart['service_size'],
								'service_price' => $cart['service_price']);
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
					} else {
						$_SESSION["transaksi"] = $service;
					}
				} else {

					$_SESSION["transaksi"] = $new_transaksi;
					echo "Service berhasil ditambahkan";
				}
			}

			//end of if

		}
	}
}

?>