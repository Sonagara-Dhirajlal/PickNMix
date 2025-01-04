<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM review WHERE Id='$id'";

$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
        alert('Review deleted successfully');
        window.location.href='".urlOf('pages/customer/review')."';
    </script>";
}else{
    echo "<script>
        alert('Failed to delete Review');
        window.location.href='".urlOf('pages/customer/review')."';
    </script>";
}



?>