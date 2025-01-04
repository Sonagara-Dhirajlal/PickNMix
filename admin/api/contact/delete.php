<?php

require '../../includes/init.php';

$id=$_GET['deleteId'];

$query="DELETE FROM contact WHERE Id='$id'";

$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
        alert('Contact deleted successfully');
        window.location.href='".urlOf('pages/customer/contact')."';
    </script>";
}else{
    echo "<script>
        alert('Failed to delete Contact');
        window.location.href='".urlOf('pages/customer/contact')."';
    </script>";
}



?>