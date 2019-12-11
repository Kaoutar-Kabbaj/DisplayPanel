<?php
session_start();

if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}
$directory=$_SESSION["directory"] ;
?>



<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../<?=$directory?>/css/main.css" rel="stylesheet" media="all">
    <div class="card-body">
        <form method="POST" action = "traitement_administrateur.php">
            <div class="row row-space">
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Nom d'entreprise</label>
                        <input class="input--style-4" type="text" name="name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Domaine d'activité</label>
                        <input class="input--style-4" type="text" name="D_area">
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Nom d'utilisateur</label>
                        <input class="input--style-4" type="text" name="username" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Mot de passe</label>
                        <input class="input--style-4" type="password" name="password" required>
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Email</label>
                        <input class="input--style-4" type="email" name="email" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Numéro de téléphone</label>
                        <input class="input--style-4" type="text" name="phone" required>
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Adresse</label>
                        <input class="input--style-4" type="text" name="adresse">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <label class="label">Ville</label>
                        <input type="text" class="input--style-4" placeholder="" name="CD">
                    </div>
                </div>
            </div>

            <div class="row row-space">
                <div class="col-2">
                    <div class="input-group">
                        <label class="label">Solutions</label>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="myselectbox" class="input--style-4">
                                <option disabled="disabled" selected="selected">Choisissez une option</option>
                                <option value="myoption1" class="input--style-4">Solution 1</option>
                                <option value="myoption2">Solution 2</option>
                                <option value="myoption3"> Solution 3</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <button class="login100-form-btn">Ajouter</button>
                </div>
                <div class="col-3">
                    <a href="dashboard_admin.php" style="    font-family: Ubuntu-Bold;
    font-size: 18px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    min-width: 160px;
    height: 45px;
    border-radius: 21px;
    background: #bf2020;
    position: relative;
    z-index: 1;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
    margin-left: 227%;">Annuler</a>
                </div>
            </div>
        </form>
    </div>