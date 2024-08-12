<?php
include_once("E_Admin.php");
class Model_Admin{
    public function __construct(){}

        public function xuliLogin($admin)
        {
            $socket = "E:\\XAMPP\\mysql\\mysql.sock";
            $link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
            //Lựa chọn cơ sở dữ liệu
            mysqli_select_db($link,"qlnv");
            $query = "select * from admin where username = '$admin->username' and password = '$admin->password'";
            $result = mysqli_query($link,$query);
            $row = mysqli_num_rows($result);
            if ($row>0) {
                return true;
                
                
            // //    header("Location: ./viewPhongBan.php"); // Chuyển hướng đến viewPhongBan.php
        
            // } else {
            //     echo '<p style="color:red">Tên đăng nhập hoặc mật khẩu không đúng!</p>';
            }else{
                return false;
            }
        }
}
?>