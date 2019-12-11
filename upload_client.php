<?php
include 'connection/db_connection_file.php';
session_start();
$nom = $_POST["nom"];
$address = $_POST["address"];
$email = $_POST["email"];
$myselectbox = $_POST["myselectbox"];

$phone = $_POST["phone"];
$dossier = 'upload/';
$fichier = basename($_FILES['avatar']['name']);

//$taille_maxi = 100000;100ko
$taille_maxi = 20000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.');
$image = getimagesize('upload/'.$fichier);
$username=$_SESSION['username'] ;
$id_user =  $_SESSION["user"];

list($width, $height, $type, $attr) = $image;
echo "Width: " .$width. "<br />";
echo "Height: " .$height. "<br />";
echo "Type: " .$type. "<br />";
echo "Attribute: " .$attr. "<br />";



//Début des vérifications de sécurité...
if($fichier!=''){

    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
        //$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ...';
        $erreur='1';
    }


    if($_FILES['avatar']['name']=='')
    {
        //No file selected
        //$erreur='Veuillez sélectionner une image !' ;
        $erreur='2';
    }
    if($taille>$taille_maxi)
    {
        //$erreur = 'Le fichier est trop gros...';
        $erreur='3';
    }
    if($width>300 OR $height>300){
        $erreur='4';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            //$success = 1 ;
            //header('Location:user.php?fichier='.$fichier);
            $conn = OpenCon();

            //echo "le fichier n existe pas";
            $sql="UPDATE `user` SET `logo_user`= '$fichier',`nom`='$nom',`adresse`='$address',`email`= '$email',`solutions` = '$myselectbox',`num_tel`='$phone'  WHERE `id_user` LIKE '$id_user' ";
            $result = $conn->query($sql);
            if ($result === TRUE) {
//              echo "New record updated successfully";

          header('Location:manage_customers.php?word=upsucess');

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();

        }
        else //Sinon (la fonction renvoie FALSE).
        {
            $msg= 'error';
        }
    }
    else
    {
    header('Location:manage_customers.php?mg='.$erreur);
    }

}else{

    $conn = OpenCon();
    //echo "le fichier n existe pas";
    $sql="UPDATE `user` SET `nom`='$nom',`adresse`='$address',`email`= '$email',`solutions` = '$myselectbox',`num_tel`='$phone'  WHERE `id_user` LIKE '$id_user' ";
    $result = $conn->query($sql);
    if ($result === TRUE) {
//       echo "New record updated successfully";

    header('Location:manage_customers.php?word=upsucess');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();













}


?>
