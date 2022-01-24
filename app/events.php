<?php
require_once('bdd/bdd_log.php');

class Events
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Database::connexion_db();
    }


    public function getEventBetween(DateTime $start, DateTime $end): array
    {

        $req = $this->bdd->prepare("SELECT * from reservations  WHERE debut BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'");
        $req->execute();
        $results = $req->fetchAll();
        return $results;
    }

    public function getEventBetweenByDay(DateTime $start, DateTime $end): array
    {

        $events = $this->getEventBetween($start, $end);
        $days = [];
        foreach ($events as $event) {
            $date = explode(' ', $event['debut'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }

    public function getUser_event()
    {
        return $this->bdd->query("SELECT * FROM reservations inner join utilisateurs on reservations.id_utilisateur = utilisateurs.id")->fetch();
    }
    //récupère un évenement
    public function find(int $id)
    {
        return $this->bdd->query("SELECT * FROM reservations WHERE id = '$id'")->fetch();
    }
}
