<!DOCTYPE html>
<html lang="en">
<head>
    <title>SolarPlay</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/auth.css">
    <!--===============================================================================================-->

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50" style="
	            margin-bottom: -7%;
	            width: 390px;
                border-radius: 10px;
                overflow: hidden;
                margin-left: 14%;
                background: transparent;">
            <br>

            <h4 style="color:white">Entrez votre adresse email pour réinitialiser votre mot de passe.</h4><br>
            <h4 style="color:grey">Un nouveau mot de passe vous sera envoyé par e-mail.</h4><br><br>
            <form class="login100-form validate-form p-b-33 p-t-5" action="#" id="default_form"  method="POST">

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="email_forget" placeholder="Entrez votre email">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>
            <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn"  id="login">
                        Envoyer
                    </button>

                </div>
                <br>

                <center><a href="authentification.php" id="forget" >RETOUR</a></center>
            </form>
     <h6 id="title6">VOUS N'AVEZ PAS ENCORE DE COMPTE ? </h6>
            <br><a id="register" >ENREGISTREZ-VOUS SIMPLEMENT ICI</a>
        </div>
        <a><img src="images/logo-light.png"alt="" style="all: initial;
    margin-left: -141%;
    margin-bottom: 243%;"
                id="logofooterregister"></a>
    </div>
</div>


<div id="dropDownSelect1">
</div>
<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();

if (!empty($_POST["email_forget"])){
    $email_forget = $_POST["email_forget"];
    $sql = "SELECT * FROM user WHERE email like '$email_forget'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $name= $row['nom'];
        $password= $row['password'];
        $email= $row['email'];
        $id_user=$row['id_user'];

    }

    $newpassword = $name.rand();
    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//    $email_company = 'info@solar-play.com';
//    $headers =  "From: " . $email_company . "\r\n";
//    $headers .= "CC: www.kaoutar.com@gmail.com\r\n";
//    $headers .= "MIME-Version: 1.0\r\n";
//    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $to_email = 'k.kabbaj@mundiapolis.ma';
    $subject = 'Mot de passe oublié';
    $message = '<html><head>
                  <title>Votre nouveau mot de passe est :</title>
                  </head>
                  <body>
                  <div >
                  <table>
                  <tr><td><h3 style="color:darkslategrey">Nom utilisateur :</h3></td><td><h2 style="color:orangered">'.$name.'</h2> </td></tr>
                  <tr><td><h3 style="color:darkslategrey">Nouveau mot de passe :</h3></td><td><h2 style="color:orangered;margin-left: -13%;">'.$newpassword.'</h2></td></tr><br><br>
                  </table>
                  -------------------------------------------------------------------------------
                  <br>
                  <span>Adresse :La Jubarderie, 41270 Fontaine Raoul France </span><br>
                  <span>Tél :+33 2 54 23 39 90</span><br>
                  <span>Email:info@solar-play.com</span><br>
                  <span>Cordialement,</span><br>
                  <span>SolarPlayTeam</span> <br> <br>    
                  <img style="margin-left: -35%;" src="http://solar-play.com/solardisplay/images/Logo_solar_play.png" /></div>
                 </body>';


//check if the email address is invalid $secure_check

    $secure_check = sanitize_my_email($to_email);

    if ($secure_check == false) {
        echo "Invalid input";
    } else { //send email
        echo "This email is sent using PHP Mail";
        $sql= "UPDATE user SET password ='$newpassword' WHERE id_user = '$id_user'";
        if ($conn->query($sql) === TRUE) {
            //echo "New record updated successfully";

            echo"success";


        } else {
            echo "error update";
        }
        $conn->close();
        mail($to_email, $subject, $message, $headers);
        header("location:authentification.php");
    }


}




?>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>

<script>

    $(document).ready(function(){

        $("#register").click(function(){
            window.location.href = "register.php";
        });

        setTimeout(function() {
            document.getElementById('alrt').style.display ='none';
            window.location.href = "authentification.php";

        },3000);

    });


</script>