<?php
	include 'db/db_config.php';
	$id = $_GET['id'];
	if( $db->delete('hasil_spk')->count() == 1 || $db->delete('hitung')->count() == 1){
		header('location:index.php');
	} else {
		header('location:index.php');
	}
?>