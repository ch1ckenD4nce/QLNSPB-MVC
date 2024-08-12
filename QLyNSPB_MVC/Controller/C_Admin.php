<?php
include_once("../Model/M_Admin.php");
class Ctr_Admin{
   public function invoke(){
    if(isset($_GET['mod'])&& $_GET['mod']==1){
        if (isset($_POST['btok'])){
            $newAdmin = new Entity_Admin($_POST['name'], $_POST['pass']);
            $modelAdmin = new Model_Admin();
            $bool = $modelAdmin->xuliLogin($newAdmin);
            if ($bool){
                session_start(); // Bắt đầu phiên session
                $_SESSION['username'] = $_POST['name']; // Lưu tên đăng nhập vào session
                 // Lưu mật khẩu vào session (lưu ý: không nên lưu mật khẩu vào session vì lý do bảo mật)
                 //echo '<script>window.top.frames["t2"].location.href = "T2.php";</script>';
               
                 echo '<script>window.top.frames["t2"].location.href = "../T2.php";</script>';
            }
        }
    }if(isset($_GET['mod'])&& $_GET['mod']==2){
        session_start();
        session_unset();
        session_destroy();
       //echo '<script>window.parent.refresh();</script>';
       echo '<script>window.top.frames["t2"].location.href = "../T2.php";</script>';

    }
    


   }
    
}
$C_Admin = new Ctr_Admin();
$C_Admin->invoke();

?>