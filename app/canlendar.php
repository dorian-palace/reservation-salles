<?php
require_once('bdd/bdd_log.php');
class Calendar
{

    public $bdd;

    public function __construct()
    {
        $this->bdd = Database::connexion_db();
        


    }
}
