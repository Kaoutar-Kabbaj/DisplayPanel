
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
    <div class="wrapper wrapper--w680" style="
    width: 43%;">
        <div class="card card-4">
            <div class="card-body" style="padding: 26px 19px;">
                <h2 style="font-weight: bold;" class="title">
                    Inscription &nbsp; Installateur</h2> <a><img style="width: 35%;
    margin-left: 63%;
    margin-bottom: 5%;
    margin-top: -45%;" src="images/Logo_solar_play.png" alt=""
                    ></a>
                <form method="POST" action = "traitement_installateur.php">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Nom d'installateur</label>
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
                                <label class="label">Ville</label>
                                <input type="text" class="input--style-4" placeholder="" name="CD">
                            </div>
                        </div>

                    </div>
                    <div class="input-group">
                        <label class="label">Clients</label>
                        <div class="rs-select2 js-select-simple select--no-search">

                            <?php
                            $directory='solardisplay' ;
                            include '../'.$directory.'/connection/db_connection_file.php';
                            $conn = OpenCon();
//                            $sql = "SELECT * FROM `user` WHERE `fk_admin` IS NULL and user_role = '1'";
                            $sql = "SELECT * FROM `user` WHERE affected = 0 and user_role = '1'";
                            $result = $conn->query($sql);
                            $arr_users = [];
                            if ($result->num_rows > 0) {
                                $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                            }



//                            while ($row = $result->fetch_assoc()) {
//                                $nom = $row['nom'];
//                                $username = $row['username'];
//
//                            }


                            ?>

                            <select name="clients[ ]" multiple>
                                <option disabled="disabled" selected="selected">
                                    Choisissez vos clients</option>

                                <?php if(!empty($arr_users)) { ?>
                                    <?php foreach($arr_users as $user) { ?>
                                        <option value="<?php echo $user['id_user']; ?>"><?php echo $user['nom']; ?></option>

                                    <?php } ?>
                                <?php } ?>
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