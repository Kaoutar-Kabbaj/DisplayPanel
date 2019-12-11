<?php
session_start();

if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}
$id_user = $_SESSION['id_user'];
$directory=$_SESSION["directory"] ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SolarPlay</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../<?=$directory?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../<?=$directory?>/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../<?=$directory?>/css/demo.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>


    <link href="../<?=$directory?>/css/demo.css" rel="stylesheet" />
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <link rel="stylesheet" type="text/css" href="../<?=$directory?>/css/jquery.dataTables.min.css">

    <style type="text/css">
        .table>thead>tr{
            background-color: #848482 !important;
        }
        .table>thead>tr>th{
            color: yellow !important;
            text-align: center;
        }
        .table>tbody>tr>td{
            text-align: center;
        }

    </style>
</head>
<body>



    <div class="wrapper">
        <div class="sidebar" data-image="../<?=$directory?>/images/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        SolarPlay Display
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard_admin.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Liste des utilisateurs</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="administrator.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Profil Administrateur</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="" >
                            <center><img src="images/logo-light.png" id="logo_light" alt=""></center>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Liste des Utilisateurs </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">

                                    <span class="d-lg-none">Liste des utilisateurs</span>
                                </a>
                            </li>


                        </ul>
                        <ul class="navbar-nav ml-auto">


                            <li class="nav-item text-left" >
                                <a class="nav-link" href="deconnexion.php" id="logout" >
                                    <span class="no-icon">Déconnexion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
             <div class="content">
                 <?php if( isset( $_GET['msg'] ) AND $_GET['msg'] == 'suc' ): ?>
                     <div class="alert alert-success" role="alert" id="alrt">Utilisateur est ajouté avec succès!</div><br/>
                 <?php endif ?>
                 <div class="modal modal_update_user" tabindex="-1" role="dialog" style=" position:fixed;
   top:auto;
  margin-bottom: 5%;
   bottom:0;
   overflow-y: hidden;
   ">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h2 class="modal-title"><center>Modifier Utilisateur</center></h2>
                             </div>
                             <div class="modal-body">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal modal_delete_user" tabindex="-1" role="dialog">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h2 class="modal-title">supprimer Utilisateur</h2>
                             </div>
                             <div class="modal-body">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal modal_ad_user" tabindex="-1" role="dialog">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h2 class="modal-title">Ajouter Utilisateur</h2>
                             </div>
                             <div class="modal-body">
                             </div>
                         </div>
                     </div>
                 </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="table-responsive">
                                <?php // Include config file
                                include 'connection/db_connection_file.php';
                                $conn = OpenCon();
                                // Attempt select query execution
                                $sql = "SELECT * FROM user WHERE not user_role ='2' ";
                                if($result = mysqli_query($conn, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table id='example' class='hover' style='width:100%''>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>NOM</th>";
                                        echo "<th>MAIL</th>";
                                        echo "<th>ADRESSE</th>";
                                        echo "<th>SOLUTIONS</th>";
                                        echo "<th>NUMERO TELEPHONE</th>";
                                        echo "<th>Action</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){

                                            echo "<tr>";
                                            echo "<td>" . $row['nom'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['adresse'] . "</td>";

                                            ?><td><select name="myselectbox" class="custom-select mb-3">
                                                <option value="myoption1" <?php if($row['solutions'] =="myoption1") echo 'selected="selected"'; ?>>Solution 1</option>
                                                <option value="myoption2" <?php if($row['solutions'] =="myoption2") echo 'selected="selected"'; ?>>Solution 2</option>
                                                <option value="myoption3" <?php if($row['solutions'] =="myoption3") echo 'selected="selected"'; ?>>Solution 3</option>
                                            </select></td><?php
                                            echo "<td>" . $row['num_tel'] . "</td>";
                                            echo "<td style='text'>";
                                            echo "<a href='#' title='Update Record' data-toggle='tooltip' class='update_user' data-id='". $row['id_user'] ."'><i class=\"fa fa-edit\"></i></a>";
                                            echo " ";
                                            echo "<a href='#' title='Delete Record' data-toggle='tooltip' class='delete_user' data-id='". $row['id_user'] ."'>
<i class=\"fa fa-trash-o\"></i></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "<tfoot>";
                                        echo "<tr>";
                                        echo "<th>NOM</th>";
                                        echo "<th>MAIL</th>";
                                        echo "<th>ADRESSE</th>";
                                        echo "<th>SOLUTIONS</th>";
                                        echo "<th>NUMERO TELEPHONE</th>";
                                        echo "<th>Action</th>";
                                        echo "</tr>";
                                        echo "</tfoot>";
                                        echo "</table>";
                                        // Free result set
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. ";
                                }

                                ?>
                            </div>
                            <div><a href="#" class="btn btn-primary" id="ad_user">Ajouter utilisateur</a></div>
                        </div>
                    </div>
                </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a> Copyright © <!--?php echo date('Y'); ?--> All rights reserved designed by SolarPlay® </a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../<?=$directory?>/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/popper.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="../<?=$directory?>/js/plugins/chartist.min.js"></script>
<script src="../<?=$directory?>/js/plugins/bootstrap-notify.js"></script>
<script src="../<?=$directory?>/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="../<?=$directory?>/js/demo1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "language": {
                "sProcessing": "Traitement en cours...",
                "sSearch": "Rechercher&nbsp;:",
                "sLengthMenu": "Afficher &nbsp; : &nbsp; _MENU_",
                "sInfo": "Affichage des &eacute;l&eacute;ments _START_ &agrave; _END_ sur _TOTAL_",
                "sInfoEmpty": "Affichage des &eacute;l&eacute;ments 0 &agrave; 0 sur 0",
                "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix": "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable": "Aucun résultat à afficher",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                }
            }
    });
});
    </script>
<script type="text/javascript">
  setTimeout(function() {
 document.getElementById('alrt').style.display ='none';

        },5000);
$(".update_user").click(function() {
    var id = $(this).data('id');
    $.ajax({
          url: 'update.php',
          type: 'GET',
          data: {
            'id': id
          },
          success: function(response){
            $(".modal_update_user").find(".modal-body").html(response);
            $(".modal_update_user").modal("show");
          }
        });
    });
    $( ".delete_user").click(function() {
    var id = $(this).data('id');
    $.ajax({
          url: 'delete.php',
          type: 'GET',
          data: {
            'id': id
          },
          success: function(response){
            $(".modal_delete_user").find(".modal-body").html(response);
            $(".modal_delete_user").modal("show");
          }
        });
    });
    $("#ad_user").click(function() {
    $.ajax({
          url: 'ajouter_user.php',
          type: 'GET',
          success: function(response){
            $(".modal_ad_user").find(".modal-body").html(response);
            $(".modal_ad_user").modal("show");
          }
        });
    });
</script>

</html>
