<?php
class AuteurRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        $request = $this->db->query("SELECT * FROM `auteur` WHERE 1;");
        $auteursDatas = $request->fetchAll(PDO::FETCH_ASSOC);


        $auteurs = [];

        foreach ($auteursDatas as $auteurDatas) {
            $auteurs[] = AuteurMapper::mapToObject($auteurDatas);
        }
        return $auteurs;
    }

    public function insert(string $prenom, string $nom): bool
    {
        try {
            $request = $this->db->prepare("INSERT INTO `auteur`(`prenom`, `nom`) VALUES (':prenom',':nom')");
            $request->execute([
                ':prenom' => $prenom,
                ':nom' => $nom
            ]);

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
