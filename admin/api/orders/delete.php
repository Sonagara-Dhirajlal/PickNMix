<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query1="DELETE FROM `OrderDetails` WHERE OrderId='$id'";
$result1 = mysqli_query($conn, $query1);

$query="DELETE FROM `Order` WHERE ID = '$id' ";
$result = mysqli_query($conn, $query);


if($result && $result1){
    echo "<script>
        alert('Order deleted successfully');
        window.location.href='".urlOf('pages/orders/orderList')."';
    </script>";
}else{
    echo "<script>
        alert('Failed to delete Order');
        window.location.href='".urlOf('pages/orders/orderList')."';
    </script>";
}



?>