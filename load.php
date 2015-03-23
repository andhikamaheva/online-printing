<?php
include 'routers.php';

if (isset($_GET['do'])){
	if($_GET['do']=='about'){
		$routes = new routes();
		$routes->setTitle('Tentang Saya');
		$routes->setTemplates('index2.php');
		$routes->setContent('about.php');
	}
}
?>