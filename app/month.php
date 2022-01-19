<?php
require_once('bdd/bdd_log.php');
class Month
{

    public $bdd;
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    private $month;
    private $year;

    public function __construct(?int $month = null, ?int $year = null)
    {
        //$this->bdd = Database::connexion_db();
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
        $month = $month % 12;
        $this->month = $month;
        $this->year = $year;
    }


    //Retourne le mois en string exe 07 = Juillet 
    public function toString(): string
    {
        return  $this->months[$this->month - 1] . ' ' . $this->year;
    }

    public function getWeeks(): int
    {
        $start = new \DateTime("{$this->year}-{$this->month}-01");
        $end = (clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format(('W')));
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }
}
