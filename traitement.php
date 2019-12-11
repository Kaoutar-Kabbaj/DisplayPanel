<?php


//test connection to the database
include 'connection/db_connection_file.php';
$conn = OpenCon();
/*To update ...*/
$id_admin='24';
if(isset($_POST['name']) and isset($_POST['D_area']) and isset($_POST['email']) and isset($_POST['phone'])and isset($_POST['myselectbox'])and isset($_POST['username'])and isset($_POST['password'])){
$name = htmlspecialchars(addcslashes($_POST["name"], '\''));
$D_area = htmlspecialchars(addcslashes($_POST["D_area"], '\''));
$email = htmlspecialchars(addcslashes($_POST["email"], '\''));
$phone = htmlspecialchars(addcslashes($_POST["phone"], '\''));
$myselectbox = htmlspecialchars(addcslashes($_POST["myselectbox"], '\''));
$username = htmlspecialchars(addcslashes($_POST["username"], '\''));
$password = htmlspecialchars(addcslashes($_POST["password"], '\''));
$adresse=htmlspecialchars(addcslashes($_POST["adresse"], '\''));
$CD=htmlspecialchars(addcslashes($_POST["CD"], '\''));
$logo_user='Your-Logo-here.png';


$data= file_get_contents("https://www.booked.net/?page=weather_cities_json&q=".$CD."&langID=1");
    if($data) {
        $data = json_decode($data);
        $city_id = $data->results[0]->id;
    }

$random_number = mt_rand();
$dossier = 'data'.$random_number.$name;


//send mail to the administrator in order to give him the user path of its folder
    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
//    $headers  = 'MIME-Version: 1.0' . "\r\n";
//    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $email_company = 'info@solar-play.com';
    $headers =  "From: " . $email_company . "\r\n";
    $headers .= "CC: www.kaoutar.com@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $to_email = 'k.kabbaj@mundiapolis.ma';
    $subject = 'Enregistrement d\'un nouveau client';
    $message = '<html><head>
                  <title>Merci de mettre le chemin suivant dans le Datalogger :</title>
                  </head>
                  <body>
                  <div >
                  <table>
                  <tr><td><h3 style="color:darkslategrey">Nom du chemin à copier :</h3></td><td><h2 style="color:orangered">  "  public_html/solardisplay/'.$dossier.' "</h2> </td></tr>
                  <tr><td><h3 style="color:darkslategrey">Nom du client :</h3></td><td><h2 style="color:orangered;margin-left: -13%;">'.$name.'</h2></td></tr><br><br>
                  </table>
                  -------------------------------------------------------------------------------
                  <br>
                  <span>Adresse :La Jubarderie, 41270 Fontaine Raoul France </span><br>
                  <span>Tél :+33 2 54 23 39 90</span><br>
                  <span>Email:info@solar-play.com</span><br>
                  <span>Cordialement,</span><br>
                  <span>SolarPlayTeam</span> <br> <br>    
                  <img style="margin-left: -35%;" src="http://solarcity.ma/solardisplay/images/Logo_solar_play.png" /></div>
                 </body>';


//check if the email address is invalid $secure_check

    $secure_check = sanitize_my_email($to_email);

    if ($secure_check == false) {
        echo "Invalid input";
    } else { //send email
        mail($to_email, $subject, $message, $headers);
        echo "This email is sent using PHP Mail";
    }




$sql = "INSERT INTO `user`(`id_user`, `nom`, `D_area`, `email`, `num_tel`, `solutions`, `username`, `password`,`adresse`,`CD`,`user_role`,`city_id`,`fk_admin`,`dossier`,`titre`,`titre1`,`titre2`,`meteo`,`type_clock`,`logo_user`) VALUES (null,'$name', '$D_area', '$email','$phone','$myselectbox','$username','$password','$adresse','$CD','1','$city_id','$id_admin','$dossier','Centrale photovoltaique','Production actuelle','Ce  bâtiment  produit de l énergie solaire','weather1','clock1','$logo_user')
";

//$sql = "INSERT user (nom, D_area, email,num_tel,solutions,username,password) VALUES ('$name', '$D_area', '$email','$phone','$myselectbox','$username','$password') ";



    $result = $conn->query($sql);
if ($result === TRUE) {
    echo "New record created successfully";
	header("Location: authentification.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}
$conn->close();








?>



