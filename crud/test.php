<?php
$id=$_GET['id'];
$name=$_GET['name'];
echo json_encode(["id"=>$id,"name"=>$name]);
?>