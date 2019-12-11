<?php
include 'connection/db_connection_file.php';
session_start();

$dossier = 'upload_background/';
$fichier = basename($_FILES['fileup']['name']);
$id_user = $_SESSION["user_id"];
$taille_maxi = 500000;
$taille = filesize($_FILES['fileup']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['fileup']['name'], '.');
//$image = getimagesize('upload_background/'.$fichier);

$username=$_SESSION['username'] ;

//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
   //echo 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ...';
    $erreur='1';

}


if($_FILES['fileup']['name']=='')
{
    //No file selected
   //echo 'Veuillez sélectionner une image !' ;
    $erreur='2';
}
if($taille>$taille_maxi)
{
    //$erreur = 'Le fichier est trop gros...';
    $erreur='3';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['fileup']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        //$success = 1 ;
        //header('Location:user.php?fichier='.$fichier);
        $conn = OpenCon();

        //echo "le fichier n existe pas";
        $sql="UPDATE `user` SET `background_img_user`= '$fichier' WHERE `id_user` LIKE '$id_user' ";
        $result = $conn->query($sql);
        if ($result === TRUE) {

            $data = "success";
            $file = "upload_background/".$fichier;
            //echo "New record updated successfully";

//            header('Location:espace.php?image=suc');
        } else {

            $data = "error";
            $file = "images/solar.jpg";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

    }
    else //Sinon (la fonction renvoie FALSE).
    {
        $msg= 'error';
        $data = "error";
        $file = "images/solar.jpg";

//        header('Location: espace.php?msg=error');
    }
}
else
{
//header('Location:espace.php?mg='.$erreur);
    $data = $erreur;
    $file = "images/solar.jpg";
}

echo json_encode([
    'msg' => $data,
    'file' => $file
]);

?>
