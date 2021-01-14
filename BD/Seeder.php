<?php

require_once 'Modele/Modele.php';

 class Seeder extends Modele{

    public function query($sql, $table)
    {
        
        $this->executerRequete("drop table if exists $table;");
        $this->executerRequete($sql);
        echo "La table $table s'est bien seedé<br>";
    }

    public function send ($sql, $table, $param)
    {
        $this->executerRequete($sql, $param);
        echo "Les donnee de la table $table sont bien envoyes <br>";
    }

}
