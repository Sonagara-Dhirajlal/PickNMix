<?php  

require '../../includes/init.php';

$userid=$_GET['userid'];
$status="Delivered";

$query = "UPDATE `order` SET `delivery_status` = '$status', `deliveryDate` = NOW() WHERE `UserId` = '$userid'";

$result=mysqli_query($conn,$query);

if($result){
    echo "<script>
    alert('Order delivered successfully');
    window.location.href='../../admin/index';
    </script>";
}else{
    echo "<script>
    alert('Failed to deliver order');
    window.location.href='../../admin/index';
    </script>";
}

?>