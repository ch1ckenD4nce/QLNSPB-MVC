


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T2</title>
    <link rel="stylesheet" href="T2.css">

</head>
<body>
    <div class="sidebar">
        <ul>
            <hr>
            <?php
            
            session_start(); // Bắt đầu phiên session (lưu ý: bạn cần bắt đầu phiên session trước khi sử dụng các biến session)
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username']; // Lấy tên đăng nhập từ session // Lấy mật khẩu từ session (lưu ý: không nên lưu mật khẩu vào session vì lý do bảo mật)
                // Sử dụng tên đăng nhập và mật khẩu ở đây theo ý của bạn
            
                echo '<li>Xin chào, ' . $_SESSION['username']. '</li>';
                echo '<li><a href="Controller/C_Admin.php?mod=2" target="t3">Đăng xuất</a></li>';
                echo '<hr>';

                    
                echo '<li><a href="Controller/C_PhongBan.php" target="t3">Xem phòng ban</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_PhongBan.php?mod=2" target="t3">Thêm phòng ban</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php" target="t3">Xem nhân viên</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php?mod=2" target="t3">Thêm nhân viên</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php?mod=3" target="t3">Xóa nhân viên</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php?mod=4" target="t3">Cập nhật nhân viên</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php?mod=1" target="t3">Tìm kiếm nhân viên</a></li>';
                echo '<hr>';
            } else {
                // Nếu session không tồn tại, có thể chuyển hướng người dùng đến trang đăng nhập hoặc thực hiện các hành động khác tùy thuộc vào yêu cầu của bạn
                echo '<li><a href="View/Admin/Login.html" target="t3">Đăng nhập</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_PhongBan.php"" target="t3">Trang chủ</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_PhongBan.php" target="t3">Xem phòng ban</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php" target="t3">Xem nhân viên</a></li>';
                echo '<hr>';
                echo '<li><a href="Controller/C_NhanVien.php?mod=1" target="t3">Tìm kiếm nhân viên</a></li>';
                echo '<hr>';



               
             
            }

            ?>
        </ul>
    </div>
</body>
</html>
