<?php
session_start();
//select dmsp theo iddm
require_once "../php/confice/db.php";

if (isset($_SESSION['key_word'])) {
    $key_word = $_SESSION['key_word'];

    $query_san_pham_moi = "SELECT * FROM `san_pham` JOIN danh_muc ON san_pham.iddm = danh_muc.iddm
    WHERE `name` LIKE '%$key_word%' OR `name_cate` LIKE '%$key_word%'";
    $dataProduct = return_array($query_san_pham_moi);

    unset($_SESSION['key_word']);
} else {
    $query = "SELECT * FROM `san_pham`";
    $dataProduct = return_array($query);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // dd($id);
    $iddm = "SELECT * FROM `san_pham` WHERE `iddm`= $id";
    $dataProduct = return_array($iddm);
    // dd($dataProduct);
}

$queryCate = "SELECT * FROM `danh_muc`";
$dataCate = return_array($queryCate);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/js/jquery.js"></script>
    <link rel="stylesheet" href="./../css-product/coffe-vn.css">
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
                                <a href="./../view/thongtin_tk.php">Thông tin tài khoản</a>
                                <a href="../view/logout.php">Đăng xuất</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <strong><a href="../view/dangnhap.php">Đăng nhập</a></strong>
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
                        <a href="../view/home.php">
                            <img src="../view//image/logo.jpg" width="110px">
                        </a>
                    </div>
                    <!-- logo_item -->
                    <nav>
                        <ul id="main-menu">
                            <li><a href="../view/home.php">TRANG CHỦ</a></li>
                            <li><a href="../view/gioithieu.php">GIỚI THIỆU</a></li>
                            <li>
                                <a href="">SẢN PHẨM
                                </a>
                            </li>
                            <li><a href="">TIN TỨC</a></li>
                            <li><a href="../view/oder.php">HƯỚNG DẪN ĐẶT HÀNG</a></li>
                            <li><a href="../view/lienhe.php">LIÊN HỆ</a></li>
                        </ul>
                    </nav>
                    <div class="shop-cart">
                        <div class="header-cart-wrap">
                            <i class="fas fa-shopping-cart"></i>
                            <div class="header-cart-list header-cart-list--no-cart">
                                <img src="../view//image/no-cart.png" alt="" class="header-cart-no-cart-img">
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
        <div class="three-contents">
            <div class="three-content__item">
                <a href="../view/home.php">TRANG CHỦ</a>
                <div class="box-item"></div>
                <a href="./coffe-vn.php">SHOP</a>
            </div>
            <div class="find-three__box">
                <label for="" class="for-text">Xem tất cả 4 kết quả</label>
                <select name="" id="">
                    <option value="">Thứ tự theo mức độ phổ biến</option>
                    <option value="">Thứ tự theo điểm đánh giá</option>
                    <option value="">Thứ tự theo sản phẩm mới</option>
                    <option value="">Thứ tự theo giá: thấp đến cao</option>
                    <option value="">Thứ tự theo giá: cao xuống thấp</option>
                </select>
            </div>
        </div>
        <!-- three-contents -->
        <main>
            <article class="content-total-left">
                <div class="next_item_product">
                    <?php
                    foreach ($dataProduct as $key) { ?>
                        <div class="next_item_content">
                            <div class="product_cafe_box">
                                <div class="cafe_item_image">
                                    <img src="../view//image/<?= $key['img'] ?>" width="200px">
                                </div>
                                <div class="translate">
                                    <a href="../product/productcoffe.php?id=<?= $key['id'] ?>">
                                        <button class="onclick">XEM CHI TIẾT</button>
                                    </a>
                                </div>
                            </div>
                            <div class="product_text">
                                <p><?= $key['name_phu'] ?></p>
                                <h6><a href=""><?= $key['name'] ?></a></h6>
                                <strong><?= number_format($key['price']) ?>đ</strong>
                            </div>
                        </div>
                        <!-- next_item_content -->
                    <?php } ?>
                </div>
            </article>
            <!-- content-total-left -->

            <article class="content-total-right">
                <div class="content-total-right-box">
                    <div class="content-right-text">
                        <h6>DANH MỤC SẢN PHẨM</h6>
                        <div class="box-itemzz"></div>
                    </div>

                    <nav>
                        <ul id="mainn-menu">
                            <li>
                                <a href="">
                                    <span>CÀ PHÊ VIỆT</span>
                                    <i class="hihi nav-down fas fa-caret-down"></i>
                                </a>
                                <ul class="navsub">
                                    <?php
                                    foreach ($dataCate as $key) { ?>
                                        <li><a href="./coffe-vn.php?id=<?= $key['iddm'] ?>"><?= $key['name_cate'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <div class="box-item-list"></div>
                            <li>
                                <a href="">
                                    <span>CÀ PHÊ Ý</span>
                                    <i class="hihi nav-down fas fa-caret-down"></i>
                                    <ul class="navsub">
                                        <li><a href="">CAPUCHINO</a></li>
                                        <li><a href="">CHOCOLATE ĐÁ XAY</a></li>
                                        <li><a href="">COFFEE ĐÁ XAY</a></li>
                                        <li><a href="">ESPRESSO</a></li>
                                        <li><a href="">LATTE</a></li>
                                        <li><a href="">ORION ĐÁ XAY</a></li>
                                        <li><a href="">TRÀ XANH ĐÁ XAY</a></li>
                                    </ul>
                                </a>
                            </li>
                            <div class="box-item-list"></div>
                            <li>
                                <a href="">
                                    <span>ĐIỂM TÂM</span>
                                    <i class="hihi nav-down fas fa-caret-down"></i>
                                    <ul class="navsub">
                                        <li><a href="">BÁNH CANH CHẢ CUA</a></li>
                                        <li><a href="">BÁNH MÌ ỐP LA</a></li>
                                        <li><a href="">BÚN BÒ HUẾ</a></li>
                                        <li><a href="">HỦ TIẾU/BÁNH MÌ BÒ KHO</a></li>
                                        <li><a href="">MÌ GÀ</a></li>
                                        <li><a href="">NUÔI XÀO BÒ</a></li>
                                        <li><a href="">PHỞ BÒ</a></li>
                                    </ul>
                                </a>
                            </li>
                            <div class="box-item-list"></div>
                            <li><a href="">KHUYẾN MÃI</a></li>
                            <div class="box-item-list"></div>
                            <li>
                                <a href="">
                                    <span>NƯỚC ÉP-TRÀ</span>
                                    <i class="hihi nav-down fas fa-caret-down"></i>
                                    <ul class="navsub">
                                        <li><a href="">NƯỚC CAM</a></li>
                                        <li><a href="">NƯỚC ÉP BƯỞI</a></li>
                                        <li><a href="">NƯỚC ÉP CÀ RỐT</a></li>
                                        <li><a href="">NƯỚC ÉP ỔI</a></li>
                                        <li><a href="">SODA CHANH DÂY</a></li>
                                        <li><a href="">SODA CHANH TƯƠI</a></li>
                                        <li><a href="">SỮA TƯƠI THẠCH TRÁI CÂY</a></li>
                                        <li><a href="">TRÀ ĐÀO</a></li>
                                        <li><a href="">TRÀ LIPTON</a></li>
                                        <li><a href="">TRÀ TẮC</a></li>
                                    </ul>
                                </a>
                            </li>
                            <div class="box-item-list"></div>
                            <li>
                                <a href="">
                                    <span>SINH TỐ</span>
                                    <i class="hihi nav-down fas fa-caret-down"></i>
                                    <ul class="navsub">
                                        <li><a href="">NƯỚC NGỌT CÁC LOẠI</a></li>
                                        <li><a href="">SINH TỐ BƠ</a></li>
                                        <li><a href="">SINH TỐ CHUỐI</a></li>
                                        <li><a href="">SINH TỐ MÃN CẦU</a></li>
                                        <li><a href="">SINH TỐ SAPOCHE</a></li>
                                        <li><a href="">SINH TỐ XOÀI</a></li>
                                        <li><a href="">YAOURT ĐÁ</a></li>
                                        <li><a href="">YAOURT TRÁI CÂY</a></li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="filter">
                        <form action="">
                            <input type="range" min="1" max="20" step="1" class="range-box__item">
                        </form>
                        <button>Lọc</button>
                    </div>
                    <div class="content-right-text-next">
                        <h6>SẢN PHẨM ĐÁNH GIÁ CAO</h6>
                        <div class="box-itemzz"></div>
                    </div>

                    <div class="content-box-right">
                        <div class="content-item-right">
                            <div class="right-img">
                                <a href="">
                                    <img src="../view//image/sữa-tươi-thạch-trái-cây-20k-300x300.jpg" width="74">
                                </a>

                            </div>
                            <div class="text-right-content">
                                <h5><a href="">SỮA TƯƠI THẠCH TRÁI CÂY</a></h5>
                                <strong>20,000₫</strong>
                            </div>
                        </div>

                        <div class="content-item-right2">
                            <div class="right-img">
                                <a href="">
                                    <img src="../view//image/SINH-TO-CHUÓI-25k-300x300.jpg" width="74">
                                </a>

                            </div>
                            <div class="text-right-content">
                                <h5><a href="">SINH TỐ CHUỐI</a></h5>
                                <strong>25,000₫</strong>
                            </div>
                        </div>

                        <div class="content-item-right3">
                            <div class="right-img">
                                <a href="">
                                    <img src="../view//image/sp4.jpg" width="74">
                                </a>

                            </div>
                            <div class="text-right-content">
                                <h5><a href="">ESPRESSO</a></h5>
                                <strong>20,000₫</strong>
                            </div>
                        </div>

                        <div class="content-item-right4">
                            <div class="right-img">
                                <a href="">
                                    <img src="../view//image/HỦ-TIẾU-BÒ-KHO-30k-300x300.jpg" width="74">
                                </a>

                            </div>
                            <div class="text-right-content">
                                <h5><a href="">SỮA TƯƠI THẠCH TRÁI CÂY</a></h5>
                                <strong>30,000₫</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
            <!-- content-total-right -->
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

    // HIDDEN

    $(document).ready(function() {
        showMenu();
    });

    function showMenu() {
        // $('#mainn-menu>li>a .hihi').after('<i class="hihi nav-down fas fa-caret-down"></i>');

        $('#mainn-menu>li').click(function() {
            if ($(this).hasClass('active')) {
                $(this).children('.navsub').slideUp();
                $(this).removeClass('active');
                // alert('dang active');
            } else {
                $('.navsub').slideUp();
                $(this).children('.navsub').slideDown();
                $('#mainn-menu>li').removeClass('active');
                $(this).addClass('active');
            }
        })
    }

    //Tabs content

    $(document).ready(function() {
        $('.tab-content-item').hide();
        $('.tab-content-item:first-child').fadeIn();
        $('.nav-tabs li').click(function() {
            //Active nav-tabs
            $('.nav-tabs li').removeClass('active')
            $(this).addClass('active');
            //Show tab-content-item
            let id_tab_content = $(this).children('a').attr('href');
            // alert(id_tab_content);
            $('.tab-content-item').hide();
            $(id_tab_content).fadeIn();
            return false;
        });
    });
</script>

</html>