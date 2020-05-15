<?php
include('includes/DB.php');

function checkRequiredField ($value) {
    return isset($value) && !empty($value);
}

if ($_POST) {

    $combo_product= $_POST['meals'];

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $price2 = $_POST['price_supply'];
    $image = $_POST['image'];

    if(checkRequiredField($name) && checkRequiredField($description) && checkRequiredField($image) && checkRequiredField($price) && 1<count($combo_product)){
        $query = oci_parse($conn, "INSERT INTO MENU_ITEMS (MI_NAME, MI_PRICE, MI_DESCRIPTION, MI_SUPPLY_PRICE, MI_IMG, MI_TYPE) 
                      VALUES ('{$name}', {$price},'{$description}',{$price2},'{$image}','combo')");
        oci_execute($query);

        oci_commit($conn);


        $query2=oci_parse($conn, "select * from MENU_ITEMS where  MI_NAME='{$name}'");

        oci_execute($query2);

        $row = oci_fetch_row($query2);

        oci_commit($conn);



        for($i = 0; $i<count($combo_product);$i++)
        {
            $father =(int)$row[0];
            $child = (int)$combo_product[$i];
            $quantity = 1;
            $query3 = oci_parse($conn, "INSERT INTO PACKAGE_LINE (PL_FATHER_ID, PL_CHILD_ID, PL_QUANTITY) 
                      VALUES ({$father}, {$child},{$quantity})");
            oci_execute($query3);
        }

        oci_commit($conn);

        header('Location: products.php');
    }
    else{
        header('Location: error.php');
    };


}