<?php
function getConnection()
{
    return new PDO("mysql: host=localhost:8889;dbname=pokedex;charset=utf8", "root", "root");
}

function getPokemons()
{
    $db = getConnection();
    $req = "SELECT pok_name, pok_image, pok_description FROM pokemon ORDER BY pok_name";
    $stmt = $db->prepare($req);
    $stmt->execute();
    $pokedex = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json");
    echo json_encode($pokedex, JSON_PRETTY_PRINT);
}


