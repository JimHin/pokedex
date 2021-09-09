<?php
require_once('api.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header("Access-Control-Max-Age", "3600");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");
try {
    if (!empty($_GET['demande'])) {
        $url = explode('/', filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'pokemons':
                if (empty($url[1])) {
                    getPokemons();
                } else {
                    throw new Exception("Cette demande n'est pas valide, vérifier l'url");
                }
                break;
            default:
                throw new Exception("Cette demande n'est pas valide, vérifier l'url");
                break;
        }
    } else {
        throw new Exception("Problème dans la récupération des données");
    }
} catch (Exception $e) {
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}
