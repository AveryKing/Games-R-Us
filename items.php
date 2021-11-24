<?php
include('config.php');


$query = "SELECT * FROM items";
$res = mysqli_query($db, $query);


 while($row = mysqli_fetch_assoc($res)) 
    {
      $products = array("ProductID"=>$row['item_id'],
                        "productName"=>$row['name'],
                        "productDescription"=>$row['description'],
                        "system"=>$row['system'],
                        "price"=>$row['price'],
                        "image"=>$row['image'],
                        "featured"=>$row['featured']
    );
    $products2 = array("products"=>$products);

    echo(json_encode($products2));
?>
