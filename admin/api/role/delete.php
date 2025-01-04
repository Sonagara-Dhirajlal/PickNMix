<?php

require "../../includes/init.php";

$id=$_GET['deleteId'];

$query = "DELETE FROM `role` WHERE Id=$id";

$result = mysqli_query($conn, $query);

if($result){
    echo "<script>
        alert('Role deleted successfully');
        window.location.href='".urlOf('pages/role/roleList')."';
    </script>";
}else{
    echo "<script>
        alert('Failed to delete role');
        window.location.href='".urlOf('pages/role/roleList')."';
    </script>";
}

?>