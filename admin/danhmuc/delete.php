<?php
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if (isset($_GET['iddm'])) {
    $iddm = $_GET['iddm'];

    $sql = "DELETE FROM `danh_muc` WHERE `iddm`=$iddm";
    open_close_sql($sql);
    header('location: ' . BASE_ADMIN . 'admin_dm.php');
}
