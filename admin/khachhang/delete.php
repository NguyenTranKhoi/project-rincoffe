<?php
require_once "../../php/confice/glopal.php";
require_once "../../php/confice/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `khanh_hang` WHERE `id_kh`=$id";
    open_close_sql($sql);
    header('location: ' . BASE_ADMIN . 'admin_kh.php');
}
