<?php
session_start();
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `san_pham` WHERE `id`=$id";
    $data_list = return_array($sql);
}
// dd($data_list);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $name != '' || $price != '' || $iddm != '' || $name_phu != ''
    ) {
        if (isset($_FILES['img'])) {
            $file = $_FILES['img'];
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], 'image/' . $file_name);

            if ($file['name'] == '') {
                $file_name = $data_list[0]['img'];
                move_uploaded_file($file['tmp_name'], 'image/' . $file_name);
            }
        }

        $sql = "UPDATE `san_pham` SET `name`='$name',`price`='$price',`img`='$file_name',`iddm`='$iddm',`name_phu`='$name_phu',`trang_thai`='$trang_thai'
        WHERE `id`='$id'";
        open_close_sql($sql);
        header('Location: ' . BASE_ADMIN . 'admin_list.php');
    } else {
        $_SESSION['error']  = "Khum được để trống!";
        header('Location: ' . BASE_ADMIN . 'admin_list.php');
        die();
    }
}

require_once "../../admin/layout_admin/header.php";

?>

<div class="container" style="max-width:500px;margin:auto">
    <h4 style="color: red;"><?php if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            } ?></h4>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên</label>
            <input type="text" name="name" value="<?= $data_list[0]['name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Giá</label>
            <input type="text" name="price" value="<?= $data_list[0]['price'] ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
            <input type="file" name="img" value="<?= $data_list[0]['img'] ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên phụ</label>
            <input type="text" name="name_phu" value="<?= $data_list[0]['name_phu'] ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <label for="exampleInputPassword1" class="form-label">Danh mục</label>
        <?php
        $querydm = "SELECT * FROM `danh_muc`";
        $datadm = return_array($querydm);

        ?>
        <select class="form-select" name="iddm" value="<?= $data_list[0]['iddm'] ?>" aria-label="Default select example">
            <?php
            foreach ($datadm as $key) { ?>
                <option value="<?= $key['iddm'] ?>" selected><?= $key['name_cate'] ?></option>
            <?php } ?>
        </select>
        <label for="exampleInputPassword1" class="form-label">Trạng thái</label>
        <select class="form-select" name="trang_thai" aria-label="Default select example">
            <option value="0" <?php if ($data_list[0]['trang_thai'] == 0) {
                                    echo "selected";
                                } ?>>Còn hàng</option>
            <option value="1" <?php if ($data_list[0]['trang_thai'] == 1) {
                                    echo "selected";
                                } ?>>Hết hàng</option>
        </select>
        <button style="margin-top: 20px;" type="submit" class="btn btn-success">Sửa</button>
    </form>
</div>

<?php
require_once "../../admin/layout_admin/footer.php";
?>