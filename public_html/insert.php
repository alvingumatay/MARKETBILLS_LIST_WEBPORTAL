<?php
include('./includes/db.php');

$id = $_POST['id'];
$product_name = $_POST['product_name'];
$item_no = $_POST['item_no'];
$cost = $_POST['cost'];
$mysqli->query("insert into planbill (id, product_name, item_no, cost) values ('$id','$product_name', '$item_no, $cost')");
$res = $mysqli->query("select id from planbill order by id desc");
$row = $res->fetch_row();
$id = $row[0];
header('location:./user_manager/eGrocer-List.php');
?>