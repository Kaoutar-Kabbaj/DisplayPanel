<?php
session_start();
session_destroy();
header('Location:authentification.php?msg=deco');
?>
<!--<script>-->
<!--   //alert("vous venez de vous deconnecter !");-->
<!---->
<!--   window.location.href = "authentification.php";-->
<!--</script>-->
