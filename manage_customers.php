<?php
session_start();

if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}

$directory=$_SESSION["directory"] ;
$username=$_SESSION["username"] ;

include '../'.$directory.'/connection/db_connection_file.php';
$conn = OpenCon();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SolarPlay</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="../<?=$directory?>/css/jquery.dataTables.min.css">

    <link href="../<?=$directory?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../<?=$directory?>/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../<?=$directory?>/css/demo.css" rel="stylesheet" />
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->

    <style>


        span[class='select2 select2-container select2-container--default']{
            all:initial;
           width: 421.3px;!important;
            margin-top: -2%;;
        }
        table{
            table-layout: fixed;
            width: 100%;
            display: table;
        }
        tr{
            width: 100%;
        }
        #exampleModal{
            /*margin-top: -50px;*/
        }
        .error{
            border: 1px solid red;
        }

        @media only screen and (max-width: 400px) {

            button#task{
                margin-top: 10%;
            }
        }
    </style>
</head>


<body style="overflow: hidden;!important;">
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
                <li class="nav-item">
                    <a class="nav-link" href="dashboard_installateur.php">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="./installateur.php">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>Profil Installateur</p>
                    </a>
                </li>
                <li>
                <li class="nav-item active">
                    <a class="nav-link" href="./manage_customers.php">
                        <i class="nc-icon nc-settings-gear-64"></i>
                        <p>Gestion des Clients</p>
                    </a>
                </li>
            </li>
<!--                <li>-->
<!--                    <a class="nav-link" href="./espace.php">-->
<!--                        <i class="nc-icon nc-tap-01"></i>-->
<!--                        <p>Mon espace</p>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a class="nav-link " href="./traitement_solution.php" >-->
<!--                        <i class="nc-icon nc-tv-2"></i>-->
<!--                        <p>Panneau d'affichage</p>-->
<!--                    </a>-->
<!--                </li>-->
                <!--   <li>
                       <a class="nav-link" href="./typography.html">
                           <i class="nc-icon nc-paper-2"></i>
                           <p>Typography</p>
                       </a>
                   </li>
                   <li>
                       <a class="nav-link" href="./icons.html">
                           <i class="nc-icon nc-atom"></i>
                           <p>Icons</p>
                       </a>
                   </li>
                   <li>
                       <a class="nav-link" href="./maps.html">
                           <i class="nc-icon nc-pin-3"></i>
                           <p>Maps</p>
                       </a>
                   </li>
                   <li>
                       <a class="nav-link" href="./notifications.html">
                           <i class="nc-icon nc-bell-55"></i>
                           <p>Notifications</p>
                       </a>
                   </li>-->
                <li class="nav-item active active-pro">
                    <a class="" href="upgrade.html">
                        <center><img src="images/logo-light.png" id="logo_light" alt=""></center>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" >
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="#pablo"> Tableau de bord </a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="dropdown">

                                <span class="d-lg-none">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="dropdown nav-item">


                        </li>
                        <li class="nav-item">

                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">

                            </a>
                        </li>
                        <li class="nav-item dropdown">

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="deconnexion.php" id="logout">
                                <span class="no-icon">Déconnexion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
                <div class="modal modal_update_user" style="position: fixed!important;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title"><center>Modifier Client</center></h2>
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
                                <h2 class="modal-title">supprimer Client</h2>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>


            <div class="content">
                <div class="modal modal_update_espace" tabindex="-1" role="dialog" style=" position:fixed;
   top:auto;
  margin-bottom: 5%;
   bottom:0;
   overflow-y: hidden;
   ">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title"><center>Modifier Espace</center></h2>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div>




