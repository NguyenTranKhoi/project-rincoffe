<?php
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if (isset($_GET['id'])) {
    $id_kh = $_GET['id'];

    $sql = "SELECT * FROM `khanh_hang` WHERE `id_kh`=$id_kh";
    $data_list = return_array($sql);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);


    $sql = "UPDATE `khanh_hang` SET `kich_hoat`='$kich_hoat'
    WHERE `id_kh`=$id_kh";
    open_close_sql($sql);
    header('Location: ' . BASE_ADMIN . 'admin_kh.php');
}

require_once "../../admin/layout_admin/header.php";

?>

<form method="post" enctype="multipart/form-data">
    <select class="form-select" name="kich_hoat" aria-label="Default select example">
        <option value="1" <?php if ($data_list[0]['kich_hoat'] == 1) {
                                echo "selected";
                            } ?>>Kích hoạt</option>
        <option value="2" <?php if ($data_list[0]['kich_hoat'] == 2) {
                                echo "selected";
                            } ?>>Ngừng kích hoạt</option>
    </select>
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>

<?php
require_once "../../admin/layout_admin/footer.php";
?>