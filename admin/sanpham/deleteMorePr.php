<?php 
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";
if(!empty($_POST)){
    $dataCheck = $_POST['id_check'];  
    foreach($dataCheck as $key => $value){
        $queryDelete = "DELETE FROM `san_pham` WHERE `id` = $value";
        open_close_sql($queryDelete);
    }
    header('location:  ' . BASE_ADMIN . 'admin_list.php');
}