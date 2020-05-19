<?php

    if(!isset($_SESSION['user'])){
        include_once 'PHP_FONCTIONS.php';
        session_start();
        $BDD = connexionBDD();
        $req = sqlAdminAllInformations($BDD);
        $data = mysqli_fetch_assoc($req);
        $_SESSION['user'] = $data['USERNAME'];
        $req->close();
    }
    ?>
<?php
    include_once 'PHP_FONCTIONS.php';
    if(isset($_POST['submitUser'])){
        if(isset($_POST['user'])){
            $ClassUSERNAME = 'OK';
            $ChampsIncorrects = '';
            if ((strlen(trim($_POST['user'])) < 2) )
            {
                $ChampsIncorrects = $ChampsIncorrects . '<li>User</li>';
                $ClassUSERNAME = 'error';
            }
            $BDD = connexionBDD();
            $req = $BDD->prepare('UPDATE ADMIN SET USERNAME = ?');
            $req->bind_param('s', $_POST['user']);
            $req->execute();
            $req->close();
            deconnexionBDD($BDD);
            header("Location: Acceuil.php");

        }
    }
    if(isset($_POST['submitPW'])) {
        if(isset($_POST['mdp']) && isset($_POST['confirm_password'])){
            $ClassMdp = 'OK';
            $ClassMdp2 = 'OK';
            $ChampsIncorrects = '';
            if(($_POST['mdp'] == $_POST['confirm_password'])){
                $ChampsIncorrects = $ChampsIncorrects . '<li>Mot de passe incorrect</li>';
                $ClassMdp = 'error';
                $BDD = connexionBDD();
                $req = $BDD->prepare('UPDATE ADMIN SET MDP = ?');
                $req->bind_param('s', $_POST['mdp']);
                $req->execute();
                deconnexionBDD($BDD);
                header("Refresh: 0");
            }
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

    <title>Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <h6 style="color: #F5F5F5">UNIVERSITE DE LORRAINE </h6>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="Index.php.<?php session_destroy()?>.">Se deconnecter</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Profile <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Categories.php">
                            <span data-feather="shopping-cart"></span>
                            Categories<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Composantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                <path fill-rule="evenodd" d="M8.11 2.8a.34.34 0 00-.2
                                0L.27 5.18a.35.35 0 000 .67L2 6.4v1.77c-.3.17-.5.5-.5.86 0
                                .19.05.36.14.5-.08.14-.14.31-.14.5v2.58c0 .55 2 .55 2
                                 0v-2.58c0-.19-.05-.36-.14-.5.08-.14.14-.31.14-.5
                                 0-.38-.2-.69-.5-.86V6.72l4.89 1.53c.06.02.14.02.2 0l7.64-2.38a.35.35
                                 0 000-.67L8.1 2.81l.01-.01zM4 8l3.83 1.19h-.02c.13.03.25.03.36 0L12
                                 8v2.5c0 1-1.8 1.5-4 1.5s-4-.5-4-1.5V8zm3.02-2.5c0 .28.45.5 1 .5s1-.22
                                 1-.5-.45-.5-1-.5-1 .22-1 .5z"></path></svg>
                            Diplome
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            EC
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Enseignant
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Etape
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Semestre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            UE
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h1">Profile</h1>
            </div>
            <div class="col-8">

                <div class="tab-content profile-tab" id="myProfile">
                        <div class="row">
                            <div class="col-md-6">
                                <label>USERNAME</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php   echo $_SESSION['user']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>NOM</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_COOKIE['CookieNom']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>PRENOM</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_COOKIE["CookiePrenom"]; ?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>DATE DE NAISSANCE</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_COOKIE["CookieDateNai"]; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>EMAIL</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_COOKIE["CookieMail"]; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>TELEPHONE</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $_COOKIE["CookieTEL"]; ?></p>
                            </div>
                        </div>

                </div>
            </div>
            <h2>Modifier le profil</h2>
            <div class="signup-form">
                <form  method="post">
                    <p>Veuiller remplir ci-dessous si vous voulez modifier votre username ou mot de passe</p>
                    <hr>
                    <!-- USERNAME -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                            <input type="text" class="form-control" id="<?php echo $ClassUSERNAME;?>" name="user" value="<?php echo (isset($_POST['user'])?$_POST['user']:''); ?>" placeholder="Pseudo" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submitUser" class="btn btn-primary btn-lg">Submit UserName</button>
                    </div>
                </form>
                <form  method="post">
                    <!-- MDP -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="<?php echo $ClassMdp;?>" name="mdp" value="<?php echo (isset($_POST['mdp'])?$_POST['mdp']:''); ?>" placeholder="Password" required="required">
                        </div>
                    </div>
                    <!-- ConfMDP -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                            </span>
                            <input type="password" class="form-control" id="<?php echo $ClassMdp2;?>" name="confirm_password" value="<?php echo (isset($_POST['confirm_password'])?$_POST['confirm_password']:''); ?>" placeholder="Confirm Password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submitPW" class="btn btn-primary btn-lg">Submit Passeword</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Pla at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="bootstrap/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

</body>
</html>