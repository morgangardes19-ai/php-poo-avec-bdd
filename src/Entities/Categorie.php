<?php
class Categorie
{
// ======================== Quand les informations sont identiques partout, on peut condenser le code comme ci-dessous
    public function __construct(
        private int $id,
        private string $intitule
    ) {}
    // ======================================

    // getter et setter
    public function getId(): int
    {
        return $this->id;
    }

    public function getIntitule(): string
    {
        return $this->intitule;
    }

}
