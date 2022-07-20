<?php
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `san_pham` WHERE `id`=$id";
    open_close_sql($sql);
    header('location: ' . BASE_ADMIN . 'admin_list.php');
}
