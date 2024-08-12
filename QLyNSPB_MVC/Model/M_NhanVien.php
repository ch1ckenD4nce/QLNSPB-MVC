<?php
include_once("E_NhanVien.php");

class Model_NhanVien{
    public function __construct(){}

    public function getAllNhanVien(){
          // mysqli_select_db($link, "qlnv");
          //require_once("connect.php");
          $socket = "E:\\XAMPP\\mysql\\mysql.sock";
            $link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
            //Lựa chọn cơ sở dữ liệu
            mysqli_select_db($link,"qlnv");
            
          $sql = "select * from nhanvien";
          
          $result = mysqli_query($link, $sql);

          $i = 0;
          while ($row = mysqli_fetch_array($result)) {
            $idnv = $row["IDNV"];
            $hoten = $row["Hoten"];
            $idpb = $row["IDPB"];
            $diachi = $row["Diachi"];
            $NhanViens[$i++] = new Entity_NhanVien($idnv, $hoten, $idpb, $diachi);

          }
          return $NhanViens;
    }
    public function getNhanVienDetail($idnv)

    {
      $socket = "E:\\XAMPP\\mysql\\mysql.sock";
      $link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
      //Lựa chọn cơ sở dữ liệu
      mysqli_select_db($link,"qlnv");
      $query = "SELECT * FROM nhanvien WHERE IDNV = '" . $idnv . "'";

      $result = mysqli_query($link, $query);

      $row = mysqli_fetch_assoc($result);
      $nhanvien = new Entity_NhanVien($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);

      return $nhanvien;


      // $allNhanVien = $this->getAllNhanVien();
      // return $allNhanVien[$idnv];
    }

    public function getNhanVienPB($idpb){
            $socket = "E:\\XAMPP\\mysql\\mysql.sock";
            $link = mysqli_connect("localhost", "root", "", null, 3307, $socket)  or die ("Không thể kết nối SQL");
            //Lựa chọn cơ sở dữ liệu
            mysqli_select_db($link,"qlnv");
            
        $sql = "select * from nhanvien where IDPB ='" .$idpb. "'";
        
        $result = mysqli_query($link, $sql);

        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $idnv = $row["IDNV"];
            $hoten = $row["Hoten"];
            $idpb = $row["IDPB"];
            $diachi = $row["Diachi"];
            $NhanViens[$i++] = new Entity_NhanVien($idnv, $hoten, $idpb, $diachi);

        }
        return $NhanViens;

    }

    public function timkiem($text, $option) {
      $socket = "E:\\XAMPP\\mysql\\mysql.sock";
      $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die("Không thể kết nối SQL");
      mysqli_select_db($link, "qlnv");
  
      $sql = ""; // Initialize $sql variable
  
      if ($option == "id") {
          $sql = "SELECT * FROM nhanvien WHERE IDNV LIKE '$text'";
      } else if ($option == "ten") {
          $sql = "SELECT * FROM nhanvien WHERE Hoten LIKE '%$text'";
      } else if ($option == "diachi") {
          $sql = "SELECT * FROM nhanvien WHERE Diachi LIKE '$text'";
      } 
  
      if (!empty($sql)) {
          $result = mysqli_query($link, $sql);
          $nhanVienList = array();
          while ($row = mysqli_fetch_assoc($result)) {
            $nhanVienList[] = new Entity_NhanVien($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
          }
          mysqli_free_result($result);
      } else {
        $nhanVienList = array(); // Set students to an empty array if $sql is empty
      }
  
      mysqli_close($link);
      return $nhanVienList;
  }
  
  public function addNhanVien($IDNV, $Hoten, $IDPB, $Diachi){
    $socket = "E:\\XAMPP\\mysql\\mysql.sock";
    $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die ("Không thể kết nối SQL");
    mysqli_select_db($link, "qlnv");


    $sql = "INSERT INTO nhanvien (IDNV, Hoten, IDPB, Diachi) VALUES ('$IDNV', '$Hoten', '$IDPB', '$Diachi')";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    return $result;
  }

  public function deleteNhanVien($ids) {
    $socket = "E:\\XAMPP\\mysql\\mysql.sock";
    $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die("Không thể kết nối SQL");
    mysqli_select_db($link, "qlnv");

    $escapedIds = array_map(function($id) use ($link) {
      return mysqli_real_escape_string($link, $id);
  }, $ids);

  $deletelist = implode("','", $escapedIds); 
   // $deletelist = implode(",", $ids); // chuyen mang thanh cac chuoi
    $sql = "DELETE FROM nhanvien WHERE IDNV IN ('$deletelist')";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    return $result;
}

public function update($nhanvien)
    {
      $socket = "E:\\XAMPP\\mysql\\mysql.sock";
      $link = mysqli_connect("localhost", "root", "", null, 3307, $socket) or die("Không thể kết nối SQL");
      mysqli_select_db($link, "qlnv");
  
        $query = "UPDATE nhanvien SET Hoten='" . $nhanvien->Hoten . "',IDPB='" . $nhanvien->IDPB . "',Diachi='" . $nhanvien->Diachi . "' WHERE IDNV = '" . $nhanvien->IDNV . "'";
        echo $query;
        $result = mysqli_query($link, $query);

        return $result;
    }


}

?>