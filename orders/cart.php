<?php
session_start();
include('../includes/DB.php');

if(!isset($_SESSION['id']) or $_SESSION['type']==1)
{
    header('Location: ../index.php');
    exit();
}

if(isset($_SESSION['products'])){
    $total_price=0;
}
$title='Your cart';

?>
<!doctype html>
<html lang="en">
<head>
    <?php include('../includes/head.php') ?>
    <link rel="stylesheet" href="../styles/stil.css">
    <link rel="stylesheet" href="../styles/products.css">
    <link rel="stylesheet" href="../styles/cart.css">
</head>

<body>
<?php include('../includes/header.php') ?>

<div id="helping"></div>

<div class="wrap2 jumbotron">
    <a href="../products/products/products.php"><h3 id="continue">Continue shopping</h3></a>
<?php if($_SESSION['isUpdate']){?>
<div class="up"><p>Cart updated!</p></div>
<?php }?>
</div>

<?php if(!isset($_SESSION['products']) or is_null($_SESSION['products']) or count($_SESSION['products'])==0){ ?>
    <div class="wrap"><h1 class="up">Shopping cart is empty!</h1></div>

<?php } else if(isset($_SESSION['products'])){ ?>
<h1 id="naslov3">Products in your cart:</h1>
<section class="wrap" id="s3">
    <?php foreach($_SESSION['products'] as $item):?>
        <?php
        $query = oci_parse($conn, "select * from MENU_ITEMS where MI_ID ='{$item[0]}'");
        oci_execute($query);
        $row=oci_fetch_assoc($query);
        $total_price+=$row['MI_PRICE']*$item[1];
        ?>
        <div class="container">
            <div class="container2">
                <form method="post" action="updatecart.php?ID=<?php echo $row['MI_ID']; ?>">
                    <a href="../products/<?= $row['MI_TYPE']=='single'? 'products' : 'combos'  ?>/single_<?= $row['MI_TYPE']=='single'? 'product' : 'combo'  ?>.php?id=<?= $row['MI_ID'] ?>" class="info-more">
                        <img src="../images/<?=$row['MI_IMG']?>">
                        <p><?= $row['MI_NAME'] ?></p>
                        <p>Price: <?= number_format($row['MI_PRICE'],2)?>KM</p>
                    </a>
                    <input type="number" class="product-quantity" name="quantity" value="<?=$item[1]?>" min="1"/>
                    <input type="submit" value="Update cart" class="btnAddAction" />
                    <a href="deletefromcart.php?ID=<?php echo $row['MI_ID']; ?>" id="del">Delete from cart</a>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</section>
    <div class="car"><h1>Total price: <span style="color:red"><?=$total_price?> KM</span></h1></div>
    <div class="car" <h1><a href="checkout.php?total=<?=$total_price?>" onclick="return confirm('Are you sure? Order will be placed');" class="place">Place your order</a></h1></div>
<?php }?>


<?php include('../includes/footer.php') ?>


<?php $_SESSION['isUpdate']=null;?>
</body>
</html>