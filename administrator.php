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
    <link rel="apple-touch-icon" sizes="76x76" href="../<?=$directory?>/assets/img/apple-icon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Solar Play</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../<?=$directory?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../<?=$directory?>/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../<?=$directory?>/css/demo.css" rel="stylesheet" />
</head>
<body>
<?php
include '../'.$directory.'/connection/db_connection_file.php';
$conn = OpenCon();
if (isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username like '$username'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nom = $row['nom'];
        $username = $row['username'];
        $password = $row['password'];
        $email =$row['email'];
        $num_tel =$row['num_tel'];
        $CD =$row['CD'];
        $adresse =$row['adresse'];
        $solutions =$row['solutions'];
    }
}
?>
<div class="wrapper">
    <div class="sidebar" data-image="../<?=$directory?>/images/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    SolarPlay Display
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard_admin.php">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Liste des utilisateurs</p>
                    </a>
                </li>
                <li class="active">
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
                <a class="navbar-brand" href="#pablo">Administrateur </a>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav ml-auto">
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Modifier votre  profil</h4>
                            </div>
                            <div class="card-body">
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
                                    <div class="alert alert-danger" role="alert" id="alrt">La taille de votre image est trop grande, la taille maximum autorisée est de  100Ko...!</div><br/>
                                <?php endif ?>
                                <form action="modifier_profile_admin.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Entreprise (désactivé)</label>
                                                <input type="text" class="form-control"  id="nom" name="nom" >
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Utilisateur</label>
                                                <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mot de passe</label>
                                                <input type="password" class="form-control"  id="password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control"  id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label>Numéro de téléphone</label>
                                                <input type="text" class="form-control" id="num_tel" name="num_tel" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Adresse</label>
                                                <input type="text" class="form-control" id="adresse" name="adresse">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Ville</label>
                                                <input type="text" class="form-control" id="CD" name="CD">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right" id="update">Modifier</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray"  alt="..."  id="imagelogo">
                                        <h5 class="title" style="display:none;">Modifier Logo</h5><br>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="update_image">
                                            Modifier Logo
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier Votre Logo</h5>
                                        </div>
                                        <form method="POST" action="upload_administrator.php" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                Image : <input type="file" name="avatar">
                                                <br><br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="envoyer" class="btn btn-success" >Modifier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="button-container mr-auto ml-auto">
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-google-plus-square"></i>
                                </button>
                            </div>
                        </div>
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
<?php
$sql = "SELECT `logo_user` FROM `user` WHERE `username` like '$username'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $filename= ($row["logo_user"]);
    //echo  $filename;
}
if  ($filename == ''){
    ?><script>document.getElementById('imagelogo').src='../<?=$directory?>/images/Your-Logo-here.png'</script><?php
}
else{
?><script>document.getElementById('imagelogo').src='../<?=$directory?>/upload_administrator/<?php echo $filename;?>'</script></script><?php
}
?>

<script src="../<?=$directory?>/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/popper.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../<?=$directory?>/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../<?=$directory?>/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../<?=$directory?>/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../<?=$directory?>/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../<?=$directory?>/js/demo.js"></script>
<script>
    setTimeout(function() {
        document.getElementById('alrt').style.display ='none';
    },5000);
    document.getElementById("nom").value = '<?php echo $nom;?>';
    document.getElementById("username").value = '<?php echo $username;?>';
    document.getElementById("password").value = '<?php echo $password;?>';
    document.getElementById("email").value = '<?php echo $email;?>';
    document.getElementById("num_tel").value = '<?php echo $num_tel;?>';
    document.getElementById("CD").value = '<?php echo $CD;?>';
    document.getElementById("adresse").value = '<?php echo $adresse;?>';
</script>
</html>
