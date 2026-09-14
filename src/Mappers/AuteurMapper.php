<?php
class AuteurMapper
{
    public static function mapToObject(array $datas): Auteur
    {
        return new Auteur(
            $datas['id'], 
            $datas['prenom'],
            $datas['nom']
        );
    }
}
?>