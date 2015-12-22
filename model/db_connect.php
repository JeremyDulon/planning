<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 15/12/2015
 * Time: 21:50
 */
$bdd = new PDO('mysql:host=localhost;dbname=hyperplanning;charset=utf8', 'root', '');

function connexion ($bdd, $login, $password) {
    $requete = "SELECT * FROM utilisateur WHERE email = '" . $login . "' AND mdp = '" . $password . "'";
    $resultat = $bdd->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $user = $resultat->fetch();
    if (!$user) {
        ?><script type="text/javascript" charset="utf-8">alert("Identifiant ou mot de passe incorrect!");</script><?php
        return null;
    }

    return $user;
    // $projets = getUserProjects($bdd, $user);
    // $projets[0]['Nom'];
}

function getUserProjects($bdd, $user) {

    $requete = "SELECT * FROM projet_utilisateur WHERE utilisateurid = ".$user->Id;

    if ($bdd->query($requete)) {
        foreach ($bdd->query($requete) as $row) {
            $query = "SELECT * FROM projet WHERE id =" . $row['ProjetId'];
            foreach ($bdd->query($query) as $row_projet) {
                $projets[] = $row_projet;
            }
        }
    }

    if (isset($projets)) {
        return $projets;
    }

    else {
        return null;
    }
}