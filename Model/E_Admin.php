<?php
class Entity_Admin
{
    public $ID;
    public $username;
    public $password;

    public function __construct($ID, $username, $password)
    {
        $this->ID = $ID;
        $this->username = $username;
        $this->password = $password;
    }
}
