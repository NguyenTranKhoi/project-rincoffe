<?php
session_start();

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/js/jquery.js"></script>
    <link rel="stylesheet" href="./../css/shopping.css">
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
                            <li><a href="./introduce.php">GIỚI THIỆU</a></li>
                            <li>
                                <a href="../product/coffe-vn.php">SẢN PHẨM
                                </a>
                            </li>
                            <li><a href="">TIN TỨC</a></li>
                            <li><a href="./oder.php">HƯỚNG DẪN ĐẶT HÀNG</a></li>
                            <li><a href="./info.php">LIÊN HỆ</a></li>
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
            <?php
            if (isset($cart) || !empty($cart)) { ?>
                <div class="shopping-auth">
                    <nav class="nav-tab">
                        <a href="../view/shopping.php">SHOPPING CART</a>
                        <span><i class="fas fa-angle-right"></i></span>
                        <a href="">CHECKOUT DETAILS</a>
                        <span><i class="fas fa-angle-right"></i></span>
                        <a href="">ODER COMPLETE</a>
                    </nav>
                </div>

                <div class="cart">
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
                    <h5 style="color: red; text-align:center; margin-bottom: 35px;"><?php if (isset($_SESSION['error'])) {
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            } ?></h5>
                    <div class="container">
                        <div class="cart-container">
                            <div class="cart-container-left">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>SẢN PHẨM</th>
                                            <th>TÊN SẢN PHẨM</th>
                                            <th>GIÁ</th>
                                            <th>SỐ LƯỢNG</th>
                                            <th>TỔNG CỘNG</th>
                                            <th>XOÁ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sumMoney = 0;
                                        foreach ($cart as $key) {
                                            $sumMoney += intval($key['sum_money']);
                                        ?>
                                            <tr>
                                                <td><img src="image/<?= $key['img']; ?>" alt=""></td>
                                                <td><?= $key['name']; ?></td>
                                                <td><?= number_format($key['price']) ?>₫</td>
                                                <td><?= $key['soluong']; ?></td>
                                                <td><?= number_format($key['sum_money']) ?>₫</td>
                                                <td><a style="color: rgba(102, 102, 102, 0.85);" onclick="return confirm('Bạn có muốn xoá khum')" href="deleteCart.php?id=<?= $key['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="update">
                                    <a href="./../product/coffe-vn.php">← Tiếp tục xem sản phẩm</a>
                                    <button>CẬP NHẬT GIỎ HÀNG</button>
                                </div>
                            </div>
                            <div class="cart-container-right">
                                <table>
                                    <tr>
                                        <th colspan="2">TỔNG SỐ LƯỢNG</th>
                                    </tr>
                                    <tr>
                                        <td>Tổng cộng</td>
                                        <td>
                                            <?= number_format($sumMoney) ?>₫
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tổng cộng</td>
                                        <td><?= number_format($sumMoney) ?>₫</td>
                                    </tr>
                                </table>
                                <div class="cart-container-right-btn">
                                    <a href="./cart_oder.php">
                                        <button type="submit">TIẾN HÀNH THANH TOÁN</button>
                                    </a>
                                </div>
                                <div class="cart-container-right-ma">
                                    <p><i class="fas fa-tag"></i>Mã ưu đãi</p>
                                    <input type="text" placeholder="Mã ưu đãi"><br>
                                    <button>Áp dụng mã ưu đãi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else {
            ?>
                <style>
                    .btn-cart {
                        padding: 10px 5px;
                        text-decoration: none;
                        color: #ffff;
                    }

                    .btn-cart img {
                        width: 30%;
                    }

                    .update__item h5 a {
                        text-decoration: none;
                        color: #f8452c;
                    }

                    .update__item {
                        margin: 10px 0px;
                        border: 1px solid red;
                        width: 200px;
                        margin: auto;
                        /* background-color: red; */
                    }
                </style>
                <div class="btn-bg" style="text-align:center">
                    <h4 class="btn-cart">
                        <img src="./image/no-cart.png" alt="" class="header-cart-no-cart-img">
                        <span class="header-cart-list-no-cart-msg">
                            Chưa có sản phẩm ạ!
                        </span>
                    </h4>
                    <div class="update__item">
                        <h5><a href="./../product/coffe-vn.php">← Xem sản phẩm</a></h5>
                    </div>
                </div>
            <?php } ?>
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
    <!-- backTop -->
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