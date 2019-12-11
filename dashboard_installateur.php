<?php
session_start();

if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}

$directory=$_SESSION["directory"] ;


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
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
    <link href="../<?=$directory?>/css/demo.css" rel="stylesheet" />
    <style>
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
                    <a class="nav-link" href="./manage_customers.php">
                        <i class="nc-icon nc-settings-gear-64"></i>
                        <p>Gestion des Clients</p>
                    </a>
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
    <div class="main-panel">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


                        <!-- Hello -->
                        <div class="card  card-tasks">
                            <div class="card-header ">
                                <h4 class="card-title">Gérer vos tâches</h4>
                                <p class="card-category"></p>
                            </div>
                            <!-- Button trigger modal -->
                            <div style="text-align: right; margin-right: 2%;  margin-top: -3%;">
                                <button type="button" class="btn btn-primary" style="width: 300px;" data-toggle="modal" id="task" data-target="#exampleModal">
                                    Ajouter une nouvelle tâche
                                </button>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width">
                                    <table  class="table">

                                        <tbody id="tasks-list">


                                        </tbody>
                                    </table>
                                </div>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle tâche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="RegisterValidation" action="" method="" novalidate="novalidate">
                    <div class="card ">

                        <div class="card-body ">

                            <div class="form-group has-label">
                                <label>
                                    Titre
                                    <star class="star">*</star>
                                </label>
                                <input class="form-control" name="title" id="title" type="text" required="true">
                            </div>
                            <div class="form-group has-label">
                                <label>
                                    Priorité
                                    <star class="star">*</star>
                                </label>
                                <select id="priority" class="form-control" name="priority">
                                    <option>Bas</option>
                                    <option>Moyen</option>
                                    <option>Haut</option>
                                </select>
                            </div>
                            <div class="card-category form-category">
                                <star class="star">*</star>
                                Champs obligatoires</div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="add-task-btn">Valider</button>
            </div>
        </div>
    </div>
</div>
</body>
<!--   Core JS Files   -->
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
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js

        demo.showNotification();

    });


</script>
<script type="text/javascript">
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js

        loadTasks();
        $("#add-task-btn").on("click", function () {
            const title = $("#title").val();
            if(title==''){
                $("#title").addClass('error');
                return;
            }else{
                $("#title").removeClass('error');
            }

            const priority = $("#priority").val();
            $.post("apis/tasks/add.php", {title: title, priority: priority}, function (response) {
                if (response.data === 'success') {
                    loadTasks();
                    $('#exampleModal').modal('hide');
                }
            });
        });
    });







    function loadTasks() {
        $.getJSON('apis/tasks/list.php', function (response) {
            $("#tasks-list").empty();
            response.data.forEach(element => {
                const checked = element.done == 1 ? 'checked' : '';
                let tr = `      <tr>
                                                                                <td >
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label">
                                                                                            <input data-id="${element.id}" class="form-check-input done-check" type="checkbox" value="" ${checked}>
                                                                                            <span class="form-check-sign"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>${element.title}</td>
                                                                                <td>${element.priority}</td>
                                                                                <td class="td-actions text-right" width="100%">
                                                                                  <!--  <button type="button" rel="tooltip" title="" class="btn btn-info btn-simple btn-link" data-original-title="Edit Task">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </button> -->
                                                                                    <button type="button" rel="tooltip" title="" data-id="${element.id}" class="btn btn-danger btn-simple btn-link task-delete-btn" data-original-title="Remove">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>`;
                $("#tasks-list").append(tr);
            });
        });

        $("#tasks-list").on("click", ".done-check", function (event) {
            const id = $(this).data('id');
            const done = $(this).is(':checked');
            $.getJSON('apis/tasks/done.php', {id: id, done: done}, function (response) {

            });
        });
        $("#tasks-list").on("click", ".task-delete-btn", function (event) {
            const id = $(this).data('id');
            $.getJSON('apis/tasks/delete.php', {id: id}, function (response) {
                if (response.data === 'success') {
                    loadTasks();
                }
            });
        });
    }


</script>
</html>
