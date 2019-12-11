<?php
session_start();

if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}
$directory=$_SESSION["directory"] ;
$id = $_GET['id'];
$_SESSION["user_id"] = $id;
?>
<style>
    .content h3 {
        display: block !important;
    }
    .content.clearfix >.title.current , .content.clearfix >.title{
        display: none !important;
    }

    .content {
        padding-right: 70px;
        padding-left: 80px;
        height: 366px !important;
    }
</style>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../<?= $directory ?>/images/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SolarPlay</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../<?= $directory ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../<?= $directory ?>/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../<?= $directory ?>/css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="../<?= $directory ?>/css/upload.css" rel="stylesheet" >
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style2.css">
</head>


<body style="overflow: hidden;">
<?php
include 'connection/db_connection_file.php';

$conn = OpenCon();


if (isset($_SESSION['username'])){

    $username=$_SESSION['username'] ;
    $sql = "SELECT * FROM user WHERE id_user like '$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        //echo " le total est  " . $row["sumetotal"]. "<br>";
        $titre = $row['titre'];
        $meteo = $row['meteo'];
        $dossier = $row['dossier'];
        $type_clock =$row['type_clock'];
        $type_data_logger =$row['type_data_logger'];
        $solutions = $row['solutions'];
        $titre1 = $row['titre1'];
        $titre2 = $row['titre2'];
        $titre3 = $row['titre3'];
        $titre4 = $row['titre4'];
        $calendar = $row['calendar'];
        $color_graph = $row['color_graph'];
        $CD = $row['CD'];
    }

}
?>
<div class="wrapper">
    <div class="sidebar" data-image="../<?= $directory ?>/images/sidebar-5.jpg">
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
                    <a class="nav-link" href="./manage_customers.php">
                        <i class="nc-icon nc-settings-gear-64"></i>
                        <p>Gestion des Clients</p>
                    </a>
                </li>
                <li>
                <li class="nav-item active">
                    <a class="nav-link" href="./espace.php">
                        <i class="nc-icon nc-tap-01"></i>
                        <p>Mon espace</p>
                    </a>
                </li>
<!--                <li>-->
<!--                    <a class="nav-link" href="./traitement_solution.php">-->
<!--                        <i class="nc-icon nc-tv-2"></i>-->
<!--                        <p>Panneau d'affichage</p>-->
<!--                    </a>-->
<!--                </li>-->

                <li class="nav-item active active-pro">
                    <a class="" href="">
                        <center><img src="images/logo-light.png"  id="logo_light" alt=""></center>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="#pablo"> Mon espace </a>
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

            <div class="container-fluid" id="container2">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Modifier vos paramètres </h4>

                            </div>
                            <div class="card-body">

                                <form method="POST" id="signup-form" action="update_para.php"  class="signup-form" enctype="multipart/form-data">
                                    <h3>
                                        Configuration
                                    </h3>
                                    <fieldset>
                                        <div class="form-row">

                                            <div class="form-group">
                                                <label for="title">Titre 1</label>
                                                <input type="text" class="form-control"  placeholder="Vue mensuelle" name="titre3" value="<?php echo $titre3;?>" />                                                    </div>
                                            <div class="form-select">
                                                <label>Type data logger</label>
                                                <div class="select-group">
                                                    <select name="logger" class="custom-select mb-3">
                                                        <option value="logger1" <?php if($type_data_logger =="logger1") echo 'selected="selected"'; ?>> Huawei </option>
                                                        <option value="logger2" <?php if($type_data_logger =="logger2") echo 'selected="selected"'; ?>>SMA</option>
                                                        <option value="logger3" <?php if($type_data_logger =="logger3") echo 'selected="selected"'; ?>>Fronius</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="title">Titre 2</label>
                                                <input type="text"  class="form-control" placeholder="Ce batiment utilise de l'energie solaire" name="titre4" value="<?php echo $titre4;?>">
                                            </div>
