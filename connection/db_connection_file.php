<?php
//function OpenCon()
//{

//    $dbhost = "ftp.solarcity.ma";
//    $dbuser = "solarcit_data";
//    $dbpass = "TestSolarcit";
//    $db = "solarcit_file_data";
//    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
//
//    return $conn;
//}
//
//function CloseCon($conn)
//{
//    $conn -> close();
//}


//function OpenCon()
//{
//
//    $dbhost = "ftp.solar-play.com";
//    $dbuser = "solarpla_data";
//    $dbpass = "TestSolarplay";
//    $db = "solarpla_file_data";
//    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
//
//    return $conn;
//}
//
//function CloseCon($conn)
//{
//    $conn -> close();
//}






function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "solarcit_file_data";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
?>