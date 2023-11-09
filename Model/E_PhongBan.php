<?php
class Entity_PhongBan
{
    public $id;
    public $tenpb;

    public $mota;

    public function __construct($id, $tenpb, $mota)
    {
        $this->id = $id;
        $this->tenpb = $tenpb;
        $this->mota = $mota;
    }
}
