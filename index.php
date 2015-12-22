<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 15/12/2015
 * Time: 21:49
 */
session_start();
include_once 'model/db_connect.php';

if ($_POST) {
    $login = $_POST['login'];
    $motDePasse = $_POST['mdp'];
    $bdd = new PDO('mysql:host=localhost;dbname=hyperplanning;charset=utf8', 'root', '');

    $user = connexion($bdd,$login,$motDePasse);

    if ($user) {
        $_SESSION['user'] = $user;
        $projects = getUserProjects($bdd, $user);
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jeremy Dulon">
    <title>Nov'yperplanning</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/index.css" rel="stylesheet">
</head>

<script type="text/javascript" charset="utf-8">
    function init() {
        scheduler.config.xml_date="%Y-%m-%d %H:%i";
        scheduler.config.first_hour = 8;
        scheduler.config.last_hour = 20;
        scheduler.config.readonly = true;
        scheduler.config.details_on_dblclick = true;
        scheduler.config.readonly_form = true;
        scheduler.init('scheduler_here',new Date(),"week");
        scheduler.load("events.xml");
        <?php if (isset($projects)) {
            foreach ($projects as $project) { ?>
        scheduler.addEvent({
            start_date: new Date("<?php echo ($project['Date_debut']);?>"),
            end_date:  new Date("<?php echo ($project['Date_fin']);?>"),
            text:   "<?php echo ($project['Nom']);?>",
            room:   "5",     //userdata
            color: "red"
        });
        <?php }} ?>

        scheduler.addEvent({
            start_date: new Date(),
            end_date:  new Date(),
            text:   "Test",
            room:   "5"     //userdata
        });

    }
</script>
<script src="dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8">

<?php if (isset($_SESSION['user']))
    include_once 'view/planning.php';

else
    include_once 'view/login.php'; ?>


</html>