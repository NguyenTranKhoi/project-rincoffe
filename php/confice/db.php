<?php
    define('HOST','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DATABASE','duan1');

    function open_close_sql($sql){
        $connect = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);

        mysqli_set_charset($connect, 'utf-8');

        mysqli_query($connect,$sql);

        mysqli_close($connect);
    }

    function return_array($sql){
        $connect = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);

        mysqli_set_charset($connect, 'utf-8');

        $result = mysqli_query($connect,$sql);
        $data_list = [];

        while($row = mysqli_fetch_array($result, 1)){
            $data_list[] = $row;
        }
        mysqli_close($connect);

        return $data_list;
    }

    if (!function_exists('dd')) {
        function dd()
        {
            echo '<pre>';
            array_map(function ($x) {
                var_dump($x);
            }, func_get_args());
            echo '</pre>';
            die;
        }
    }

