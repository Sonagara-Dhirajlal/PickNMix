<?php

require '../../includes/init.php';

$id=$_POST['id'];
$role=$_POST['role'];

$query="UPDATE `role` SET Rolename='$role' WHERE Id='$id'";

$result=mysqli_query($conn,$query);

if ($result){
    echo "<script>
        alert('Role updated successfully');
        window.location.href='".urlOf('pages/role/roleList')."';
    </script>";
}else{
    echo "<script>
    alert('Role not Updated');
    window.location.href='".urlOf('pages/role/roleList')."';
    </script>";
}

?>