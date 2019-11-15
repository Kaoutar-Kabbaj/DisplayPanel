<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
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
    <link rel="apple-touch-icon" sizes="76x76" href="../adiwatt/images/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SolarPlay</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../adiwatt/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../adiwatt/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../adiwatt/css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="../adiwatt/css/upload.css" rel="stylesheet" >
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style2.css">
</head>


<body style="overflow: hidden;">
<?php
include 'connection/db_connection_file.php';
session_start();
$conn = OpenCon();


if (isset($_SESSION['username'])){

    $username=$_SESSION['username'] ;
    $sql = "SELECT * FROM user WHERE username like '$username'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        //echo " le total est  " . $row["sumetotal"]. "<br>";
        $titre = $row['titre'];
        $meteo = $row['meteo'];
        $dossier = $row['dossier'];
        $type_clock =$row['type_clock'];
        $type_data_logger =$row['type_data_logger'];


    }
}
?>
<div class="wrapper">
    <div class="sidebar" data-image="../adiwatt/images/sidebar-5.jpg">
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
                    <a class="nav-link" href="dashboard.php">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="./user.php">
                        <i class="nc-icon nc-circle-09"></i>
                        <p>Profil Utilisateur</p>
                    </a>
                </li>
                <li>
                <li class="nav-item active">
                    <a class="nav-link" href="./espace.php">
                        <i class="nc-icon nc-tap-01"></i>
                        <p>Mon espace</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="./panneau.php">
                        <i class="nc-icon nc-tv-2"></i>
                        <p>Panneau d'affichage</p>
                    </a>
                </li>

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
                        <center><img src="images/logo-light.png" alt=""></center>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Style</li>
                    <li class="adjustments-line">
                        <a href="javascript:void(0)" class="switch-trigger">
                            <p>Background Image</p>
                            <label class="switch">
                                <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary">
                                <span class="toggle"></span>
                            </label>

                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="adjustments-line">
                        <a href="#" class="switch-trigger background-color">
                            <p>Filters</p>
                            <div class="pull-right">
                                <span class="badge filter badge-black" data-color="black"></span>
                                <span class="badge filter badge-azure" data-color="azure"></span>
                                <span class="badge filter badge-green" data-color="green"></span>
                                <span class="badge filter badge-orange" data-color="orange"></span>
                                <span class="badge filter badge-red" data-color="red"></span>
                                <span class="badge filter badge-purple active" data-color="purple"></span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li class="header-title">Sidebar Images</li>
                    <li class="active">
                        <a class="img-holder switch-trigger" href="#">
                            <img src="../adiwatt/images/sidebar-1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="#">
                            <img src="../adiwatt/images/sidebar-3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="#">
                            <img src="../adiwatt/images/sidebar-4.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a class="img-holder switch-trigger" href="#">
                            <img src="../adiwatt/images/sidebar-5.jpg" alt="">
                        </a>
                    </li>
                    <li class="button-container">
                        <div class="">
                            <a href="#" target="_blank" class="btn btn-default btn-block btn-fill">Enregister</a>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
        <!-- Navbar -->
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
                                <i class="nc-icon nc-palette"></i>
                                <span class="d-lg-none">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="nc-icon nc-planet"></i>
                                <span class="notification">5</span>
                                <span class="d-lg-none">Notification</span>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="#">Notification 1</a>
                                <a class="dropdown-item" href="#">Notification 2</a>
                                <a class="dropdown-item" href="#">Notification 3</a>
                                <a class="dropdown-item" href="#">Notification 4</a>
                                <a class="dropdown-item" href="#">Another notification</a>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nc-icon nc-zoom-split"></i>
                                <span class="d-lg-block">&nbsp;Search</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <span class="no-icon">Account</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="no-icon">Dropdown</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
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
            <div class="container-fluid">
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
                                                <label for="title">titre</label>
                                                <input type="text" class="form-control"  placeholder="Centrale Photovoltaique" name="Titre" value="<?php echo $titre;?>" />                                                    </div>
                                            <div class="form-select">
                                                <label for="country"> Type montre</label>
                                                <div class="select-group">
                                                    <select name="myclock" class="custom-select mb-3">
                                                        <option value="clock1" <?php if($type_clock =="clock1") echo 'selected="selected"'; ?>> Analogique</option>
                                                        <option value="clock2" <?php if($type_clock =="clock2") echo 'selected="selected"'; ?>>Digitale</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="title">Dossier</label>
                                                <input type="text"  class="form-control" placeholder="Data" name="Data" value="<?php echo $dossier; ?>"/>                                                    </div>
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
                                            <form method="POST" action="upload_background.php" enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-3 col-md-offset-3 center" style="border:none;">
                                                        <div class="alert alert-success" role="alert" id="alrt" style="display: none; margin-right: -319%;
    margin-top: -36%;">Upload effectué avec succès !</div><br/>

                                                    </div>
                                                    <div class="col-md-6 col-md-offset-3 center">
                                                        <div class="btn-container" id="background_img_user" style="background-size: cover;">
                                                            <!--the three icons: default, ok file (img), error file (not an img)-->
                                                            <h1 class="imgupload"><i class="fa fa-file-image-o"></i></h1>
                                                            <h1 class="imgupload ok" ><i class="fa fa-check"></i></h1>
                                                            <h1 class="imgupload stop" style="opacity:0.55"><i class="fa fa-times"></i></h1>
                                                            <!--this field changes dinamically displaying the filename we are trying to upload-->
                                                            <p id="namefile">
                                                                Seules les types d'images (jpg, jpeg, bmp, png) seront autorisées</p>
                                                            <!--our custom btn which which stays under the actual one-->
                                                            <button type="button" id="btnup" class="btn btn-primary btn-lg"> Sélectionner une photo sur votre ordinateur! </button>
                                                            <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
                                                            <input type="file" value="" name="fileup" id="fileup">

                                                        </div>

                                                    </div>
                                                    <div class="col-md-3 col-md-offset-3 center">
                                                    </div>

                                                </div>

                                                <!--additional fields-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
                                                        <!--                                                            <input type="submit" value="Submit!" class="btn btn-primary" id="submitbtn">-->


                                                        <button type="button" class="btn btn-default" disabled="disabled" id="fakebtn">Modifier <i class="fa fa-minus-circle"></i></button>
                                                        <button type="submit" name="envoyer" class="btn btn-success" id="submitbtn" >Modifier l'image</button>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>



                                    </fieldset>

                                </form>

                            </div>

                        </div>
                    </div>
                    <!--                    <div class="col-md-6" >
                                            <div class="card card-user" style=" background-image: url('images/solar_user.jpg');">
                                                <div class="card-image">
                                                </div>
                                                <div class="card-body">
                                                    <div class="author">
                                                        <a href="#">
                                                            <img class="avatar border-gray" src="images/edit.jpg" alt="...">
                                                            <h5 class="title">Mike Andrew</h5>
                                                        </a>
                                                        <p class="description">
                                                            michael24
                                                        </p>
                                                    </div>

                                                </div>
                                                <hr>
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
                    -->                </div>
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

