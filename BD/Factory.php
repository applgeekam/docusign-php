<?php

require_once 'BD/Seeder.php';

$seeder = new Seeder;


$sql = 'insert into Articles(path, title, description, prix)'
. ' values( ?, ?, ?, ?)';

$datas = [];

$i = 0;

for($i = 1; $i <= 20; $i++)
{
    $data = [];
    $random = rand(1, 6);
    $data['path'] = "Contenu/nos_plantes/$random.jpg";
    $data['title'] = "Plante $i";
    $data['description'] = "C'est la description de plante $i";
    $data['prix'] = $i * 1000; 
    array_push($datas, $data);
}


foreach($datas as $data)
{
    $seeder->send($sql, 'Articles',  array($data['path'] ,$data['title'], $data['description'], $data['prix']));
}

