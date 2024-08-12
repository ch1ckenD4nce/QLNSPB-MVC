<?php
include_once("../Model/M_PhongBan.php");
include_once("../Model/M_NhanVien.php");

class Ctr_PhongBan{

    public function invoke() {
        if(!isset($_GET['mod'])) {
            // list phongban
          
                $modelPhongBan = new Model_PhongBan();
                $phongBanList = $modelPhongBan->getAllPhongBan();
                include_once("../View/PhongBan/PhongBanList_index.html");

            

        } else {
            if($_GET['mod']==1){
                $modelPhongBan = new Model_PhongBan();
                $phongBanList = $modelPhongBan->getAllPhongBan();
                include_once("../View/PhongBan/PhongBanList.html");

            }
            if($_GET['mod']== 2){

                if(isset($_POST['add_pb'])) {
                    $id = $_POST['id'];
                    $tenpb = $_POST['tenpb'];
                    $mota = $_POST['mota'];
                    
                    
                    $modelPhongBan = new Model_PhongBan();

                    $result =  $modelPhongBan->addPhongBan($id, $tenpb, $mota);
                    // day ve view

                    if($result) {
                        $phongBanList = $modelPhongBan->getAllPhongBan();
                        include_once("../View/PhongBan/PhongBanList.html");

                       // header("Location: C_PhongBan.php");
                        exit();
                    }
                    
                } else {
                    $modelPhongBan = new Model_PhongBan();
                    $phongBanList = $modelPhongBan->getAllPhongBan();
                   
                    ?>
                    <script>
                        function checkID(){
                            var ID_list = [];
                            <?php
                                for ($i = 0; $i < sizeof($phongBanList); $i++) {
                                ?>
                                    ID_list.push("<?php echo $phongBanList[$i]->Id_pb ?>");
                                <?php
                                }
                                ?>

                                var IDPBnew = document.form_AddPB.id.value;

                                if (ID_list.includes(IDPBnew)) {
                                    alert('Tồn tại nhân viên có ID này rồi');
                                    document.form_AddPB.id.value = "";
                                    document.form_AddPB.id.focus();
                                }
                        }
                    </script>
                    <?php
                     include_once("../View/PhongBan/AddPhongBan.html");
                }


            }if($_GET['mod']== 4){
                if(isset($_GET['IDPB'])) {
                    $modelPhongBan = new Model_PhongBan();
                    $phongban = $modelPhongBan->getPhongBanDetail($_GET['IDPB']);
                    include_once("../View/PhongBan/Form_Update.html");
                }else {
                    if(isset($_POST['update_pb'])) {
                        $Id_pb= $_POST['Id_pb'];
                        $Tenpb = $_POST['Tenpb'];
                        $Mota = $_POST['Mota'];
                        
                        
                        $modelPhongBan = new Model_PhongBan();
    
                        $result =  $modelPhongBan->updatePhongBan($Id_pb, $Tenpb, $Mota);
                        // day ve view
    
                        if($result) {
                            $phongBanList = $modelPhongBan->getAllPhongBan();
                            include_once("../View/PhongBan/PhongBanList.html");
    
                           // header("Location: C_PhongBan.php");
                            exit();
                        }else {
                            header("Location: C_PhongBan.php?mod=4&IDPB=".$Id_pb." ");
                        }

                }else{
                    $modelPhongBan = new Model_PhongBan();
                    $phongBanList = $modelPhongBan->getAllPhongBan();
                    include_once("../View/PhongBan/PhongBanList.html");

                }
            }
                   
                        
             }
                  
           // if($_GET[""]== 5){}
        }
    }
}
$C_PhongBan = new Ctr_PhongBan();
$C_PhongBan->invoke();

?>