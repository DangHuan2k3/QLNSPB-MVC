<?php
class Entity_NhanVien
{
    public $IDNV;
    public $hoten;
    public $IDPB;
    public $diachi;

    public function __construct($IDNV, $hoten, $IDPB, $diachi)
    {
        $this->IDNV = $IDNV;
        $this->hoten = $hoten;
        $this->IDPB = $IDPB;
        $this->diachi = $diachi;
    }
}
