<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM `cart` WHERE Id=$id";

$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
        alert('Product removed from cart successfully');
        window.location.href='".urlOf('pages/cart')."';
    </script>";
}else{
    echo "<script>
        alert('Failed to remove product from cart');
        window.location.href='".urlOf('pages/cart')."';
    </script>";
}

?>