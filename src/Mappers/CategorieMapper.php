<?php
class CategorieMapper
{
    public static function mapToObject(array $datas): Categorie
    {
        return new Categorie(
            $datas['id'], 
            $datas['intitule']
        );
    }
}
