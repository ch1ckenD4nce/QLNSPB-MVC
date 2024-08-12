<?php
class Entity_PhongBan{
    public $Id_pb;
    public $Tenpb;
   
    public $Mota;
    public function __construct($Id_pb, $Tenpb, $Mota){
        $this->Id_pb = $Id_pb;
        $this->Tenpb = $Tenpb;
        $this->Mota = $Mota;
    }
}
?>