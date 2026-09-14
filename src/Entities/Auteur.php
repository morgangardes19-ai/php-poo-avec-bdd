<?php
class Auteur
{
    private int $id;
    private string $prenom;
    private string $nom;

    public function __construct(int $id, string $prenom, string $nom)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        // throw new \Exception('Not implemented');
    }

    // getter et setter
    public function getId(): int
    {
        return $this->id;
    }
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
}