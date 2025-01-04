<?php

session_name('picknmix_admin');
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: http://localhost/picknmix/admin/pages/authentication/login");

    exit();
}

?>