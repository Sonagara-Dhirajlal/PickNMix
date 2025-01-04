<?php

require '../../includes/init.php';

$userid=$_POST['userid'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$message=$_POST['message'];

$query="INSERT INTO `contact`(`UserId`, `Name`, `Mobile`, `Email`, `Message`) VALUES('$userid', '$name', $mobile, '$email', '$message')";

$result=mysqli_query($conn,$query);

if($result){
    echo "<script>
    alert('Contact added successfully');
    window.location.href='" . urlOf('') . "';
</script>";

}else{
    echo "<script>
    alert('Contact failed');
    window.location.href='" . urlOf('') . "';
    </script>";
}


?>