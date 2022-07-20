<?php
session_start();
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $name_cate != ''
    ) {
        $sql = "INSERT INTO `danh_muc`(`name_cate`) 
        VALUES ('$name_cate')";
        open_close_sql($sql);
    } else {
        $_SESSION['error'] = 'Khum được để trống';
        header('location: ' . BASE_ADMIN . 'admin_dm.php');
        die();
    }
}

$query = "SELECT * FROM `danh_muc`";
$data_product = return_array($query);
$index = 1;

require_once "../../admin/layout_admin/header.php";

?>

<h5 style="color: red;"><?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?></h5>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin: 20px;">
    Thêm
</button>

<table class="table" style="margin: 30px 0px">
    <thead>
        <tr>
            <th></th>
            <th scope="col">id</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <form action="./deleteMoredm.php" method="POST">
            <?php foreach ($data_product as $key) { ?>
                <tr>
                    <td><input type="checkbox" value="<?= $key['iddm'] ?>" name="id_check[]" id=""></td>
                    <td><?= $index++ ?></td>
                    <td><?= $key['name_cate'] ?></td>
                    <td><a class="btn btn-success" href="edit.php?iddm=<?php echo $key['iddm']; ?>">Sửa</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá khum')" href="delete.php?iddm=<?php echo $key['iddm']; ?>">Xoá</a></td>
                </tr>
            <?php } ?>
            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá những sản phẩm này khum')" type="submit">Xóa</button>
        </form>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" name="name_cate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>

        </div>
    </div>
</div>


<?php
require_once "../../admin/layout_admin/footer.php";
?>