<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>SolarPlay</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>

<div class="container-login100"  style="background-image: url('images/bg-01.jpg');">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 style="font-weight: bold;" class="title">
                    Inscription</h2> <a><img style="width: 48%;
    margin-left: 55%;
    margin-bottom: 5%;
    margin-top: -45%;" src="images/Logo_solar_play.png" alt=""
                                                          ></a>
                <form method="POST" action = "traitement.php">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nom d'entreprise</label>
                                <input class="input--style-4" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Domaine d'activité</label>
                                <input class="input--style-4" type="text" name="D_area">
                            </div>
                        </div>

                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nom d'utilisateur</label>
                                <input class="input--style-4" type="text" name="username" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Mot de passe</label>
                                <input class="input--style-4" type="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">
                                    Numéro de téléphone</label>
                                <input class="input--style-4" type="text" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Adresse</label>
                                <input class="input--style-4" type="text" name="adresse">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Code Postal</label>
                                <input type="number" class="input--style-4" placeholder="ZIP Code" name="CD">
                            </div>
                        </div>

                    </div>
                    <div class="input-group">
                        <label class="label">Solutions</label>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="myselectbox">
                                <option disabled="disabled" selected="selected">
                                    Choisissez une option</option>
                                <option value="myoption1">Solution 1</option>
                                <option value="myoption2">Solution 2</option>
                                <option value="myoption3"> Solution 3</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <button class="login100-form-btn">
                           S'enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>


<!-- end document-->