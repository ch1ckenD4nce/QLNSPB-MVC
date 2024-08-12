<?php
include_once("E_PhongBan.php");

class Model_PhongBan{
    public function __construct(){}

    public function getAllPhongBan(){
          // mysqli_select_db($link, "qlnv");
          //require_once("connect.php");
          $socket = "E:\\XAMPP\\mysql\\mysql.sock";
            $link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
            //Lựa chọn cơ sở dữ liệu
            mysqli_select_db($link,"qlnv");
            
          $sql = "select * from phongban";
          
          $result = mysqli_query($link, $sql);

          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            $id_pb = $row["IDPB"];
            $tenpb = $row["Tenpb"];
            $mota = $row["Mota"];
            // while($i!=$id_pb) $i++;
            $PhongBans[$i++] = new Entity_PhongBan($id_pb, $tenpb, $mota);

          }
          return $PhongBans;
    }
    // public function getPhongBanDetail($idpb)
    // {
    //       $socket = "E:\\XAMPP\\mysql\\mysql.sock";
    //       $link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
    //       //Lựa chọn cơ sở dữ liệu
    //       mysqli_select_db($link,"qlnv");
          
    //     $sql = "select * from phongban where IDPB='" .$idpb. "'";
        
    //     $result = mysqli_query($link, $sql);
    //    // $phongban = new ArrayObject();
    //     $i = 1;
    //     while ($row = mysqli_fetch_array($result)) {
    //       $Id_pb = $row["IDPB"];
    //       $Tenpb = $row["Tenpb"];
    //       $Mota = $row["Mota"];
    //       // while($i!=$id_pb) $i++;
    //       $phongban[$i++] = new Entity_PhongBan($Id_pb, $Tenpb, $Mota);

    //     }
    //     return $phongban[1];
      
    // }
    public function getPhongBanDetail($idpb)
{
    $socket = "E:\\XAMPP\\mysql\\mysql.sock";
    $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die("Không thể kết nối SQL");
    //Lựa chọn cơ sở dữ liệu
    mysqli_select_db($link, "qlnv");

    // Sử dụng tham số chống SQL injection
    $sql = "SELECT * FROM phongban WHERE IDPB=?";
    
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $idpb);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $phongban = null;
    
    while ($row = mysqli_fetch_array($result)) {
        $Id_pb = $row["IDPB"];
        $Tenpb = $row["Tenpb"];
        $Mota = $row["Mota"];

        $phongban = new Entity_PhongBan($Id_pb, $Tenpb, $Mota);
        break;  // Chỉ lấy một dòng dữ liệu
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);

    return $phongban;
}

    public function addPhongBan($id, $tenpb, $mota){
      $socket = "E:\\XAMPP\\mysql\\mysql.sock";
      $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die ("Không thể kết nối SQL");
      mysqli_select_db($link, "qlnv");


      $sql = "INSERT INTO phongban (IDPB, Tenpb, Mota) VALUES ('$id', '$tenpb', '$mota')";
      $result = mysqli_query($link, $sql);
      mysqli_close($link);
      return $result;
    }

    public function updatePhongBan($id, $tenpb, $mota) {
      $socket = "E:\\XAMPP\\mysql\\mysql.sock";
      $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die("Không thể kết nối SQL");
      mysqli_select_db($link, "qlnv");

      // $name = mysqli_real_escape_string($link, $name);
      // $university = mysqli_real_escape_string($link, $university);

      $sql = "UPDATE phongban SET IDPB='$id', Tenpb=$tenpb, Mota='$mota' WHERE IDPB=$id";
      $result = mysqli_query($link, $sql);
      mysqli_close($link);
      return $result;
  }


}
?>