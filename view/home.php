<?php
session_start();
require_once "./../php/confice/db.php";
require_once "./../php/confice/glopal.php";

if (!empty($_POST)) {
    $key_word = $_POST['key_word'];

    $_SESSION['key_word'] = $key_word;
    header('Location: ' . BASE_URL2 . '../product/coffe-vn.php');
}



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./../css/style-home.css">
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
                        <div class="search__product">
                            <a href=""><i class="fas fa-search"></i></a>
                            <div class="search-item__box search-item__box--no-search">
                                <form action="" method="POST">
                                    <div class="box">
                                        <div class="container-3">
                                            <input type="search" name="key_word" id="search" placeholder="Tìm kiếm..." /><button type="submit" class="icon"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <label for="nav-mobile__input" class="nav__bars-btn">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                        </svg>
                    </label>
                        <input type="checkbox" hidden class="nav__input" id="nav-mobile__input">
                        <label for="nav-mobile__input" class="nav__overlay"></label>
                        <nav class="mobile">
                            <div class="nav-search__input">
                                <form action="">
                                    <input type="text" placeholder="Tìm kiếm"><button onclick=""><a href=""><i class="fas fa-search"></i></a></button>
                                </form>
                            </div>
                            <label for="nav-mobile__input" class="nav__close">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                                <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                            </svg>
                        </label>
                            <ul id="menu-mobali">
                                <li><a href="" class="mobali-link">TRANG CHỦ</a></li>
                                <li><a href="./gioithieu.php" class="mobali-link">GIỚI THIỆU</a></li>
                                <li>
                                    <a href="../product/coffe-vn.php" class="mobali-link">SẢN PHẨM
                                </a>
                                </li>
                                <li><a href="" class="mobali-link">TIN TỨC</a></li>
                                <li><a href="./oder.php" class="mobali-link">HƯỚNG DẪN ĐẶT HÀNG</a></li>
                                <li><a href="./lienhe.php" class="mobali-link">LIÊN HỆ</a></li>
                                <li><a href="./dangnhap.php" class="mobali-link">ĐĂNG NHẬP</a></li>
                            </ul>
                        </nav>
                        <div class="logo_item">
                            <img src="./image/logo.jpg" width="110px">
                        </div>
                        <!-- logo_item -->

                        <nav>
                            <ul id="main-menu">
                                <li><a href="">TRANG CHỦ</a></li>
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
                                <a href="./shopping.php">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
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
            <section class="banner-head">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./image/banner1.jpg" class="d-block w-100" width="100%">
                        </div>
                        <div class="carousel-item">
                            <img src="./image/banner2.jpg" class="d-block w-100" width="100%">
                        </div>
                        <div class="carousel-item">
                            <img src="./image/banner3.jpg" class="d-block w-100" width="100%">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </section>
            <!-- banner-head -->
            <aside>
                <div class="dear-item">
                    <div class="dear-item-one">
                        <div class="dear-image">
                            <img src="./image/service_1.png" alt="">
                        </div>
                        <!-- dear-image -->
                        <div class="dear-content">
                            <h5>GIAO HÀNG MIỄN PHÍ</h5>
                            <p>Với các đơn hàng từ 100.000đ trở lên</p>
                        </div>
                        <!-- dear-content -->
                    </div>
                    <!-- dear-item-one -->
                    <div class="dear-item-true">
                        <div class="dear-image">
                            <img src="./image/service_2.png" alt="">
                        </div>
                        <!-- dear-image -->
                        <div class="dear-content">
                            <h5>PHỤC VỤ NHANH 24/7</h5>
                            <p>8h00-22h30 tất cả các ngày trong tuần</p>
                        </div>
                        <!-- dear-content -->
                    </div>
                    <!-- dear-item-true -->
                    <div class="dear-item-three">
                        <div class="dear-image">
                            <img src="./image/service_3.png" alt="">
                        </div>
                        <!-- dear-image -->
                        <div class="dear-content">
                            <h5>ĐỒ UỐNG ĐA DẠNG</h5>
                            <p>Ding tea,Matcha,Gong cha…</p>
                        </div>
                        <!-- dear-content -->
                    </div>
                    <!-- dear-item-three -->
                </div>
                <!-- dear-item -->
            </aside>
            <!-- aside -->

            <main class="main_content">
                <div class="slider-product-one">
                    <article class="special_content">
                        <div class="special_content_text">
                            <div class="box-item"></div>
                            <h3 style="color: #555;">ĐỒ UỐNG MỚI</h3>
                            <div class="box-item2"></div>
                        </div>
                        <!-- special_content_text -->
                        <div class="product_content">
                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="./image/sp5.jpg" width="270px">
                                    </div>
                                    <div class="translate">
                                        <a href="">
                                            <button class="onclick">XEM CHI TIẾT</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ Y</p>
                                    <h6><a href="">COFFEE ĐÁ XAY</a></h6>
                                    <strong>30,000đ</strong>
                                </div>
                            </div>
                            <!-- product_cafe -->

                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="./image/sp6.jpg" width="270px">
                                    </div>
                                    <div class="translate">
                                        <a href="">
                                            <button class="onclick">XEM CHI TIẾT</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ Y</p>
                                    <h6><a href="">CHOCOLATE ĐÁ XAY</a></h6>
                                    <strong>30,000đ</strong>
                                </div>
                            </div>
                            <!-- product_cafe -->

                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="./image/sp7.jpg" width="270px">
                                    </div>
                                    <div class="translate">
                                        <a href="">
                                            <button class="onclick">XEM CHI TIẾT</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHE SƯA DA/NONG</p>
                                    <h6><a href="">CÀ PHÊ SỮA ĐÁ/NÓNG</a></h6>
                                    <strong>18,000đ</strong>
                                </div>
                            </div>
                            <!-- product_cafe -->

                            <div class="product_cafe">
                                <div class="product_cafe_box">
                                    <div class="cafe_image">
                                        <img src="./image/sp8.jpg" width="270px">
                                    </div>
                                    <div class="translate">
                                        <a href="">
                                            <button class="onclick">XEM CHI TIẾT</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="product_text">
                                    <p>CA PHÊ DEN DA/NONG</p>
                                    <h6><a href="">CÀ PHÊ ĐEN ĐÁ/NÓNG</a></h6>
                                    <strong>15,000đ</strong>
                                </div>
                            </div>
                            <!-- product_cafe -->
                        </div>
                        <!-- product_content -->
                    </article>
                    <!-- special_content -->
                </div>

                <article class="next_product">
                    <div class="next_text_product">
                        <h3 style="color: #555; font-size: 135%;">CÀ PHÊ VIỆT</h3>
                        <h6><a href="">Xem thêm ></a></h6>
                        <div class="lines"></div>
                        <div class="lines2"></div>
                    </div>
                    <!-- next_text_product -->
                    <div class="next_item_product">
                        <div class="next_item_content">
                            <div class="product_cafe_box">
                                <div class="cafe_item_image">
                                    <img src="./image/sp7.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA PHE SƯA DA/NONG</p>
                                <h6><a href="">CÀ PHÊ SỮA ĐÁ/NÓNG</a></h6>
                                <strong>18,000đ</strong>
                            </div>
                        </div>
                        <!-- next_item_content -->

                        <div class="next_item_content">
                            <div class="product_cafe_box">
                                <div class="cafe_item_image">
                                    <img src="./image/sp8.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA PHÊ DEN DA/NONG</p>
                                <h6><a href="">CÀ PHÊ ĐEN ĐÁ/NÓNG</a></h6>
                                <strong>15,000đ</strong>
                            </div>
                        </div>
                        <!-- next_item_content -->

                        <div class="next_item_content">
                            <div class="product_cafe_box">
                                <div class="cafe_item_image">
                                    <img src="./image/cacao.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA CAO DA/NONG</p>
                                <h6><a href="">CA CAO ĐÁ/NÓNG</a></h6>
                                <strong>18,000đ</strong>
                            </div>
                        </div>
                        <!-- next_item_content -->

                        <div class="next_item_content">
                            <div class="product_cafe_box">
                                <div class="cafe_item_image">
                                    <img src="./image/bacsiu.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>BAC SIU/CA PHE SUA TUOI</p>
                                <h6><a href="">BẠC SỈU</a></h6>
                                <strong>18,000đ</strong>
                            </div>
                        </div>
                        <!-- next_item_content -->
                    </div>
                    <!-- next_item_product -->
                </article>
                <!-- next_product -->

                <article class="three_products">
                    <div class="three_item">
                        <h3 style="color: #555; font-size: 135%;">CÀ PHÊ Ý</h3>
                        <h6><a href="">Xem thêm ></a></h6>
                        <div class="liness"></div>
                        <div class="liness2"></div>
                    </div>
                    <!-- three_item -->
                    <div class="three_product_content">
                        <div class="three_box_item">
                            <div class="product_cafe_box">
                                <div class="three_image">
                                    <img src="./image/sp5.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA PHE Y</p>
                                <h6><a href="">COFFEE ĐÁ XAY</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- three_box_item -->

                        <div class="three_box_item">
                            <div class="product_cafe_box">
                                <div class="three_image">
                                    <img src="./image/sp6.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA PHE Y</p>
                                <h6><a href="">CHOCOLATE ĐÁ XAY</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- three_box_item -->

                        <div class="three_box_item">
                            <div class="product_cafe_box">
                                <div class="three_image">
                                    <img src="./image/capuchino-25k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA PHE Y</p>
                                <h6><a href="">CAMPUCHINO</a></h6>
                                <strong>25,000đ</strong>
                            </div>
                        </div>
                        <!-- three_box_item -->

                        <div class="three_box_item">
                            <div class="product_cafe_box">
                                <div class="three_image">
                                    <img src="./image/sp1.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>CA PHE Y</p>
                                <h6><a href="">TRÀ XANH ĐÁ XAY</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- three_box_item -->
                    </div>
                    <!-- three_product_content -->
                </article>
                <!-- three products -->

                <article class="product_tea">
                    <div class="product_item_content">
                        <h3 style="color: #555; font-size: 135%;">NƯỚC ÉP-TRÀ</h3>
                        <h6><a href="">Xem thêm ></a></h6>
                        <div class="linesss"></div>
                        <div class="linesss3"></div>
                    </div>
                    <!-- product_item_content -->
                    <div class="content_product_tatol">
                        <div class="content_box_tea">
                            <div class="product_cafe_box">
                                <div class="tea_image">
                                    <img src="./image/trà-tắc-15k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>NUOC EP-TRA</p>
                                <h6><a href="">TRÀ TẮC</a></h6>
                                <strong>15,000đ</strong>
                            </div>
                        </div>
                        <!-- content_box_tea -->

                        <div class="content_box_tea">
                            <div class="product_cafe_box">
                                <div class="tea_image">
                                    <img src="./image/trà-lipton-15k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>NUOC EP-TRA</p>
                                <h6><a href="">TRÀ LIPTON</a></h6>
                                <strong>15,000đ</strong>
                            </div>
                        </div>
                        <!-- content_box_tea -->

                        <div class="content_box_tea">
                            <div class="product_cafe_box">
                                <div class="tea_image">
                                    <img src="./image/Trà-đào-20k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>NUOC EP-TRA</p>
                                <h6><a href="">TRÀ ĐÀO</a></h6>
                                <strong>20,000đ</strong>
                            </div>
                        </div>
                        <!-- content_box_tea -->

                        <div class="content_box_tea">
                            <div class="product_cafe_box">
                                <div class="tea_image">
                                    <img src="./image/sữa-tươi-thạch-trái-cây-20k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>NUOC EP-TRA</p>
                                <h6><a href="">SỮA TƯƠI THẠCH TRÁI CÂY</a></h6>
                                <strong>20,000đ</strong>
                            </div>
                        </div>
                        <!-- content_box_tea -->
                    </div>
                    <!-- content_product_tatol -->
                </article>
                <!-- product_tea -->

                <article class="product_vitamin">
                    <div class="item_vitamin_content">
                        <h3 style="color: #555; font-size: 135%;">SINH TỐ</h3>
                        <h6><a href="">Xem thêm ></a></h6>
                        <div class="linessss"></div>
                        <div class="linessss4"></div>
                    </div>
                    <!-- item_vitamin_content -->
                    <div class="total_vitamin_content">
                        <div class="product_box_vitamin">
                            <div class="product_cafe_box">
                                <div class="vitamin_image">
                                    <img src="./image/yaourt-trái-cây-25k-300x300 (1).jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>

                            <div class="product_text">
                                <p>SINH TO</p>
                                <h6><a href="">YAOURT TRÁI CÂY</a></h6>
                                <strong>25,000đ</strong>
                            </div>
                        </div>
                        <!-- product_box_vitamin -->

                        <div class="product_box_vitamin">
                            <div class="product_cafe_box">
                                <div class="vitamin_image">
                                    <img src="./image/yaourt-đá-25k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>SINH TO</p>
                                <h6><a href="">YAOURT ĐÁ</a></h6>
                                <strong>25,000đ</strong>
                            </div>
                        </div>
                        <!-- product_box_vitamin -->

                        <div class="product_box_vitamin">
                            <div class="product_cafe_box">
                                <div class="vitamin_image">
                                    <img src="./image/SINH-TO-xoài-25k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>SINH TO</p>
                                <h6><a href="">SINH TỐ XOÀI</a></h6>
                                <strong>25,000đ</strong>
                            </div>
                        </div>
                        <!-- product_box_vitamin -->

                        <div class="product_box_vitamin">
                            <div class="product_cafe_box">
                                <div class="vitamin_image">
                                    <img src="./image/SINH-TO-BO-25k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>SINH TO</p>
                                <h6><a href="">SINH TỐ BƠ</a></h6>
                                <strong>25,000đ</strong>
                            </div>
                        </div>
                        <!-- product_box_vitamin -->
                    </div>
                    <!-- total_vitamin_content -->
                </article>
                <!-- product_vitamin -->

                <article class="product_breakfast_food">
                    <div class="content_food">
                        <h3 style="color: #555; font-size: 135%;">ĐIỂM TÂM</h3>
                        <h6><a href="">Xem thêm ></a></h6>
                        <div class="linesssss"></div>
                        <div class="linesssss5"></div>
                    </div>
                    <!-- content_food -->
                    <div class="product_food_total">
                        <div class="product_food_item">
                            <div class="product_cafe_box">
                                <div class="food_image">
                                    <img src="./image/PHỞ-BÒ-30k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>DIEM TAM</p>
                                <h6><a href="">PHỞ BÒ</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- product_food_item -->

                        <div class="product_food_item">
                            <div class="product_cafe_box">
                                <div class="food_image">
                                    <img src="./image/NUI-XÀO-BÒ-30k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>DIEM TAM</p>
                                <h6><a href="">NUÔI XÀO BÒ</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- product_food_item -->

                        <div class="product_food_item">
                            <div class="product_cafe_box">
                                <div class="food_image">
                                    <img src="./image/mì-gà-30k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>DIEM TAM</p>
                                <h6><a href="">MỲ GÀ</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- product_food_item -->

                        <div class="product_food_item">
                            <div class="product_cafe_box">
                                <div class="food_image">
                                    <img src="./image/HỦ-TIẾU-BÒ-KHO-30k-300x300.jpg" width="270px">
                                </div>
                                <div class="translate">
                                    <button class="onclick">XEM CHI TIẾT</button>
                                </div>
                            </div>
                            <div class="product_text">
                                <p>DIEM TAM</p>
                                <h6><a href="">HỦ TIẾU BÒ KHO</a></h6>
                                <strong>30,000đ</strong>
                            </div>
                        </div>
                        <!-- product_food_item -->
                    </div>
                    <!-- product_food_total -->
                </article>
                <!-- product_breakfast_food -->

                <aside class="news">
                    <div class="news_bar"></div>
                    <h3 style="color: #555; font-size: 28px;">TIN TỨC KHUYẾN MÃI</h3>
                    <div class="news_bar2"></div>
                </aside>
                <!-- news -->
                <div class="see_more">
                    <button onclick="button">XEM THÊM</button>
                </div>
                <!-- see_more -->
            </main>
            <!-- main_content -->

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