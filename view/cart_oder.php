<?php
session_start();
require_once "./../php/confice/glopal.php";
require_once "../php/confice/db.php";

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if (isset($_SESSION['user_login'])) {
        $user = $_SESSION['user_login'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if (
                $name_kh != '' || $dia_chi != '' || $sdt_kh != '' || $email != '' || $note != ''
            ) {
                // dd($_POST);
                $customer_id = $user[0]['id_kh'];
                // dd($customer_id);

                $sql = "INSERT INTO `hoa_don` (`name_kh`, `dia_chi`, `sdt_kh`, `note`, `id_kh`, `email`) 
                VALUES ('$name_kh', '$dia_chi', '$sdt_kh', '$note', '$customer_id', '$email')";
                open_close_sql($sql);
                header('location: ' . BASE_URL . 'oder_success.php');
            } else {
                $_SESSION['error'] = 'Không được để trống';
                header('location: ' . BASE_URL . 'cart_oder.php');
                die();
            }
        }
    } else {
        $_SESSION['error'] = 'Bạn cần đăng nhập để thanh toán!';
        header('location: ' . BASE_URL . 'shopping.php');
        die();
    }
}

// echo "<pre>";
// var_dump($cart);
// echo "</pre>";
// die();

$query = "SELECT * FROM `hoa_don`";
$receipt = return_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../css/style_oder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
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
                            <li><a href="introduce.html">GIỚI THIỆU</a></li>
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

        <main class="content-product__item">
            <!-- <div class="box-item"></div> -->
            <div class="shopping-auth">
                <nav class="nav-tab">
                    <a href="../view/shopping.php">SHOPPING CART</a>
                    <span><i class="fas fa-angle-right"></i></span>
                    <a href="">CHECKOUT DETAILS</a>
                    <span><i class="fas fa-angle-right"></i></span>
                    <a href="">ODER COMPLETE</a>
                </nav>
            </div>
            <div class="cart-oder">
                <div class="container">
                    <div class="cart-top-wrap">
                        <div class="cart-top">
                            <div class="cart-top-cart cart-top-item">
                                <i class="fas fa-shopping-cart cart-top-item"></i>
                            </div>
                            <div class="cart-top-adress  cart-top-item">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="cart-top-payment  cart-top-item">
                                <i class="fab fa-jedi-order"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
                <div class="container-boder__box">
                    <h5 style="color: red;"><?php if (isset($_SESSION['error'])) {
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            } ?></h5>
                    <div class="box-content__text">
                        <p>Bạn có tài khoản chưa? <a href="">Ấn vào để chọn đăng nhập</a></p>
                        <p>Bạn đã có mã ưu đãi? <a href="">Nhấp vào đây để nhận mã của bạn</a></p>
                        <div class="box-item"></div>
                    </div>
                    <div class="container-oder__item">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="info-boder__item">
                                <div class="info-next__box">
                                    <label for="">Họ Tên</label><br>
                                    <input type="text" name="name_kh"> <br>
                                    <label for="">Địa Chỉ</label><br>
                                    <input type="text" name="dia_chi" placeholder="Số nhà và tên đường"> <br>
                                    <label for="">Số Điện Thoại</label><br>
                                    <input type="text" name="sdt_kh"> <br>
                                    <label for="">Email</label><br>
                                    <input type="text" name="email">
                                </div>
                                <div class="box-item1"></div>
                                <h6>THÔNG TIN BỔ SUNG</h6>
                                <textarea name="note" cols="30" rows="10" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                            </div>

                            <div class="info-mation__item">
                                <table>
                                    <tr>
                                        <th colspan="2">ĐƠN HÀNG CỦA BẠN</th>
                                    </tr>
                                    <tr>
                                        <td>SẢN PHẨM</td>
                                        <td>
                                            TỔNG CỘNG
                                        </td>
                                    </tr>
                                    <?php
                                    foreach ($cart as $key) { ?>
                                        <tr>
                                            <td><?= $key['name']; ?></td>
                                            <td>
                                                <?= number_format($key['price']) ?>₫
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </table>
                                <p>Rất tiếc, có vẻ như không có phương thức thanh toán nào phù hợp với khu vực bang hiện tại của bạn. Vui lòng liên hệ với chúng tôi nếu bạn cần hỗ trợ hoặc muốn sắp xếp phương án thay thế.</p>
                                <button type="submit">ĐẶT HÀNG</button>
                            </div>
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
    <!-- wrap -->
    <div id="backTop">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!-- backTop -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
    <!-- <script src="./js/main.js"></script> -->
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