<?php
if(isset($_COOKIE['admin'])){
require_once 'model/admin.php';
$admin=new Admin();
$admin->logoff();
}else{
	require_once 'model/cliente.php';
	$cliente=new cliente();
	$cliente->logoff();
}
header("Location:index.php");
?>