<!DOCTYPE html>
<html lang="en">
<head>
	<title>SolarPlay</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Authentification
				</span>
                <?php if( isset( $_GET['message'] ) AND $_GET['message'] == 'error' ): ?>
                    <div class="alert alert-danger" role="alert" id="alrt">Username or password is invalid</div><br/>
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
				</form>
				<h6 style="color: white;
    margin-left: 10%;
    margin-top: 10%;">VOUS N'AVEZ PAS ENCORE DE COMPTE ? </h6>
					<br><a id="register" >ENREGISTREZ-VOUS SIMPLEMENT ICI</a>
			</div>
			<a><img src="images/logo-light.png" alt=""
					id="logofooterregister"></a>
		</div>
	</div>


	<div id="dropDownSelect1">
	</div>
    <?php
    include 'connection/db_connection_file.php';
    $conn = OpenCon();
    session_start();

    if (!empty($_POST["username"]) && !empty($_POST["pass"])){
        $username = $_POST["username"];
        $password =$_POST["pass"];
        $_SESSION['username'] = $username ;
        if (isset($_SESSION['username'])){
        $sql = "SELECT * FROM user WHERE username like '$username' and password like '$password' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: dashboard.php");
            Exit;
        }
        else{
            header("Location: authentification.php?message=error");
        }

        $conn->close();

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

        },3000);

	});
</script>