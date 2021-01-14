<?php

require_once 'BD/Seeder.php';

$seeder = new Seeder;

$sql = "create table Articles (
    id integer primary key auto_increment,
    path varchar(300) default 'Contenu/nos_plantes/4.jpg',
    title varchar(100) not null,
    description text,
    prix integer not null
);";

$seeder->query($sql, 'Articles');

$sql = "create table Users (
    id integer primary key auto_increment,
    nom varchar(100) not null,
    password varchar(300) not null,
    seesionId varchar(250) not null,
    prenom text not null,
    email integer not null,
    active boolean not null
      ) ;";

$seeder->query($sql, 'Users');


$sql = "create table Commandes (
    id integer primary key auto_increment,
    date datetime not null,
    id_art integer not null,
    qte integer not null,
    adr varchar(300),
    constraint fk_com_art foreign key(id_art) references Articles(id)
);";

$seeder->query($sql, 'Commandes');
