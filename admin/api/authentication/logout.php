<?php

session_name('picknmix_admin');
session_start();
session_destroy();
header("Location: http://localhost/picknmix/admin/pages/authentication/login");

?>