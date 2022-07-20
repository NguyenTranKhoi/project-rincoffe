<?php
session_start();
require_once "./../php/confice/glopal.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    unset($_SESSION['cart'][$id]);
    header('Location: '.BASE_URL.'shopping.php');
}