<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 15/12/2015
 * Time: 21:50
 */

$login = "jeremy.dulon@live.fr";
$motDePasse = "password";
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u155999183_hyper;charset=utf8', 'u155999183_root', 'ingesup');

connexion($bdd,$login,$motDePasse);


function connexion ($bdd, $login, $password) {
    $requete = "SELECT * FROM utilisateur WHERE email = '" . $login . "' AND mdp = '" . $password . "'";
    $resultat = $bdd->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $user = $resultat->fetch();
    if (!$user) {
        echo("identifiant ou mot de passe incorrect!");
        exit();
    }

    return $user;
    // $projets = getUserProjects($bdd, $user);
    // $projets[0]['Nom'];
}

function getUserProjects($bdd, $user) {

    $requete = "SELECT * FROM projet_utilisateur WHERE utilisateurid = ".$user->Id;
    foreach  ($bdd->query($requete) as $row) {
        $query = "SELECT * FROM projet WHERE id =".$row['ProjetId'];
        foreach  ($bdd->query($query) as $row_projet) {
            $projets[] = $row_projet;
        }
    }
    return $projets;
}