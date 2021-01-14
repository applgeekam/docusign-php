<?php

require_once 'Modele/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Commandes extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function insert($values) {
        $sql = 'insert into Commandes(date, id_art, qte, adr)'
            . ' values(?, ?, ?, ?)';
        $date = date('Y-m-d h-m-s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $values['id_art'], $values['qte'], $values['adr']));
    }


}