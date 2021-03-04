<?php

namespace Example\Modele;

use Example\Modele\Modele;
use \PDO;


class Envelope extends Modele {

  public function save($values) {
      $sql = 'insert into Envelopes (
        dateC,
        account_id,
        envelope_id,
        file_link,
        file_name,
        signer_email,
        signer_name,
        cc_email,
        cc_name,
        status
        ) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
      $dateC = date('Y-m-d h-m-s');  // Récupère la date courante
      $this->executerRequete($sql, array(
        $dateC,
        $values['account_id'],
        $values['envelope_id'],
        $values['file_link'],
        $values['file_name'],
        $values['signer_email'],
        $values['signer_name'],
        $values['cc_email'],
        $values['cc_name'],
        $values['status']
      ));
  }

    // Renvoie la liste des Envelopes
    public function getAll() {
        $sql = 'select * from Envelopes';
        $envelopes = $this->executerRequete($sql);
        return $envelopes->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id)
    {
        $sql = 'select * from Envelopes'
                . ' where id = ?';
        $envelope = $this->executerRequete($sql, array($id));
        return $envelope->fetch(PDO::FETCH_ASSOC);
    }

    public function getOneByEnvelopeId($envelope_id)
    {
        $sql = 'select * from Envelopes'
                . ' where envelope_id = ?';
        $envelope = $this->executerRequete($sql, array($envelope_id));
        return $envelope->fetch(PDO::FETCH_ASSOC);
    }


    public function updateState($state, $id)
    {
      $sql = 'update Envelopes set status=? where envelope_id=?';
      $this->executerRequete($sql, array($state, $id));
    }

}

// Creation de la db
/*

  Create Table Envelopes (
  id int PRIMARY KEY AUTO_INCREMENT not null,
  dateC DateTime,
  account_id text,
  envelope_id text,
  file_link varchar(250),
  file_name varchar(200),
  signer_email varchar(100),
  signer_name varchar(100),
  cc_email varchar(100),
  cc_name varchar(100),
  status varchar(50)
  )

*/