<!--   -->
<!-- <div class="fixed-plugin">
<div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
    </a>

    <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Style</li>
        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger">
                <p>Background Image</p>
                <label class="switch">
                    <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                </label>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <p>Filters</p>
                <div class="pull-right">
                    <span class="badge filter badge-black" data-color="black"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-orange" data-color="orange"></span>
                    <span class="badge filter badge-red" data-color="red"></span>
                    <span class="badge filter badge-purple active" data-color="purple"></span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="header-title">Sidebar Images</li>

        <li class="active">
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-1.jpg" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-3.jpg" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="..//assets/img/sidebar-4.jpg" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-5.jpg" alt="" />
            </a>
        </li>

        <li class="button-container">
            <div class="">
                <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
            </div>
        </li>

        <li class="header-title pro-title text-center">Want more components?</li>

        <li class="button-container">
            <div class="">
                <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
            </div>
        </li>

        <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

        <li class="button-container">
            <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
            <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
        </li>
    </ul>
</div>
</div>
-->
</body>


<?php
$sql ="SELECT `background_img_user` FROM `user` WHERE `username` like '$username'";
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
<script src="../adiwatt/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../adiwatt/js/core/popper.min.js" type="text/javascript"></script>
<script src="../adiwatt/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../adiwatt/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<!--  Notifications Plugin    -->
<script src="../adiwatt/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../adiwatt/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../adiwatt/js/demo1.js"></script>
<script src="../adiwatt/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../adiwatt/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="../adiwatt/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="../adiwatt/js/main2.js"></script>
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
