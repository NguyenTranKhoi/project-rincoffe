<?php
session_start();
require_once "./../php/confice/glopal.php";
require_once "../php/confice/db.php";
if (isset($_GET['id']) && !empty($_POST)) {
    $id = $_GET['id'];

    $product_number = $_POST['soluong'];
    $sql = "SELECT * FROM `san_pham` WHERE `id` = $id";
    $data_product = return_array($sql);
    // dd($data_product);
    if ($data_product[0]['trang_thai'] != 0) {
        header("location: http://localhost/DUAN1/product/productcoffe.php?id=$id");
        die();
    }

    if (!isset($_SESSION['cart'])) {
        $cart = [];
        $cart[$id] = [
            'id' => $id,
            'name' => $data_product[0]['name'],
            'img' => $data_product[0]['img'],
            'price' => $data_product[0]['price'],
            'soluong' => $product_number,
            'sum_money' => $data_product[0]['price'] * $product_number,
        ];
    } else {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = [
                'id' => $id,
                'name' => $data_product[0]['name'],
                'img' => $data_product[0]['img'],
                'price' => $data_product[0]['price'],
                'soluong' => (int)$cart[$id]['soluong'] + $product_number,
                'sum_money' => $data_product[0]['price'] * $product_number,
            ];
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $data_product[0]['name'],
                'img' => $data_product[0]['img'],
                'price' => $data_product[0]['price'],
                'soluong' => $product_number,
                'sum_money' => $data_product[0]['price'] * $product_number,
            ];
        }
    }
    $_SESSION['cart'] = $cart;


    header('Location: ' . BASE_URL . 'shopping.php');
} else {
    header('Location: ' . BASE_URL . 'coffe-vn.php');
    die();
}
