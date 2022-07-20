<?php
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if (isset($_GET['cmtt_id'])) {
    $cmtt_id = $_GET['cmtt_id'];

    $sql = "DELETE FROM `comment` WHERE `cmtt_id`=$cmtt_id";
    open_close_sql($sql);
    header('location: ' . BASE_ADMIN . 'admin_bl.php');
}
