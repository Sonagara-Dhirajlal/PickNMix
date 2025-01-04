<?php

require '../../includes/init.php';

$userid=$_POST['userid'];
$name=$_POST['name'];
$email=$_POST['email'];
$review=$_POST['review'];

$query="INSERT INTO `review`(`UserId`, `Name`, `Email`, `Review`) VALUES('$userid', '$name', '$email', '$review')";

$result=mysqli_query($conn,$query);

if($result){
    echo "<script>
    alert('Review added successfully');
    window.location.href='".urlOf('pages/testimonial')."';
    </script>";
}else{
    echo "<script>
    alert('Failed to add review');
    window.location.href='".urlOf('pages/shopDetails')."';
    </script>";
}

?>