<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM `OrderDetails` WHERE ID = '$id' ";

$result = mysqli_query($conn, $query);

if($result){
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