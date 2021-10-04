<?php 

	include 'functions.php';
	$myClass = new myClass();
	$id = $_REQUEST['id'];
	$delete = $myClass->delete($id);

    if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'display.php';</script>";
	}

    

 ?>