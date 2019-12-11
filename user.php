<?php
session_start();

if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}
$directory=$_SESSION["directory"] ;
?>
<!DOCTYPE html>


<head>



    <!-- CSS Just for demo purpose, don't include it in your project -->



    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
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
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


</head>

<body>
<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();


if (isset($_SESSION['username'])){

    $username=$_SESSION['username'] ;

    $sql = "SELECT * FROM user WHERE username like '$username'";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        //echo " le total est  " . $row["sumetotal"]. "<br>";
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
                    <li>
                        <a class="nav-link" href="dashboard_user.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Profil Utilisateur</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./espace.php">
                            <i class="nc-icon nc-tap-01"></i>
                            <p>Mon espace</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./traitement_solution.php">
                            <i class="nc-icon nc-tv-2"></i>
                            <p>Panneau d'affichage</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="" >
                            <center><img src="images/logo-light.png"  id="logo_light"  alt=""></center>
                        </a>
                    </li>

 </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Utilisateur </a>
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

                            </li>
                            <li class="nav-item dropdown">

                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">
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
                                        <div class="alert alert-danger" role="alert" id="alrt">La taille de votre image est trop grande, la taille maximum autorisée est de  20Ko...!</div><br/>
                                    <?php endif ?>
                                    <?php if( isset( $_GET['mg'] ) AND $_GET['mg'] == '4' ): ?>
                                        <div class="alert alert-danger" role="alert" id="alrt">La taille de votre image ne doit pas dépasser 400px de hauteur et 400px de largeur...!</div><br/>
                                    <?php endif ?>
                                    <form action="modifier_profile.php" method="POST">
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
                                                    <label>Solutions</label>
                                                    <select name="myselectbox" class="custom-select mb-3">
                                                        <option value="myoption1" <?php if($solutions =="myoption1") echo 'selected="selected"'; ?>>Solution 1</option>
                                                        <option value="myoption2" <?php if($solutions =="myoption2") echo 'selected="selected"'; ?>>Solution 2</option>
                                                        <option value="myoption3" <?php if($solutions =="myoption3") echo 'selected="selected"'; ?>>Solution 3</option>
                                                    </select>
                                                </div>
                                            </div>
<!--                                            <div class="col-md-4 px-1">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label>Pays</label>-->
<!--                                                    <input type="text" class="form-control" placeholder="Country" value="France">-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Ville</label>
                                                    <input type="text" class="form-control" id="CD" name="CD">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                         <!--   <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                                </div>
                                            </div>-->
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
<!--                                        <p class="description">-->
<!--                                            Adiwatt-->
<!--                                        </p>-->
                                    </div>
<!--                                    <p class="description text-center">-->
<!--                                        "Lamborghini Mercy-->
<!--                                        <br> Your chick she so thirsty-->
<!--                                        <br> I'm in that two seat Lambo"-->
<!--                                    </p>-->
                                </div>
                                <hr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLabel">Modifier Votre Logo</h5>

                                            </div>
                                            <form method="POST" action="upload.php" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                    <!-- On limite le fichier à 100Ko -->
<!--                                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">-->
                                                    Image : <input type="file" name="avatar">
                                                    <!-- <input type="submit" name="envoyer" value="Envoyer le fichier">-->
                                             <br><br>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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

                            <a> Copyright © <?php echo date('Y'); ?> All rights reserved designed by SolarPlay® </a>
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>



</body>
<?php
$sql ="SELECT `logo_user` FROM `user` WHERE `username` like '$username'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $filename= ($row["logo_user"]);
    //echo  $filename;

}
if  ($filename == ''){
    ?><script>document.getElementById('imagelogo').src='../<?=$directory?>/images/Your-Logo-here.png'</script><?php
}
else{
?><script>document.getElementById('imagelogo').src='../<?=$directory?>/upload/<?php echo $filename;?>'</script></script><?php
}
?>





</html>




<script src="../<?=$directory?>/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/popper.min.js" type="text/javascript"></script>
<script src="../<?=$directory?>/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../<?=$directory?>/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!--  Chartist Plugin  -->
<script src="../<?=$directory?>/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../<?=$directory?>/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../<?=$directory?>/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../<?=$directory?>/js/demo.js"></script>
<script type="text/javascript">
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
