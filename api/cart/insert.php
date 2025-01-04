<?php
require '../../includes/init.php';

// Retrieve and escape POST data
$userId = mysqli_real_escape_string($conn, $_POST['userid']);
$productImage = mysqli_real_escape_string($conn, $_POST['image']);
$productName = mysqli_real_escape_string($conn, $_POST['name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);

$sql = "INSERT INTO `cart` (UserId, Name, Image, price) 
        VALUES ('$userId', '$productName', '$productImage', '$price')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('product added to cart Success');
        window.location.href='" . urlOf('') . "';
    </script>";
} else {
    echo 'Error: ' . mysqli_error($conn);
}
?>
