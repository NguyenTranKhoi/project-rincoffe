<?php
session_start();
require_once "../php/confice/db.php";

if (isset($_SESSION['user_login'])) {
    $data_kh = $_SESSION['user_login'];
    $id_kh = $data_kh[0]['id_kh'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);

    if (
        $ten_kh != '' || $sdt != '' || $dia_chi != '' || $email != '' || $gioi_tinh != ''
    ) {
        if (isset($_FILES['img'])) {
            $file = $_FILES['img'];
            $file_name = $file['name'];
            if ($file_name == '') {
                $file_name = $data_kh[0]['anh'];
            }
            move_uploaded_file($file['tmp_name'], 'image/' . $file_name);
        }


        $sql = "UPDATE `khanh_hang` SET `ten_kh`='$ten_kh',`sdt`='$sdt',`email`='$email',`anh`='$file_name',`dia_chi`='$dia_chi',`gioi_tinh`='$gioi_tinh' WHERE `id_kh` = $id_kh";
        open_close_sql($sql);
    } else {
        echo "Khum được để trống";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./../css/thongtin_tk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
</head>

<body>
    <div class="wrap">
        <div class="head">
            <div class="head_item">
                <div class="address">
                    <h5>ĐỊA CHỈ: 428 NGUYỄN KIỆM – P3 – Q. PHÚ NHUẬN -TP.HỒ CHÍ MINH || 0778601228 - 0916386533 (ZALO)
                    </h5>
                </div>
                <!-- address -->
                <div class="search_sigin">
                    <a href=""><i class="fas fa-search"></i></a>
                    <div class="btn_one"></div>
                    <?php
                    if (isset($_SESSION['user_login'])) { ?>
                        <div class="dropdown">
                            <button class="nut_dropdown"><i class="fas fa-user"></i></button>
                            <div class="noidung_dropdown">
                                <a href="./thongtin_tk.php">Thông tin tài khoản</a>
                                <a href="./logout.php">Đăng xuất</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <strong><a href="./dangnhap.php">Đăng nhập</a></strong>
                    <?php } ?>
                </div>
                <!-- search_sigin -->
            </div>
            <!-- head_item -->
        </div>
        <!-- head -->
        <header>
            <div class="header-total">
                <div class="container_header">
                    <div class="logo_item">
                        <a href="./home.php">
                            <img src="./image/logo.jpg" width="110px">
                        </a>
                    </div>
                    <!-- logo_item -->
                    <nav>
                        <ul id="main-menu">
                            <li><a href="./home.php">TRANG CHỦ</a></li>
                            <li><a href="./gioithieu.php">GIỚI THIỆU</a></li>
                            <li>
                                <a href="../product/coffe-vn.php">SẢN PHẨM
                                </a>
                            </li>
                            <li><a href="">TIN TỨC</a></li>
                            <li><a href="./oder.php">HƯỚNG DẪN ĐẶT HÀNG</a></li>
                            <li><a href="./lienhe.php">LIÊN HỆ</a></li>
                        </ul>
                    </nav>
                    <div class="shop-cart">
                        <div class="header-cart-wrap">
                            <i class="fas fa-shopping-cart"></i>
                            <div class="header-cart-list header-cart-list--no-cart">
                                <img src="./image/no-cart.png" alt="" class="header-cart-no-cart-img">
                                <span class="header-cart-list-no-cart-msg">
                                    Chưa có sản phẩm ạ!
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container_header -->
            </div>
        </header>
        <!-- header_top -->

        <main>
            <div class="user-name__text">
                <h5 style="color: red;">Tài khoản</h5>
                <div class="brick__item">/</div>
                <h5>Thông tin tài khoản</h5>
            </div>

            <div class="account-name__info">
                <h4><i class="fas fa-user"></i>Thông tin tài khoản</h4>
            </div>

            <div class="tab-content__item">
                <div class="auth-form__count">
                    <div class="auth-form__sign-boxx">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="frm-sgn">
                                <div class="img-auth__account">
                                    <img src="image/<?= $data_kh[0]['anh'] ?>" alt="">
                                    <h6><?= $data_kh[0]['ten_kh'] ?></h6>
                                </div>
                                <div class="sign-box__item">
                                    <label for="username" class="sign-item">Tên đăng nhập *</label>
                                    <input type="text" value="<?= $data_kh[0]['ten_kh'] ?>" id="username" name="ten_kh" class="search-input">
                                    <!-- <br> -->
                                    <label for="sdt" class="sign-item">Số điện thoại *</label>
                                    <input type="text" value="<?= $data_kh[0]['sdt'] ?>" id="sdt" name="sdt" class="search-input">
                                    <!-- <br> -->
                                    <label for="" class="sign-item">Ảnh đại diện *</label>
                                    <input type="file" name="img" class="search-input3">
                                    <!-- <br> -->
                                </div>
                                <div class="sign-box__item-one">
                                    <label for="dia_chi" class="sign-item">Địa chỉ *</label>
                                    <input type="text" value="<?= $data_kh[0]['dia_chi'] ?>" id="dia_chi" name="dia_chi" class="search-input-box">
                                    <!-- <br> -->
                                    <label for="email" class="sign-item">Email *</label>
                                    <input type="text" value="<?= $data_kh[0]['email'] ?>" id="email" name="email" class="search-input-box">
                                    <!-- <br> -->
                                    <label for="">Giới tính</label>
                                    <select name="gioi_tinh" value="<?= $data_kh[0]['gioi_tinh'] ?>">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <button class="onclick-btn1"><i class="far fa-save"></i> Sửa thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer_top">
                <div class="footer_top_item">
                    <div class="information">
                        <div class="information_item">
                            <h6 style="font-size: 19px;">THÔNG TIN LIÊN HỆ</h6>
                            <div class="footer_bar"></div>
                        </div>
                        <p>Địa chỉ: 428 Nguyễn Kiệm – P3 – Q. Phú Nhuận <br> Hotline: 0778601228 <br> Zalo :0916386533 <br> Email :rincoffee428@gmail.com</p>
                    </div>
                    <!-- information -->

                    <div class="policy">
                        <div class="policy_item">
                            <h6 style="font-size: 19px;">CHÍNH SÁCH</h6>
                            <div class="footer_bar"></div>
                        </div>
                        <p><a href="">Chính sách giao hàng <br>
                                Chính sách thanh toán <br>
                                Chính sach vận chuyển <br>
                                Khách hàng thân thiết</a></p>
                    </div>
                    <!-- policy -->

                    <div class="menu_footer">
                        <div class="menu_item">
                            <h6 style="font-size: 19px;">MENU</h6>
                            <div class="footer_bar"></div>
                        </div>
                        <p><a href="">CÀ PHÊ VIỆT <br>
                                CÀ PHÊ Ý <br>
                                ĐIỂM TÂM <br>
                                NƯỚC ÉP-TRÀ <br>
                                SINH TỐ</a></p>
                    </div>
                    <!-- menu_footer -->

                    <div class="connect_footer">
                        <h6 style="font-size: 19px;">KẾT NỐI VỚI CHÚNG TÔI</h6>
                        <div class="footer_bar"></div>
                    </div>
                    <!-- connect_footer -->
                </div>
                <!-- footer_top_item -->
            </div>


            <div class="footer_bot">
                <div class="footer_bot_item">
                    <div class="bot_left">
                        <spen> Copyright 2021 ©</spen>
                        <strong>RIN-COFFEE</strong>
                        <a href="">. Design by HBmedia</a>
                    </div>
                    <!-- bot_left -->
                    <div class="bot_right">
                        <a href=""><i class="fab fa-cc-visa"></i></a>
                        <a href=""><i class="fab fa-cc-paypal"></i></a>
                        <a href=""><i class="fab fa-cc-stripe"></i></a>
                        <a href=""><i class="fab fa-cc-mastercard"></i></a>
                        <a href=""><i class="fab fa-cc-amex"></i></a>
                    </div>
                    <!-- bot_right -->
                </div>
                <!-- footer_bot_item -->
            </div>
            <!-- footer_bot -->
        </footer>
    </div>

    <div id="backTop">
        <i class="fas fa-arrow-up"></i>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#backTop').fadeIn();
            } else {
                $('#backTop').fadeOut();
            }
        });
        $('#backTop').click(function() {
            $('html , body').animate({
                scrollTop: 0
            }, 300);
        });
    });
</script>

</html>