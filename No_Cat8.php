<?php
if(!isset($_SESSION['user'])){
    include_once 'PHP_FONCTIONS.php';
    session_start();
    $BDD = connexionBDD();
    $req = sqlAdminAllInformations($BDD);
    $data = mysqli_fetch_assoc($req);
    $_SESSION['user'] = $data['USERNAME'];
    $req->close();
    deconnexionBDD($BDD);
}
?>
<?php
$BDD = connexionBDD();
$sql = 'SELECT * FROM ec WHERE NO_CAT = 8 ORDER BY CODE_EC ASC ';
$res = $BDD->query($sql);
?>

<!doctype html>
<html lang="fr">
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
    <h4 style="color: #F5F5F5; ">UNIVERSITE DE LORRAINE </h4>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="Index.php.<?php session_destroy()?>.">Se deconnecter</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="Acceuil.php">
                            <span data-feather="home"></span>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Categories.php"">
                        <span data-feather="layers"></span>
                        Categories <span class="sr-only">(current)</span>
                        </a>
                        <div class="align-content-center" aria-labelledby="navbarDropdowwn">
                            <a class="dropdown-item" style="align-content: center" href="No_Cat1.php"><span data-feather="file-text"></span>    1</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat2.php"><span data-feather="file-text"></span>    2</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat3.php"><span data-feather="file-text"></span>    3</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat4.php"><span data-feather="file-text"></span>    4</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat5.php"><span data-feather="file-text"></span>    5</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat6.php"><span data-feather="file-text"></span>    6</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat7.php"><span data-feather="file-text"></span>    7</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat8.php"><span data-feather="file-text"></span>    8</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat9.php"><span data-feather="file-text"></span>    9</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat10.php"><span data-feather="file-text"></span>   10</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat11.php"><span data-feather="file-text"></span>   11</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat12.php"><span data-feather="file-text"></span>   12</a>
                            <a class="dropdown-item" style="align-content: center" href="No_Cat13.php"><span data-feather="file-text"></span>   13</a>
                        </div>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Enseignants.php">
                            <span data-feather="users"></span>
                            Enseignants
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

        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h1">Categories</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>CODE_EC</th>
                        <th>LIBELLE_EC</th>
                        <th>NATURE_EC</th>
                        <th>HCM</th>
                        <th>HTD</th>
                        <th>HTP</th>
                        <th>HEI</th>
                        <th>HPRJ</th>
                        <th>HTPL</th>
                        <th>CNU</th>
                    </tr>
                    <?php
                    while($data = mysqli_fetch_assoc($res)){
                        echo "<tr>
                                <td>".$data['CODE_EC']."</td>
                                <td>".$data['LIBELLE_EC']."</td>
                                <td>".$data['NATURE_EC']."</td>
                                <td>".$data['HCM']."</td>
                                <td>".$data['HTD']."</td>
                                <td>".$data['HTP']."</td>
                                <td>".$data['HEI']."</td>
                                <td>".$data['HPRJ']."</td>
                                <td>".$data['HTPL']."</td>
                                <td>".$data['CNU']."</td>
                              </tr>";
                    }
                    $res->close();
                    ?>

                    </tbody>
                </table>

        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
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