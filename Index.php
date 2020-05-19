<?php
    session_start();
    require_once 'PHP_FONCTIONS.php';
    if(isset($_POST['submit'])){
        if(isset($_POST['mail']) && isset($_POST['mdp'])) {
            $BDD = connexionBDD();
            $requet = sqlAdminAllInformations($BDD);
            $data= mysqli_fetch_assoc($requet);
            if($data['EMAIL'] == $_POST['mail'] && $data['MDP'] == $_POST['mdp']){
                $_SESSION['user'] = $data['USERNAME'];
                setcookie('CookieNom', $data['NOM'], time()+(60*60*24*30));
                setcookie('CookiePrenom', $data['PRENOM'], time()+(60*60*24*30));
                setcookie('CookieMail', $data['EMAIL'], time()+(60*60*24*30));
                setcookie('CookieTEL', $data['TEL'], time()+(60*60*24*30));
                setcookie('CookieDateNai', $data['DATENAISSANCE'], time()+(60*60*24*30));
                deconnexionBDD($BDD);
                header("Location: Acceuil.php");
                 exit;
            }else{
                header("Refresh:0");
            }
        }else{
            header("Refresh:0");
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="IMG/logo.png">

    <title>Login page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
</head>

<body>
<form action ='#' method="post" class = "form-signin">
    <div class="text-center mb-4">
        <img class="mb-4" src="IMG/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
        <p>Veuillez vous connecter pour avoir accés à votre espace de gestion des enseignants</p>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email address" value="<?php
                    echo (isset($_POST['mail'])?$_POST['mail']:'')
        ?>" required autofocus>
        <label for="inputEmail">Adresse Email</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="mdp" class="form-control"
               value="<?php
               echo (isset($_POST['mdp'])?$_POST['mdp']:'')
               ?>"
               placeholder="Password" required>
        <label for="inputPassword">Mot de passe</label>
    </div>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2019-2020</p>
</form>
<?php
/*if(isset($_POST['submit'])){
    // le formulaire a été soumis (et est incomplet)
    echo '<br/>Merci de remplir correctement les champs ';
}*/
?>
</body>
</html>