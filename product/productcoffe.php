<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "../php/confice/db.php";
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_sql = "SELECT * FROM `san_pham` WHERE `id`='$id'";
    $data_sql = return_array($query_sql);
    // dd($data_sql);
}

//Làm cmt
// dd($_SESSION['user_login']);

if (!empty($_POST)) {
    if (isset($_SESSION['user_login'])) {
        $dataCustomer =  $_SESSION['user_login'];

        // dd($dataCustomer);
        $id_kh = $dataCustomer[0]['id_kh'];
    } else {
        header('Location: ./../view/dangnhap.php');
    }

    $cmtt_nd = $_POST['cmtt_nd'];
    $dateNow = date('d-m-Y');

    $queryCmtt = "INSERT INTO `comment`(`id_kh`, `id_sp`, `cmtt_nd`, `ngay_cmtt`)
    VALUES ('$id_kh','$id','$cmtt_nd','$dateNow')";
    open_close_sql($queryCmtt);
}

$queryGetCmt = "SELECT * FROM `comment` INNER JOIN `khanh_hang` ON 
comment.id_kh = khanh_hang.id_kh WHERE comment.id_sp = $id";
$dataCmtt = return_array($queryGetCmt);
// dd($dataCmtt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="/js/main.js"></script> -->
    <script src="/js/jquery.js"></script>
    <link rel="stylesheet" href="./../css-product/coffe.css">
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
                        <a href="./../home.php">
                            <img src="../view//image/logo.jpg" width="110px">
                        </a>
                    </div>
                    <!-- logo_item -->
                    <nav>
                        <ul id="main-menu">
                            <li><a href="../view/home.php">TRANG CHỦ</a></li>
                            <li><a href="../view/introduce.php">GIỚI THIỆU</a></li>
                            <li>
                                <a href="">SẢN PHẨM
                                </a>
                            </li>
                            <li><a href="">TIN TỨC</a></li>
                            <li><a href="../view/oder.php">HƯỚNG DẪN ĐẶT HÀNG</a></li>
                            <li><a href="../view/info.php">LIÊN HỆ</a></li>
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

        <main>
            <article class="content-total-left">
                <div class="three-contents">
                    <a href="./../home.php">TRANG CHỦ</a>
                    <div class="box-item"></div>
                    <a href="">CÀ PHÊ Ý</a>
                    <div class="box-item"></div>
                    <a href="">COFFEE ĐÁ XAY</a>
                </div>
                <!-- three-contents -->

                <div class="coffe-box-item">
                    <?php foreach ($data_sql as $key) { ?>
                        <div class="box-item-img">
                            <img src="../view//image/<?= $data_sql[0]['img'] ?>" alt="">
                        </div>
                        <div class="content-coffe-box">
                            <h3><?= $data_sql[0]['name'] ?></h3>
                            <div class="box-item2"></div>
                            <div class="price">
                                <strong><?= number_format($data_sql[0]['price']) ?>₫</strong>
                            </div>
                            <h6>Đặc tính:</h6>
                            <p>– Cappuccino chocolate với hương thơm nhẹ nhàng, tinh tế của <br> cà phê và mùi vị hấp dẫn rất đặc trưng của cà phê phong cách Ý.
                                <br> <br> – Cappuccino chocolate thơm ngon nhất, cùng bí quyết khác <br> biệt của café tươi tạo ra sản phẩm G7 Cappuccino Hazelnut đầy <br> cá tính của phái đẹp.
                            </p>
                            <div class="quantity-open">
                                <form action="../view/addCart.php?id=<?= $id ?>" method="POST">
                                    <div class="quantity">
                                        <input type="number" name="soluong" step="1" min="1" max="9999" value="1" title="SL">
                                    </div>
                                    <button type="submit" name="addcart" value="thêm vào giỏ">THÊM VÀO GIỎ</button>
                                </form>
                                <?php if ($data_sql[0]['trang_thai'] == 1) { ?>
                                    <h6 style="color: red; font-size: 18px;">Hết hàng</h6>
                                <?php } ?>
                            </div>
                            <div class="category">
                                <div class="box-item3"></div>
                                <span>Danh mục:<a href="">CÀ PHÊ Ý,</a><a href=""> COFFEE ĐÁ XAY</a></span>
                            </div>
                            <div class="fonts-icon">
                                <i class="nav-fb fab fa-facebook-square"></i>
                                <i class="nav-tw fab fa-twitter-square"></i>
                                <i class="nav-gg fas fa-envelope-square"></i>
                                <i class="nav-square fab fa-pinterest-square"></i>
                                <i class="nav-ggfon fab fa-google-plus-square"></i>
                                <i class="nav-linkt fab fa-linkedin"></i>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- coffe-box-item -->

                <div class="description">
                    <div class="des-item">
                        <div class="tabs">
                            <ul class="nav-tabs">
                                <li class="active"><a href="#menu_1">MÔ TẢ</a></li>
                                <li><a href="#menu_2">ĐÁNH GIÁ (0)</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="menu_1" class="tab-content-item">
                                    <div class="des-item-box">
                                        <br>
                                        <p>Cappuccino chocolate được chắt lọc tinh túy từ những hạt cà phê ngon nhất Buôn Ma Thuột kết hợp bột kem và các nguyên liệu cao <br> cấp khác, cộng với bí quyết độc đáo của The coffe house, mang đến những người đam
                                            mê cà phê một loại cà phê hòa tan <br> Cappuccino được pha chế theo phong cách Ý.</p>
                                        <div class="des-box-box">
                                            <p>Đặc tính: <br></p>
                                            <p> – Cappuccino chocolate với hương thơm nhẹ nhàng, tinh tế của cà phê và mùi vị hấp dẫn rất đặc trưng của cà phê phong cách Ý.</p>
                                            <p>– Cappuccino chocolate thơm ngon nhất, cùng bí quyết khác biệt của café tươi tạo ra sản phẩm G7 Cappuccino Hazelnut đầy cá tính <br> của phái đẹp.</p>
                                        </div>
                                    </div>
                                    <div class="des-img">
                                        <img src="../view//image/4.jpg" alt="">
                                    </div>
                                    <div class="des-text-content">
                                        <p>– Cappuccino chocolate thơm dịu cùng với vị nhẹ nhàng của hạt cafe và mùi đặc trưng của Chocolate giúp cho bạn năng động và <br> thích tiện , lợi.</p>
                                    </div>
                                </div>

                                <div id="menu_2" class="tab-content-item tab-content-item__box">
                                    <?php foreach ($dataCmtt as $key) : ?>
                                        <div class="display_cmt">
                                            <div class="display-cmt__img">
                                                <img src="./../view/image/<?= $key['anh'] ?>" alt="">
                                            </div>
                                            <div class="display-cmt__user">
                                                <h5><?= $key['ten_kh'] ?></h5>
                                                <p><?= $key['cmtt_nd'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <div class="tab-item">
                                        <h3>Hãy là người đầu tiên nhận xét “COFFEE ĐÁ XAY”</h3>
                                        <h6>Đánh giá của bạn</h6>
                                        <div class="stars">
                                            <form action="">
                                                <input class="star star-5" id="star-5" type="radio" name="star" />
                                                <label class="star star-5" for="star-5"></label>
                                                <input class="star star-4" id="star-4" type="radio" name="star" />
                                                <label class="star star-4" for="star-4"></label>
                                                <input class="star star-3" id="star-3" type="radio" name="star" />
                                                <label class="star star-3" for="star-3"></label>
                                                <input class="star star-2" id="star-2" type="radio" name="star" />
                                                <label class="star star-2" for="star-2"></label>
                                                <input class="star star-1" id="star-1" type="radio" name="star" />
                                                <label class="star star-1" for="star-1"></label>
                                            </form>
                                        </div>
                                        <div class="content-tabs-box">
                                            <form action="" method="POST">
                                                <label for="">Nhận xét của bạn</label><br>
                                                <textarea name="cmtt_nd" id="" cols="30" rows="10"></textarea><br>
                                                <button type="submit">GỬI ĐI</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-left-bottom">
                        <div class="left-bottom-text">
                            <div class="box-itemz"></div>
                            <h4>SẢN PHẨM TƯƠNG TỰ</h4>
                        </div>

                        <div class="content-left-bottom-total">
                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="../view//image/sp6.jpg" width="196px">
                                    </div>
                                    <div class="translate">
                                        <button class="onclick">XEM CHI TIẾT</button>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ Y</p>
                                    <h6><a href="">CHOCOLATE ĐÁ XAY</a></h6>
                                    <strong>30,000đ</strong>
                                </div>
                            </div>

                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="../view//image/sp3.jpg" width="196px">
                                    </div>
                                    <div class="translate">
                                        <button class="onclick">XEM CHI TIẾT</button>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ Y</p>
                                    <h6><a href="">LATTE</a></h6>
                                    <strong>25,000đ</strong>
                                </div>
                            </div>

                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="../view//image/sp2.jpg" width="196px">
                                    </div>
                                    <div class="translate">
                                        <button class="onclick">XEM CHI TIẾT</button>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ Y</p>
                                    <h6><a href="">ORION ĐÁ XAY</a></h6>
                                    <strong>30,000đ</strong>
                                </div>
                            </div>

                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="../view//image/sp1.jpg" width="196px">
                                    </div>
                                    <div class="translate">
                                        <button class="onclick">XEM CHI TIẾT</button>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ Y</p>
                                    <h6><a href="">TRÀ XANH ĐÁ XAY</a></h6>
                                    <strong>30,000đ</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- description -->

            </article>
            <!-- content-total-left -->

            <div class="bbox-item"></div>

            <article class="content-total-right">
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
                                <li><a href="">BẠC XỈU/ CÀ PHÊ SỮA TƯƠI</a></li>
                                <li><a href="">CA CAO ĐÁ/NÓNG</a></li>
                                <li><a href="">CÀ PHÊ ĐEN ĐÁ/NÓNG</a></li>
                                <li><a href="">CÀ PHÊ SỮA ĐÁ/NÓNG</a></li>
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