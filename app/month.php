<?php
class Month
{
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    public $month;
    public $year;

    public function __construct(?int $month = null, ?int $year = null)
    {
        if ($month === null || $month < 1 || $month > 12) {
            $month = intval(date('m'));
        }
        if ($year === null ) {
            $year = intval(date('Y'));
        }
        $this->month = $month;
        $this->year = $year;
        
    }

    //renvoi le premier jour du mois
    public function getStartingDay(): \DateTime
    {
        return new \DateTime("{$this->year}-{$this->month}-01");
    }


    //Retourne le mois en string exe 07 = Juillet 
    public function toString(): string
    {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }

    public function getWeeks(): int
    {
        // renvoi le nombre de semaine dans le mois
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format( 'W')) + 1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    public function withinMonth(\DateTime $date): bool
    {
        // Est-ce que le jour est dans le mois en cours
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m'); //si le mois et l'année correspondent dans ce cas la les deux informations correspondent 
    }

    public function nextMonth(): Month
    {
        //renvoi le mois suivant
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    public function previousMonth(): Month
    {
        //renvoi le mois precedent
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }
}
