<?php
require ('app/events.php');
class Event

{

    private $id;

    private $titre;

    private $description;

    private $debut;

    private $fin;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDebut(): \DateTime{
        return new \DateTime($this->debut) ;
    }

    public function getFin(): \DateTime{
        return new \DateTime($this->fin) ;
    }
}
