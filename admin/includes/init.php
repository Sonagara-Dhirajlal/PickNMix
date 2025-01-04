
<?php

define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/picknmix/admin");
define("BASE_URL", "/picknmix/admin");

date_default_timezone_set('Asia/Kolkata');

$conn = mysqli_connect("localhost","root", "","Picknmix");

function pathOf($path)
{
    return BASE_DIR . "/" . $path;
}

function urlOf($path)
{
    return BASE_URL . '/' . $path;
}
