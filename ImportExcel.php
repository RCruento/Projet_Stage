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
$output = '';
if(isset($_POST["import"]))
{
    $value = explode(".", $_FILES["excel"]["name"]);
    $extension = strtolower(array_pop($value)); // For getting Extension of selected file
    $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
    if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
    {
        $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
        include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
        $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file


        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
        {
            $highestRow = $worksheet->getHighestRow();
            for($row=2; $row<=$highestRow; $row++)
            {
                $output .= "<tr>";
                $code = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $libelle = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nature = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $hcm = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                $htd = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                $htp = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                $hei = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                $hprj = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
                $htpl = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
                $cnu = mysqli_real_escape_string($BDD, $worksheet->getCellByColumnAndRow(9, $row)->getValue());

                //Conversion des données
                $floathcm = floatval($hcm);
                $floathtd = floatval($htd);
                $floathtp = floatval($htp);
                $floathei = floatval($hei);
                $floathprj = floatval($hprj);
                $floathtpl = floatval($htpl);
                $floatcnu = floatval($cnu);

                $sql = $BDD->query('
                    INSERT INTO excel_test(CODE_EC, LIBELLE, NATURE_EC, HCM,HTD, HTP, HEI, HPRJ, HTPL, CNU) VALUES ('.$code.','.$libelle.','.$nature.','.$floathcm.','.$floathtd.','.$floathtp.','.$floathei.','.$floathprj.','.$floathtpl.','.$floatcnu.')
                ');
               /* $sql->bind_param('sssddddddd', $code,$libelle,$nature,$floathcm,$floathtd,$floathtp,$floathei,$floathprj,$floathtpl,$floatcnu);
                $sql->execute();*/
                $output .= '<td>'.$code.'</td>';
                $output .= '<td>'.$libelle.'</td>';
                $output .= '<td>'.$nature.'</td>';
                $output .= '<td>'.$hcm.'</td>';
                $output .= '<td>'.$htd.'</td>';
                $output .= '<td>'.$htp.'</td>';
                $output .= '<td>'.$hei.'</td>';
                $output .= '<td>'.$hprj.'</td>';
                $output .= '<td>'.$htpl.'</td>';
                $output .= '<td>'.$cnu.'</td>';
                $output .= '</tr>';
            }
        }
        $output .= '</table>';
    }
    else
    {
        $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
    }
}

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
                            <span data-feather="user"></span>
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
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ImportExcel.php">
                            <span data-feather="file-text"></span>
                            Importer Fichier excel
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
                            UE
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h1">Importation fichier Excel</h1>
            </div>
            <div class="col-8">

                <form method="post" enctype="multipart/form-data">
                    <label>Select Excel File</label>
                    <input type="file" name="excel" />
                    <br />
                    <input type="submit" name="import" class="btn btn-info" value="Import" />
                </form>
                <br />
                <br />
                <table class='tutorial-table'>
                    <thead>
                    <tr>
                        <th>CODE</th>
                        <th>NATURE</th>
                        <th>LIBELLE</th>
                        <th>HCM</th>
                        <th>HTD</th>
                        <th>HTP</th>
                        <th>HEI</th>
                        <th>HPRJ</th>
                        <th>HTPL</th>
                        <th>CNU</th>
                    </tr>
                    <?php
                    echo $output;
                    ?>
                    </thead>
                    <table/>



            </div>
            <h2>Modifier le profil</h2>
            <div class="signup-form">
                <h1>A SUIVRE</h1>
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