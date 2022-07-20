<?php
session_start();
require_once "../../php/confice/db.php";
require_once "../../php/confice/glopal.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $name_kh != '' || $dia_chi != '' || $sdt_kh != '' || $email != '' || $note != ''
    ) {
        $sql = "INSERT INTO `hoa_don`(`name_kh`, `dia_chi`, `sdt_kh`, `note`, `email`) 
        VALUES ('$name_kh','$dia_chi','$sdt_kh','$email','$note')";
        open_close_sql($sql);
    }
}

$query = "SELECT * FROM `hoa_don`";
$data_product = return_array($query);
$index = 1;

require_once "../../admin/layout_admin/header.php";

?>

<table class="table" style="margin: 30px 0px">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">SĐT Khách Hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Ghi Chú</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <form action="" method="POST">
            <?php foreach ($data_product as $key) { ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $key['name_kh'] ?></td>
                    <td><?= $key['dia_chi'] ?></td>
                    <td><?= $key['sdt_kh'] ?></td>
                    <td><?= $key['email'] ?></td>
                    <td><?= $key['note'] ?></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá khum')" href="delete.php?id=<?php echo $key['id']; ?>">Xoá</a></td>
                </tr>
            <?php } ?>
        </form>
    </tbody>
</table>

<?php
require_once "../../admin/layout_admin/footer.php";
?>