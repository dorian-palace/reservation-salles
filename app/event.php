<?php
require_once('bdd/bdd_log.php');

class Event{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Database::connexion_db();
    }


    public function getEventBetween(DateTime $start, DateTime $end): array{

        $req = $this->bdd->prepare("SELECT * from reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE debut BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'");
        $req->execute();
        $results = $req->fetchAll();
        return $results;
    }

    public function getEventBetweenByDay(DateTime $start, DateTime $end): array{

       $event = $this->getEventBetween($start, $end);
       $days = [];
       foreach($event as $events){
           $date = explode( ' ', $events['debut'])[0];
           if(!isset($days[$date])){ 
               $days[$date] = [$events];
           }else {
               $days[$date][] = $events;
           }
       }
       return $days;
    }
}
