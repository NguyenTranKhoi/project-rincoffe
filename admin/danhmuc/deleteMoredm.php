<?php 
require_once "../../php/confice/glopal.php";
require_once "../../php/confice/db.php";

if(!empty($_POST)){
    $dataCheck = $_POST['id_check'];  
    foreach($dataCheck as $key => $value){
        $queryDelete = "DELETE FROM `danh_muc` WHERE `iddm` = $value";
        open_close_sql($queryDelete);
    }
    header('location:  ' . BASE_ADMIN . 'admin_dm.php');
}