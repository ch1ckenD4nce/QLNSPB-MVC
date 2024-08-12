<?php
include_once("../Model/M_PhongBan.php");
include_once("../Model/M_NhanVien.php");

class Ctr_NhanVien{

    public function invoke() {
        if(!isset($_GET['mod'])) {
            if(isset($_GET['IDPB'])) {
                $modelNhanVien = new Model_NhanVien();
                $nhanVienList= $modelNhanVien->getNhanVienPB($_GET['IDPB']);
                include_once("../View/NhanVien/NhanVienPhongBan.html");


            }else{

                $modelNhanVien = new Model_NhanVien();
                $nhanVienList= $modelNhanVien->getAllNhanVien();
                include_once("../View/NhanVien/NhanVienList.html");

            }
            // list phongban
        } else 
        {
            if($_GET['mod'] == 1){
                if(isset($_POST['timkiem']) && isset( $_POST['option'])){
                    $text = $_POST['timkiem'];
                    $option = $_POST['option'];
                    $modelNhanVien = new Model_NhanVien();
                    $nhanVienList = $modelNhanVien->timkiem($text, $option);
                    $allNhanViens = $modelNhanVien->getAllNhanVien();
                    include_once("../View/NhanVien/TimKiem.html");
                }
                else{
                    $modelNhanVien = new Model_NhanVien();
                    $nhanVienList = $modelNhanVien->getAllNhanVien();
                    include_once("../View/NhanVien/TimKiem.html");
                }

            }
            if($_GET['mod'] == 2){
                if(isset($_POST['add_nv'])) {
                    $IDNV = $_POST['idnv'];
                    $Hoten = $_POST['hoten'];
                    $IDPB = $_POST['idpb'];
                    $Diachi = $_POST['diachi'];
                    
                    
                    $modelNhanVien = new Model_NhanVien();

                    $result =  $modelNhanVien->addNhanVien($IDNV, $Hoten, $IDPB, $Diachi);
                    // day ve view

                    if($result) {
                        $nhanVienList = $modelNhanVien->getAllNhanVien();
                        include_once("../View/NhanVien/NhanVienList.html");

                       // header("Location: C_PhongBan.php");
                        exit();
                    }
                    
                } else {
                    $modelNhanVien = new Model_NhanVien();
                    $nhanVienList = $modelNhanVien->getAllNhanVien();
                    $modelPhongBan = new Model_PhongBan();
                    $phongbans = $modelPhongBan->getAllPhongBan();
                   
                    ?>
                    <script>
                        function checkID(){
                            var ID_list = [];
                            <?php
                                for ($i = 0; $i < sizeof($nhanVienList); $i++) {
                                ?>
                                    ID_list.push("<?php echo $nhanVienList[$i]->IDNV ?>");
                                <?php
                                }
                                ?>

                                var IDNVnew = document.form_AddNV.idnv.value;

                                if (ID_list.includes(IDNVnew)) {
                                    alert('Tồn tại nhân viên có ID này rồi');
                                    document.form_AddNV.idnv.value = "";
                                    document.form_AddNV.idnv.focus();
                                }
                        }
                    </script>
                    <?php
                     include_once("../View/NhanVien/AddNhanVien.html");
                }

            }
            if($_GET['mod'] == 3){
                if(isset($_POST['delete'])) {
                    $ids = $_POST['delete'];
                    $modelNhanVien = new Model_NhanVien();
                    $result = $modelNhanVien->deleteNhanVien($ids);
                    if($result) {
                        header("Location: C_NhanVien.php?mod=3");
                    }else {
                        header("Location: C_NhanVien.php?mod=3");
                    }
                }else{
                    $modelNhanVien = new Model_NhanVien();
                    $nhanVienList = $modelNhanVien->getAllNhanVien();
                    include_once("../View/NhanVien/DeleteNhanVien.html");
                }
            }
            // if($_GET['mod'] == 4){
            //     if(isset($_POST['id'])){
            //         if(isset($_POST['update'])) {
            //             $modelNhanVien = new Model_NhanVien();
            //             $result = $modelNhanVien->update(new Entity_NhanVien($_POST['idnv'], $_POST['hoten'], $_POST['idpb'],$_POST['diachi']));
            //             if($result) {
            //                 $nhanVienList= $modelNhanVien->getAllNhanVien();
            //                 include_once("../View/NhanVien/NhanVienList.html");
                            
            //             }else{echo'Update kh thanh cong';}

            //            }
            //            else {
            //                 $modelNhanVien = new Model_NhanVien();
            //                 $nhanVien = $modelNhanVien->getNhanVienDetail($id);

            //                 $modelPhongBan = new Model_PhongBan();
            //                 $phongbans = $modelPhongBan->getAllPhongBan();
            //                 include_once("../View/NhanVien/Form_Update.html");

                        
            //                // include_once("../View/AddStudent.html");
            //            }
                       
            //         } else{
            //             $modelNhanVien = new Model_NhanVien();
            //             $nhanVienList = $modelNhanVien->getAllNhanVien();
            //            include_once("../View/NhanVien/UpdateNhanVien.html");
            //         }
            //   }
            if($_GET['mod'] == 4) {
                if(isset($_GET['id'])) {
                    $modelNhanVien = new Model_NhanVien();
                    $nhanVien = $modelNhanVien->getNhanVienDetail($_GET['id']);

                    $modelPhongBan = new Model_PhongBan();
                    $phongbans = $modelPhongBan->getAllPhongBan();
                    include_once("../View/NhanVien/Form_Update.html");
                //  $modelStudent = new Model_Student();
                //  $student = $modelStudent->getStudentDetail($_GET['stid']);
                //  include_once("../View/Form_Update.html");
                }else {
                      if(isset($_POST['update'])) {
                        $modelNhanVien = new Model_NhanVien();
                        $id = $_POST['idnv'];
                        $result = $modelNhanVien->update(new Entity_NhanVien($_POST['idnv'], $_POST['hoten'], $_POST['idpb'],$_POST['diachi']));
                        
 
                        //  $id = $_POST['id'];
                        //  $name = $_POST['name'];
                        //  $age = $_POST['age'];
                        //  $university = $_POST['university'];
                         
                        //  $modelStudent = new Model_Student();
     
                        //  $result =  $modelStudent->updateStudent($id, $name, $age, $university);
                         // day ve view
     
                         if($result) {
                             header("Location: C_NhanVien.php?mod=4");
                             exit();
                         }
                         else {
                             header("Location: C_NhanVien.php?mod=4&id=".$id." ");
                             // include_once("../View/AddStudent.html");
                         }
                         
                      } else{
                        $modelNhanVien = new Model_NhanVien();
                        $nhanVienList = $modelNhanVien->getAllNhanVien();
                       include_once("../View/NhanVien/UpdateNhanVien.html");
            }
                }
             }

        }
      
        
    }
}
$C_NhanVien = new Ctr_NhanVien();
$C_NhanVien->invoke();

?>