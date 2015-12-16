<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 15/12/2015
 * Time: 21:49
 */
include_once 'model/db_connect.php';

$login = "jeremy.dulon@live.fr";
$motDePasse = "password";
$bdd = new PDO('mysql:host=localhost;dbname=hyperplanning;charset=utf8', 'root', '');

$user = connexion($bdd,$login,$motDePasse);

if ($user) {
    $_SESSION['user'] = $user->Prenom.' '.$user->Nom;
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jeremy Dulon">
    <title>Jeremy Dulon</title>

    <link href="view/css/bootstrap.css" rel="stylesheet">
    <link href="view/css/index.css" rel="stylesheet">
</head>

<script type="text/javascript" charset="utf-8">
    function init() {
        scheduler.config.xml_date="%Y-%m-%d %H:%i";
        scheduler.config.first_hour = 8;
        scheduler.config.last_hour = 20;
        scheduler.init('scheduler_here',new Date(2015,9,10),"week");
        scheduler.load("events.xml");

    }
</script>
<script src="dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8">

<body onload="init();">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Nov'yperplanning</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Profil</a></li> <!-- mettre un lien vers le profil -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#"><?php echo $_SESSION['user'] ?></a></li>
                    <li class="deconnexion"><a class="deconnexion" href="#">Déconnexion</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:75%;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
            <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
            <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
            <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
        </div>
        <div class="dhx_cal_header">
        </div>
        <div class="dhx_cal_data">
        </div>
    </div>
</body>