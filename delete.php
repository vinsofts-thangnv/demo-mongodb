<?php
	use MongoDB\Client;
	require "vendor/autoload.php";
	$con= new Client();
	$db= $con->demo;
    $coll=$db->user;	
    if(isset($_GET['id']) and ($_GET['id']!="")){
        $coll->deleteOne([_id=> new MongoDB\BSON\ObjectID($_GET['id'])]);
        header("location:index.php");
    }	
?>