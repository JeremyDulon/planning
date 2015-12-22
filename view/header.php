<nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Nov'yperplanning</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php if ($_SESSION['user']->Role == 2) { ?>
                    <li><a href="gestion.php">Gestion</a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#"><?php echo $_SESSION['user']->Prenom.' '.$_SESSION['user']->Nom ?></a></li>
                <li class="deconnexion"><a class="deconnexion" href="?deconnexion">Déconnexion</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

<?php

if (isset($_GET['deconnexion'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

?>