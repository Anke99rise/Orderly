<?php
include('includes/DB.php');

if ($_POST) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $price2 = $_POST['price_supply'];
    $id = $_POST['id'];
    $image = $_POST['image'];
    echo $image;


    $query = oci_parse($conn,  "UPDATE MENU_ITEMS set MI_NAME='$name', MI_DESCRIPTION='$description', MI_PRICE={$price}, MI_SUPPLY_PRICE={$price2}, MI_IMG='{$image}' where MI_ID={$id}");


    oci_execute($query);
    oci_commit($conn);

    header('Location: single_product.php?id='.$id);

}