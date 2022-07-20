<?php
session_start();

require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $name != '' || $price != '' || $name_phu != ''
    ) {
        if (isset($_FILES['img'])) {
            $file = $_FILES['img'];
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], 'image/' . $file_name);
        }

        $sql = "INSERT INTO `san_pham`(`name`, `price`, `img`, `iddm`, `name_phu`) 
        VALUES ('$name','$price','$file_name','$iddm','$name_phu')";
        open_close_sql($sql);
    } else {
        $_SESSION['error'] = 'Khum được để trống';
        header('location: ' . BASE_ADMIN . 'admin_list.php');
        die();
    }
}

$query = "SELECT * FROM `san_pham` INNER JOIN `danh_muc` ON san_pham.iddm = danh_muc.iddm";
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
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Tên phụ</th>
            <th scope="col">Trạng thái</th>
            <th>CMT</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <form action="./deleteMorePr.php" method="POST">
            <?php foreach ($data_product as $key) { ?>
                <tr>
                    <td><input type="checkbox" value="<?= $key['id'] ?>" name="id_check[]" id=""></td>
                    <td><?= $index++ ?></td>
                    <td><?= $key['name'] ?></td>
                    <td><?= $key['price'] ?></td>
                    <td><img width="90px" src="image/<?= $key['img'] ?>" alt=""></td>
                    <td><?= $key['iddm'] ?></td>
                    <td><?= $key['name_phu'] ?></td>
                    <td>
                        <?php if ($key['trang_thai'] == 0) {
                            echo "Còn hàng";
                        } else {
                            echo "Hết Hàng";
                        } ?>
                    </td>
                    <td> <a href="./../binhluan/admin_bl.php?id=<?= $key['id'] ?>" class="btn btn-dark"><i class="fas fa-eye"></i></a></td>
                    <td><a class="btn btn-success" href="edit.php?id=<?php echo $key['id']; ?>">Sửa</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá khum')" href="delete.php?id=<?php echo $key['id']; ?>">Xoá</a></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Giá</label>
                        <input type="text" name="price" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tên phụ</label>
                        <input type="text" name="name_phu" class="form-control" id="exampleInputPassword1">
                    </div>
                    <select class="form-select" name="iddm" aria-label="Default select example">
                        <?php
                        $querydm = "SELECT * FROM `danh_muc`";
                        $datadm = return_array($querydm);
                        foreach ($datadm as $key) { ?>
                            <option value="<?= $key['iddm'] ?>" selected><?= $key['name_cate'] ?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
require_once "../../admin/layout_admin/footer.php";
?>