<?php

class CategorieRepository
{
    // la propriété $db va contenir la connexion à la BDD, elle est de type objet PDO
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    // findALL a pour objectif de récupérer toute la table de la BDD, ici ce sera toutes les différentes catégories de livre donc le tableau "catégorie".
    //  :array (= la fonction retourne un tableau)
    public function findAll(): array
    {

        // Cette ligne ci-dessous : $this->db->query("SELECT * FROM `categorie` WHERE 1;"); ==> "utilise ma connexion PDO pour envoyer cette requête à la BDD
        $request = $this->db->query("SELECT * FROM `categorie` WHERE 1;");
        // Ci dessous : fetcAll() récupère toutes les lignes obtenues par la requête. PDO::FETCH_ASSOC demande à PDO de nous donner chaque ligne sous forme de tableau associatif
        $categoriesDatas = $request->fetchAll(PDO::FETCH_ASSOC);
        // Ensuite on crée un tableau vide pour y ajouter progressivement des objets de la table Categorie
        $categories = [];
        // 
        foreach ($categoriesDatas as $categorieDatas) {
            $categories[] = CategorieMapper::mapToObject($categorieDatas);
        }
        return $categories;
    }


    // public function findOne(int $id): Categorie
    // {
    //     $request = $this->db->prepare("SELECT * FROM `categorie` WHERE 'id'=:id;");
    //     $request->execute([
    //         ':id' => $id
    //     ]);
    //     $categorieDatas = $request->fetch(PDO::FETCH_ASSOC);

    //     $categorie = CategorieMapper::mapToObject($categorieDatas);
    //     return $categorie;
    // }

    public function insert(string $intitule): bool
    {
        try {
            $request = $this->db->prepare("INSERT INTO `categorie`(`intitule`) VALUES (:intitule)");
            $request->execute([
                ':intitule' => $intitule
            ]);

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }


    public function update(int $id, string $intitule): bool
    {
        try {
            $request = $this->db->prepare("UPDATE `categorie` SET `intitule`=:intitule WHERE `id`=:id");
            $request->execute([
                ':id' => $id,
                ':intitule' => $intitule
            ]);

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }

    public function findById(int $id): Categorie
    {
        $request = $this->db->prepare(
            "SELECT * FROM categorie WHERE id = :id"
        );

        $request->execute([
            ':id' => $id
        ]);
        $categoriesDatas = $request->fetch(PDO::FETCH_ASSOC);
        
        return CategorieMapper::mapToObject($categoriesDatas);
    }
    

        // public function delete(int $id): bool
        // {
        //     try {
        //         $request = $this->db->prepare("DELETE FROM `categorie` WHERE 'id'=:id");
        //         $request->execute([
        //             ':id' => $id
        //         ]);

        //         return true;
        //     } catch (\Throwable $th) {

        //         return false;
        //     }
        // }
}
