<?php
session_start();
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $ten_kh != '' || $sdt != '' || $email != '' || $dia_chi != '' || $gioi_tinh != ''
        || $kich_hoat != '' || $quyen != ''
    ) {
        $sql = "INSERT INTO `khanh_hang`(`ten_kh`, `sdt`, `email`, `anh`, `dia_chi`, `kich_hoat`, `quyen`, `gioi_tinh`)
        VALUES ('$ten_kh','$sdt','$email','$file_name','$dia_chi','$kich_hoat','$quyen','$gioi_tinh')";
        open_close_sql($sql);
    } else {
        $_SESSION['error'] = 'Khum được để trống';
        header('location: ' . BASE_ADMIN . 'admin_kh.php');
        die();
    }
}

$query = "SELECT * FROM `khanh_hang`";
$data_product = return_array($query);
$index = 1;

require_once "../../admin/layout_admin/header.php";
?>

<h5 style="color: red;"><?php if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } ?></h5>

<table class="table" style="margin: 30px 0px">
    <thead>
        <tr>
            <th scope="col">id_kh</th>
            <th scope="col">Tên Khách hàng</th>
            <th scope="col">SĐT</th>
            <th scope="col">Email</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Kích hoạt</th>
            <th scope="col">Giới tính</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_product as $key) { ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?= $key['ten_kh'] ?></td>
                <td><?= $key['sdt'] ?></td>
                <td><?= $key['email'] ?></td>
                <td><img width="90px" src="../../view/image/<?= $key['anh'] ?>" alt=""></td>
                <td><?= $key['dia_chi'] ?></td>
                <td><?php if ($key['kich_hoat'] == 1) {
                        echo "Kích hoạt";
                    } else {
                        echo "Ngừng kích hoạt";
                    } ?></td>
                <td><?= $key['gioi_tinh'] ?></td>
                <td><a class="btn btn-success" href="edit.php?id=<?= $key['id_kh'] ?>">Sửa</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá khum')" href="delete.php?id=<?php echo $key['id_kh'] ?>">Xoá</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
require_once "../../admin/layout_admin/footer.php";
?>