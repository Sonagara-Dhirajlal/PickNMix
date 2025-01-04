<?php

require '../../includes/init.php';

$products = $_POST['products'];
$userid = $_POST['userid']; // User ID should be the same for all products

foreach ($products as $product) {
    $cartid = $product['cartid'];
    $image = $product['Pimage'];
    $name = $product['Pname'];
    $price = $product['Pprice'];
    $total = $product['Ptotal'];

    $query = "INSERT INTO `checkout` (CartId, UserId, PImage, PName, PPrice, PTotal) 
              VALUES ('$cartid', '$userid', '$image', '$name', '$price', '$total')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Checkout failed for product: $name');</script>";
        exit;
    }
}

echo "<script>
    alert('Products successfully checked out');
    window.location.href='" . urlOf('') . "';
</script>";

header("location: ../../pages/checkOut");

?>