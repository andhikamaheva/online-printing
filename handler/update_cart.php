<?php
session_start();
include "connection_handler.php";
if (isset($_GET['act'])) {
	if ($_GET['act'] == 'delete') {
		if (isset($_GET['id'])) {
			$service_id = $_GET["id"];
			$service_size = $_POST["service_size"];
			$qty=0;
			$results = $mysqli->query("SELECT service_id, service_size from service where md5(service_id) = '$service_id' and md5(service_size) = '$service_size'");
			$obj = $results->fetch_object();
			if ($results) {
				foreach ($_SESSION["transaksi"] as $cart) {
					if (($obj->service_id != $cart["service_id"]) or ($obj->service_size != $cart['service_size'])) {
						$qty=$cart["service_qty"];
						$service[] = array('service_id' => $cart['service_id'], 'service_name' => $cart['service_name'], 'service_size' => $cart['service_size'],
							'service_price' => $cart['service_price'], 'service_qty' => $qty);
					}

					$_SESSION["transaksi"] = $service;
				}
			}
		}
	} else if ($_GET['act'] == 'destroy') {
		$_SESSION["transaksi"] = $service;
	}
}

?>