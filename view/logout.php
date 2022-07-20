<?php
require_once "./../php/confice/glopal.php";
// đăng xuất thông tin khách hàng
session_start();
if (isset($_SESSION['user_login'])) {
    unset($_SESSION['user_login']);
    header('location: '.BASE_URL.'home.php');
}

?>