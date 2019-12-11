<?php

//test connection to the database
include 'connection/db_connection_file.php';
$conn = OpenCon();
/*To update ...*/
$id_admin='24';

$tab_clients_affected =  array();
if(isset($_POST['name']) and isset($_POST['D_area']) and isset($_POST['email']) and isset($_POST['phone'])and isset($_POST['clients'])and isset($_POST['username'])and isset($_POST['password'])) {
    $name = htmlspecialchars(addcslashes($_POST["name"], '\''));
    $D_area = htmlspecialchars(addcslashes($_POST["D_area"], '\''));
    $email = htmlspecialchars(addcslashes($_POST["email"], '\''));
    $phone = htmlspecialchars(addcslashes($_POST["phone"], '\''));
    $username = htmlspecialchars(addcslashes($_POST["username"], '\''));
    $password = htmlspecialchars(addcslashes($_POST["password"], '\''));
    $adresse = htmlspecialchars(addcslashes($_POST["adresse"], '\''));
    $CD = htmlspecialchars(addcslashes($_POST["CD"], '\''));
    $logo_user = 'Your-Logo-here.png';
    $clients = $_POST['clients'];
    $data = file_get_contents("https://www.booked.net/?page=weather_cities_json&q=". $CD . "&langID=1");
    if ($data) {
        $data = json_decode($data);
        $city_id = $data->results[0]->id;
    }

    $dossier = '';
    $user_role ='3';
    if ($clients!='') {
        if (sizeof($clients) ==1){
            $data_affected  = $clients;

        }else{
            foreach ($clients as $selectValue) {
            $tab_clients_affected [] = $selectValue;
        }
        $data_affected = json_encode($tab_clients_affected);
        }


    }else{

        $data_affected='';
    }






    $sql = "INSERT INTO `user`(`id_user`, `nom`, `D_area`, `email`, `num_tel`,`fk_admin`, `username`, `password`,`adresse`,`CD`,`user_role`,`city_id`,`dossier`,`titre`,`titre1`,`titre2`,`meteo`,`type_clock`,`logo_user`,`list_customers`,`affected`) VALUES (null,'$name', '$D_area', '$email','$phone','$id_admin' ,'$username','$password','$adresse','$CD','$user_role','$city_id','$dossier','Centrale photovoltaique','Production actuelle','Ce  bâtiment  produit de l énergie solaire','weather1','clock1','$logo_user','$data_affected',1)";

    $result = $conn->query($sql);


    if ($result === TRUE) {
        //echo "New record created successfully";
        $sql = "SELECT * FROM user WHERE user_role ='3' and list_customers != ''";
        $result = $conn->query($sql);
        $tab = array();
        while ($row = $result->fetch_assoc()) {
            $id_installer = $row['id_user'];
            $list_customer = json_decode($row['list_customers']);
            $test= implode(',', $list_customer);
//       $tab = array_merge($tab,$test) ;

        }
        // make affetced to 1 when the id is in the table
        $sql="UPDATE `user` SET `affected`= 1 WHERE `id_user` IN ($test)  ";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            //echo "New record updated successfully";
            header("Location: authentification.php");


        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}


$conn->close();








?>



