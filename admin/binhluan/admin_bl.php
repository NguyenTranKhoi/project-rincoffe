<?php
require_once "../../admin/layout_admin/header.php";
require_once "../../php/confice/db.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $queryCmt = "SELECT * FROM `comment` INNER JOIN `khanh_hang` ON comment.id_kh = khanh_hang.id_kh WHERE comment.id_sp = $id";
    $dataCmt = return_array($queryCmt);
}
?>

<?php if (!empty($dataCmt)) { ?>
    <table class="table" style="margin: 30px 0px">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Nội dung bình luận</th>
                <th scope="col">Ngày bình luận</th>
                <th scope="col">Xoá</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $index = 1;
            foreach ($dataCmt as $key) { ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $key['ten_kh'] ?></td>
                    <td><?= $key['cmtt_nd'] ?></td>
                    <td><?= $key['ngay_cmtt'] ?></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá khum')" href="delete.php?cmtt_id=<?php echo $key['cmtt_id']; ?>">Xoá</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
<?php } else { ?>
    <h4>Hiện Tại Chưa Có Bình Luận Cho Sản Phẩm này!</h4>
<?php } ?>

<?php
require_once "../../admin/layout_admin/footer.php";
?>