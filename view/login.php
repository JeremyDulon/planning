<div class="container">

    <form class="form-signin" action="index.php" method="POST">
        <h2 class="form-signin-heading">Connexion</h2>
        <div class="input-group">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
            </div>
            <input type="email" name="login" id="inputEmail" class="form-control" placeholder="E-mail adress" required autofocus>
        </div>
        <div class="input-group">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </div>
            <input type="password" class="form-control" id="inputPassword" name="mdp" placeholder="Password" required>
        </div>
        <div class="checkbox">
            <label class="remember-me">
                <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="connexion"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Connexion</button>
    </form>

</div>

