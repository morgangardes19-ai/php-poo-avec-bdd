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

    public function insertAuteur(string $prenom, string $nom): bool
    {
        try {
            $request = $this->db->prepare("INSERT INTO `auteur`(`prenom`, `nom`) VALUES (:prenom,:nom)");
            $request->execute([
                ':prenom' => $prenom,
                ':nom' => $nom
            ]);

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }

    public function findById(int $id): Auteur
    {
        $request = $this->db->prepare(
            "SELECT * FROM auteur WHERE id = :id"
        );

        $request->execute([
            ':id' => $id
        ]);
        $categoriesDatas = $request->fetch(PDO::FETCH_ASSOC);

        return AuteurMapper::mapToObject($categoriesDatas);
    }

    public function update(int $id, string $prenom, string $nom): bool
    {
        try {
            $request = $this->db->prepare("UPDATE `auteur` SET `prenom`=:prenom, `nom`=:nom WHERE `id`=:id");
            $request->execute([
                ':id' => $id,
                ':prenom' => $prenom,
                ':nom' => $nom
            ]);

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
