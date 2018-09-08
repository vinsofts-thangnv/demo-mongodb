<?php
	use MongoDB\Client;
	require "vendor/autoload.php";
	$con= new Client();
	$db= $con->demo;
    $coll=$db->user;
    if( isset($_SERVER['REQUEST_METHOD']) and ($_SERVER['REQUEST_METHOD']=="POST") and ($_POST['usernameModal']!="") and ($_POST['passwordModal']!="")){
        $coll->updateOne([_id=> new MongoDB\BSON\ObjectID($_POST['idModal'])],['$set'=>[username=>$_POST['usernameModal'],password=>$_POST['passwordModal']]]);
        header("location:index.php");
    }else{
        echo "Error";
    }
?>