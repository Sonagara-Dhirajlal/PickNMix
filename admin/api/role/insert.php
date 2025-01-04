<?php

require '../../includes/init.php';


$role=$_POST['role'];

$query="INSERT INTO role(rolename) VALUES('$role')";

$result=mysqli_query($conn,$query);

if($result){
    echo "<script>
    alert('Role added successfully');
    window.location.href='".urlOf('pages/role/roleList')."';
    </script>";

}else{
     echo "<script>
    alert('Failed to add role');
    windowa.location.href='".urlOf('pages/role/addRole')."';
    </script>";

}

?>