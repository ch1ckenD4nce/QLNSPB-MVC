<?php
//Khai báo kết nối

$socket = "E:\\XAMPP\\mysql\\mysql.sock";
$link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
//Lựa chọn cơ sở dữ liệu
mysqli_select_db($link,"qlnv");


?>
