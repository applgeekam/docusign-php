<?php

require_once 'Modele/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Articles extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getArticles() {
        $sql = 'select * from Articles';
        $art = $this->executerRequete($sql);
        return $art->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id)
    {
        $sql = 'select * from Articles'
                . ' where id=?';
        $art = $this->executerRequete($sql, array($id));
        return $art->fetch(PDO::FETCH_ASSOC);
    }

}