<!--            <div class="modal modal_ad_user" tabindex="-1" role="dialog">-->
<!--                <div class="modal-dialog modal-lg" role="document">-->
<!--                    <div class="modal-content">-->
<!--                        <div class="modal-header">-->
<!--                            <h2 class="modal-title">Ajouter Client</h2>-->
<!--                        </div>-->
<!--                        <div class="modal-body">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-md-12">


                        <!-- Hello -->
                        <div class="card  card-tasks">
                            <div class="card-header ">
                                <h4 class="card-title">Gérer vos Clients</h4>
                                <p class="card-category"></p>
                            </div>

                            <?php if( isset( $_GET['msg'] ) AND $_GET['msg'] == 'error' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">Veuillez insérer au moins un client !</div><br/>
                            <?php endif ?>
<!--                            --><?php //if( isset( $_GET['word'] ) AND $_GET['msg'] == 'success'): ?>
<!--                                <div class="alert alert-success" role="alert" id="alrt">Client ajouté avec succès!</div><br/>-->
<!--                            --><?php //endif ?>

                            <?php if( isset( $_GET['msg'] ) AND $_GET['msg'] == 'error' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">Echec de l'upload !</div><br/>
                            <?php endif ?>

                            <?php if( isset( $_GET['word'] ) AND $_GET['word'] == 'upsucess' ): ?>
                                <div class="alert alert-success" role="alert" id="alrt">Modification effectuée avec succès!</div><br/>
                            <?php endif ?>
                            <?php if( isset( $_GET['word'] ) AND $_GET['word'] == 'error' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">Erreur lors de la modification! </div><br/>
                            <?php endif ?>



                            <?php if( isset( $_GET['image'] ) AND $_GET['image'] == 'suc' ): ?>
                                <div class="alert alert-success" role="alert" id="alrt">Upload effectué avec succès !</div><br/>
                            <?php endif ?>

                            <?php if( isset( $_GET['mg'] ) AND $_GET['mg'] == '1' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">Vous devez uploader une image de type png, gif, jpg, jpeg ...!</div><br/>
                            <?php endif ?>
                            <?php if( isset( $_GET['mg'] ) AND $_GET['mg'] == '2' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">Veuillez sélectionner une image  !</div><br/>
                            <?php endif ?>
                            <?php if( isset( $_GET['mg'] ) AND $_GET['mg'] == '3' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">La taille de votre image est trop grande, la taille maximum autorisée est de  20Ko...!</div><br/>
                            <?php endif ?>
                            <?php if( isset( $_GET['mg'] ) AND $_GET['mg'] == '4' ): ?>
                                <div class="alert alert-danger" role="alert" id="alrt">La taille de votre image ne doit pas dépasser 400px de hauteur et 400px de largeur...!</div><br/>
                            <?php endif ?>
                            <!-- Button trigger modal -->
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                        <h5 class="card-title">Affecter des clients à votre liste</h5>
                                    </div>
                                    <div class="col-sm">
                                        <form method="POST" action = "ajouter_client.php"
                                        <div class="input-group">
                                            <div class="rs-select2 js-select-simple select--no-search ">
                                                <?php
                                                $sql = "SELECT * FROM user WHERE  user_role ='3' and username like '$username'";
                                                $result = $conn->query($sql);

                                                while ($row = $result->fetch_assoc()) {
                                                    $list_customer = $row['list_customers'];
                                                }
                                                $list_clients = json_decode($list_customer);
                                                $pieces = implode(",", $list_clients);
                                                $_SESSION["old_customer"] = $pieces;
                                                // Attempt select query execution
                                                $sql = "SELECT * FROM user WHERE  user_role ='1' and id_user not IN ($pieces)";
                                                $result = $conn->query($sql);
                                                $arr_users = [];

                                                if ($result->num_rows > 0) {
                                                    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                                                }

                                        ?>

                                                <select name="clients[ ]" multiple >
                                                    <option disabled="disabled" selected="selected">
                                                        Choisissez vos clients</option>

                                                    <?php if(!empty($arr_users)) { ?>
                                                        <?php foreach($arr_users as $user) { ?>
                                                            <option value="<?php echo $user['id_user']; ?>">


                                                                <?php echo $user['nom']; ?>
                                                         </option>

                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <button class="login100-form-btn btn btn-secondary">
                                       Enregistrer
                                    </button>

                                    <br>
                                    </form>
                                    <br>
                                </div>
                        </div>
                                <div class="table-responsive">
                                    <?php
                                    //get the list of customers
                                    $sql = "SELECT * FROM user WHERE  user_role ='3' and username like '$username'";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                        $list_customer = $row['list_customers'];
                                    }
                                    $list_clients = json_decode($list_customer);
                                    $pieces = implode(",", $list_clients);
                                    // Attempt select query execution

                                    $sql = "SELECT * FROM user WHERE  user_role ='1' and id_user IN ($pieces)";
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
                                            echo "<th>Espace</th>";
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
                                                echo "<a href='#' title='Modifier Client' data-toggle='tooltip' class='update_user' data-id='". $row['id_user'] ."'><i class=\"fa fa-edit\"></i></a>";
                                                echo "             ";
                                                echo "&nbsp;&nbsp;<a href='#' title='Supprimer Client' data-toggle='tooltip' class='delete_user' data-id='". $row['id_user'] ."'>
                                            <i class=\"fa fa-trash-o\"></i></a>";
                                                echo "</td>";

                                                echo "<td style='text'>";
                                                echo "&nbsp; &nbsp; &nbsp;<a href='#' title='Modifier Espace Client'  class='update_espace' data-id='". $row['id_user'] ."'><i class=\"fa fa-cog\"></i></a>";
                                                echo " ";

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
                                            echo "<th>Espace</th>";
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


                            <div class="card-footer ">
                                <hr>
                                <!--  <div class="stats">
                                      <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                  </div> -->
                            </div>
                        </div>
                        <!-- Hello end -->
                    </div>
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


                        <a> Copyright © <?php echo date('Y'); ?> All rights reserved designed by SolarPlay® </a>
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>
</body>




<script src="../<?=$directory?>/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/popper.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../<?=$directory?>/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!--  Chartist Plugin  -->
<!--  Notifications Plugin    -->
<script src="../<?=$directory?>/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../<?=$directory?>/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../<?=$directory?>/js/demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="js/global.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js

        demo.showNotification();

    });


</script>
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


        $(".update_user").click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'update_clients.php',
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




        $(".update_espace").click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'update_espace.php',
                type: 'GET',
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(response){
                   window.location.href= response.url+'?id='+id;
                }
            });
        });






        $( ".delete_user" ).click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: 'delete_clients.php',
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

        setTimeout(function() {
            document.getElementById('alrt').style.display ='none';

        },5000);



    });
</script>
</html>
