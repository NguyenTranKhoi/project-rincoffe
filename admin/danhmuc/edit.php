<?php
session_start();
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if (isset($_GET['iddm'])) {
    $iddm = $_GET['iddm'];

    $sql = "SELECT * FROM `danh_muc` WHERE `iddm`=$iddm";
    $data_list = return_array($sql);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $name_cate != ''
    ) {
        $sql = "UPDATE `danh_muc` SET `name_cate`='$name_cate' WHERE `iddm`='$iddm'";
        open_close_sql($sql);
        header('Location: ' . BASE_ADMIN . 'admin_dm.php');
    } else {
        $_SESSION['error'] = 'Khum được để trống';
        header('location: ' . BASE_ADMIN . 'admin_dm.php');
        die();
    }
}

require_once "../../admin/layout_admin/header.php";

?>

<h5 style="color: red;"><?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?></h5>


<div class="container" style="max-width:500px;margin:auto">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên</label>
            <input type="text" value="<?= $data_list[0]['name_cate'] ?>" name="name_cate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>


<?php
require_once "../../admin/layout_admin/footer.php";
?>