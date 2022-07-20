<?php
require_once "../php/confice/db.php";
require_once "./../php/confice/glopal.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    if (
        empty($email) || trim($email) == "" ||
        empty($mk) || trim($mk) == ""
    ) {
        $_SESSION['error'] = "Khum được để trống";
        header('location: ' . BASE_URL . 'dangnhap.php');
        die();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Email khum đúng định dạng";
            header('location: ' . BASE_URL . 'dangnhap.php');
            die();
        }

        $query_sqli = "SELECT * FROM `khanh_hang` WHERE `email` = '$email'";
        $data_sqli = return_array($query_sqli);
        // var_dump($data_sqli);
        // die();

        if ($data_sqli[0]['mk'] == $mk) {
            if ($data_sqli[0]['kich_hoat'] == 2) {
                $_SESSION['error'] = "Tài khoản của bạn đã bị khoá!";
                header('location: ' . BASE_URL . 'dangnhap.php');
                die();
            } else if ($data_sqli[0]['quyen'] == 1) {
                header('location: ' . BASE_URL2 . '../admin/thongke/admin_tk.php');
                die();
            } else if ($data_sqli[0]['quyen'] == 2) {
                $_SESSION['user_login'] = $data_sqli;
                header('location: ' . BASE_URL . 'home.php');
                die();
            }
        } else {
            $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng!";
            header('location: ' . BASE_URL . 'dangnhap.php');
            die();
        }
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
    <link rel="stylesheet" href="../css/form-sigin.css">
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
                    <strong><a href="">Đăng nhập</a></strong>
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
            <div class="tabs">
                <div class="auth-form__text">
                    <nav class="nav-tabs">
                        <li class="active"><a href="../view/dangnhap.php">LOG IN</a></li>
                        <span><i class="fas fa-angle-right"></i></span>
                        <li><a href="../view/dangky.php">REGISTER</a></li>
                    </nav>
                </div>
                <div class="tab-content">
                    <div id="menu_1" class="tab-content-item">
                        <div class="auth-form__login">
                            <h5 style="color: red; text-align: center;"><?php if (isset($_SESSION['error'])) {
                                                                            echo $_SESSION['error'];
                                                                            unset($_SESSION['error']);
                                                                        } ?></h5>
                            <h3 class="auth-text__content">ĐĂNG NHẬP</h3>
                            <!-- <div class="btn_one1"></div> -->
                            <div class="auth-form__sign-box">
                                <form action="" method="POST">
                                    <label for="email" class="sign-item">Email hoặc số điện thoại di động *</label>
                                    <input type="text" id="email" name="email" class="search-input1">
                                    <!-- <br> -->
                                    <label for="mk" class="sign-item">Mật khẩu *</label>
                                    <input type="password" id="mk" name="mk" class="search-input1">
                                    <!-- <br> -->
                                    <button class="onclick-btn">ĐĂNG NHẬP</button>
                                    <input type="checkbox" class="check-btn">Ghi nhớ mật khẩu
                                    <p class="forget-btn"><a href="">Quên mật khẩu?</a></p>
                                </form>
                            </div>
                        </div>
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