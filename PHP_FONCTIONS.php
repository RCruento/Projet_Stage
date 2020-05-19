<?php
function connexionBDD(){
    try {
        $BDD = mysqli_connect("localhost", "root", "gemeau96", "projet_se");
    }
    catch (Exception $e){
        die('Échec de la connexion. Erreur : '.$e->getMessage());
    }
    return $BDD;
}

function deconnexionBDD($BDD){
    $BDD->close();
}

function sqlAdminAllInformations($BDD){
    if(!connexionBDD()) {
        $BDD = connexionBDD();
    }
        return $BDD->query('
                Select *
                FROM admin
         ');

}

function inAssoc($requet){
    return $data= mysqli_fetch_assoc($requet);
}

function modifUserName($username){

}

