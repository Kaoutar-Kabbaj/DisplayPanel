<!DOCTYPE html>
<html lang="en">
<?php

include 'connection/db_connection_file.php';
$conn = OpenCon();
session_start();
$directory='solardisplay';
if (!empty($_POST["username"]) && !empty($_POST["pass"])){
    $username = $_POST["username"];
    $password =$_POST["pass"];
    $myselectbox = $_POST["myselectbox"];
    $_SESSION['username'] = $username ;
    $_SESSION['myselectbox'] = $myselectbox ;

    if (isset($_SESSION['username'])){
        $sql = "SELECT * FROM user WHERE username like '$username' and password like '$password' and  user_role = '2' ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $id_user = $row['id_user'];

        }
        if ($result->num_rows > 0) {

            $_SESSION["loggedIn"] = true;
            $_SESSION['id_user'] = $id_user ;
            header("Location: dashboard_admin.php");
            $_SESSION['directory'] = $directory;
            Exit;
        }
        else {


            $sql = "SELECT * FROM user WHERE username like '$username' and password like '$password' and  user_role = '1' ";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                $user = $row['id_user'];

                $user_name = $row['username'];
                $fk_admin = $row['fk_admin'];
            }
            if ($result->num_rows > 0) {
                $_SESSION["loggedIn"] = true;
                $_SESSION['user'] = $user;
                $_SESSION['fk_admin'] = $fk_admin;
                $_SESSION['directory'] = $directory;
                $_SESSION['username'] = $user_name;
                header("Location: dashboard_user.php");

            } else {

                $sql = "SELECT * FROM user WHERE username like '$username' and password like '$password' and  user_role = '3' ";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $user = $row['id_user'];
                    $fk_admin = $row['fk_admin'];
                }
                if ($result->num_rows > 0) {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['fk_admin'] = $fk_admin;
                    $_SESSION['directory'] = $directory;
                    header("Location: dashboard_installateur.php");

                }

            else {
                header("Location: authentification.php?message=error");
            }


            }

        }


        $conn->close();

    }
}



?>
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
				<span class="login100-form-title p-b-41">
					Authentification
				</span>
                <?php if( isset( $_GET['message'] ) AND $_GET['message'] == 'error' ): ?>
                    <div class="alert alert-danger" role="alert" id="alrt">Le nom d'utilisateur ou le mot de passe est incorrect réessayez !</div><br/>
                <?php endif ?>

                <?php if( isset( $_GET['msg'] ) AND $_GET['msg'] == 'deco' ): ?>
                    <div class="alert alert-success" role="alert" id="alrt">Vous venez de vous deconnecter !</div><br/>
                <?php endif ?>

				<form class="login100-form validate-form p-b-33 p-t-5" action="#" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Entrez votre nom d'utilisateur">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Entrez votre mot de passe">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn"  id="login">
							Login
                        </button>

					</div>
                    <br> <center><a href="forgot.php" id="forget">Mot de passe oublié ?</a></center>
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