<!--                                            <div class="form-group">-->
<!--                                                <label for="title">Dossier</label>-->
<!--                                                <input type="text"  class="form-control" placeholder="Data" name="Data" value="--><?php //echo $dossier; ?><!--">-->
<!--                                            </div>-->

                                            <div class="form-group">
                                                <label for="title">Géolocalisation (ville)</label>
                                                <input type="text"  class="form-control" placeholder="Geolocalisation client" name="CD" value="<?php echo $CD; ?>">
                                            </div>


                                    </fieldset>

                                    <h3>
                                     Méteo
                                    </h3>
                                    <fieldset>
                                        <div class="form-radio">
                                            <label for="room_type" class="radio-label">Voulez-vous intégrer la méteo ?</label>
                                            <div class="form-radio-group">

                                                <div class="form-radio-item">
                                                    <!--                                                    -->
                                                    <input type="radio" value="weather1" <?php if($meteo =="weather1") { echo "checked";}?> name="weather" id="single_room">
                                                    <label for="single_room">Oui</label>
                                                    <span class="check"></span>
                                                </div>
                                                <div class="form-radio-item">
                                                    <!--                                                    --><?php //if($meteo =="weather2") { echo "checked";}?>
                                                    <input type="radio"  value="weather2" <?php if($meteo =="weather2") { echo "checked";}?> name="weather" id="family_room" >
                                                    <label for="family_room">Non</label>
                                                    <span class="check"></span>
                                                </div>

                                            </div>
                                        </div>


                                    </fieldset>

                                    <h3>
                                        Extra details
                                    </h3>
                                    <fieldset>



                                        <div class="container center" style="box-shadow: 0px 3px 9.5px 0.5px rgba(0, 0, 0, 0)" >
                                            <form method="POST" action=update_para.php" enctype="multipart/form-data">

                                                <label> Veuillez choisir la couleur de votre graphe</label>
                                                <br>
                                                <input type="color"  class="form-control" value="<?= $color_graph    ?>" name="color_graph">

                                                <!--                                                    <input type="color" value="#fad345" name="textcolor">-->


                                            </form>
                                        </div>



                                    </fieldset>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div >
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
$sql ="SELECT `background_img_user` FROM `user` WHERE `id_user` like '$id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $filename= ($row["background_img_user"]);
    echo  $filename;

}

if  ($filename == ''){
    ?><script>document.getElementById('background_img_user').style.backgroundImage= "url('images/solar.jpg')";</script><?php
}else{
    ?><script>document.getElementById('background_img_user').style.backgroundImage= "url(upload_background/<?php echo $filename; ?>)";</script><?php
}
?>


<!--   Core JS Files   -->
<script src="../<?= $directory ?>/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../<?= $directory ?>/js/core/popper.min.js" type="text/javascript"></script>
<script src="../<?= $directory ?>/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../<?= $directory ?>/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<!--  Notifications Plugin    -->
<script src="../<?= $directory ?>/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../<?= $directory ?>/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../<?= $directory ?>/js/demo1.js"></script>
<script src="../<?= $directory ?>/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../<?= $directory ?>/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="../<?= $directory ?>/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="../<?= $directory ?>/js/main2.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js


        demo.showNotification();




        $('#fileup').change(function(){
//here we take the file extension and set an array of valid extensions
            var res=$('#fileup').val();
            var arr = res.split("\\");
            var filename=arr.slice(-1)[0];
            filextension=filename.split(".");
            filext="."+filextension.slice(-1)[0];
            valid=[".jpg",".png",".jpeg",".bmp"];
//if file is not valid we show the error icon, the red alert, and hide the submit button
            if (valid.indexOf(filext.toLowerCase())==-1){
                $( ".imgupload" ).hide("slow");
                $( ".imgupload.ok" ).hide("slow");
                $( ".imgupload.stop" ).show("slow");

                $('#namefile').css({"color":"white","font-weight":700,"opacity":0.55});
                $('#namefile').html("Le fichier "+filename+" n'est pas une image !");

                $( "#submitbtn" ).hide();
                $( "#fakebtn" ).show();
            }else{
                //if file is valid we show the green alert and show the valid submit
                $( ".imgupload" ).hide("slow");
                $( ".imgupload.stop" ).hide("slow");
                $( ".imgupload.ok" ).show("slow");

                $('#namefile').css({"color":"white","font-weight":700,"opacity":0.55});
                $('#namefile').html(filename);

                $( "#submitbtn" ).show();

                $( "#fakebtn" ).hide();
            }
        });

        $('#submitbtn').click(function(e) {

            e.preventDefault();

            var file_data = $('#fileup').prop('files')[0];
            var form_data = new FormData();
            form_data.append('fileup', file_data);

            $.ajax({
                url : 'upload_background.php',
                type : 'POST', // Le type de la requête HTTP, ici devenu POST
                data : form_data,
                dataType : 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success : function(response){ // code_html contient le HTML renvoyé
                    //var filename = 'upload_background/'+response.file_data;

                    //document.getElementById('background_img_user').style.backgroundImage= "url(filename)";
                    if(response.msg == "success") {

                        demo.showNotiS('top','center');

                        $('#background_img_user').css('backgroundImage',"url("+response.file+")");

                    }else if(response.msg == "1"){
                        demo.showNoti1('top','center');
                    }else if(response.msg == "2"){
                        demo.showNoti2('top','center');
                    } else if(response.msg == "3"){
                        demo.showNoti3('top','center');

                    }      else if(response.msg == "alrtn"){
                        demo.showNotialrtn('top','center');
                    }

                }
            });
        });
    });



</script>

</html>
