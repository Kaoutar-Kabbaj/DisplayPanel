<html lang="en">
<head>
    <title>SolarPlay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="//db.onlinewebfonts.com/c/223f224650510797e0f06233d2a0f97b?family=DS-Digital" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="../adiwatt/css/demo.css" rel="stylesheet"/>
    <link href="../adiwatt/css/clock.css" rel="stylesheet"/>
    <link href="../adiwatt/css/light-bootstrap-dashboard2.css?v=2.0.0 " rel="stylesheet"/>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript"> var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-378139-21']);
        _gaq.push(['_gat._anonymizeIp']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })(); </script>
    <style type="text/css">.scrollax-performance, .scrollax-performance *, .scrollax-performance *:before, .scrollax-performance *:after {
            pointer-events: none !important;
            -webkit-animation-play-state: paused !important;
            animation-play-state: paused !important;
        }

        ;</style>



    <link rel="stylesheet" type="text/css" href="https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1">
    <link rel="stylesheet" type="text/css" href="https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1">
</head>
<body id="background_image" style="width: 100%;" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">

<?php
session_start();
include 'connection/db_connection_file.php';
$conn = OpenCon();
function get_data()
{

    if (isset($_SESSION['username'])) {
        $conn = OpenCon();
        $username = $_SESSION['username'];
        $sql = "SELECT *FROM user WHERE username like '$username'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $titre = $row['titre'];
            $meteo = $row['meteo'];
            $dossier = $row['dossier'];
            $type_clock = $row['type_clock'];
            $type_data_logger = $row['type_data_logger'];
            $logo_user = $row['logo_user'];

        }


    }
    return array('titre' => $titre, 'meteo' => $meteo, 'dossier' => $dossier, 'type_clock' => $type_clock, 'type_data_logger' => $type_data_logger, 'logo_user' => $logo_user);

}

?>



<?php
//Huwaei data logger
/*function type_data_logger($type_data_logger){
 if($type_data_logger == 'logger1'){
echo "Huawei";


 }else if($type_data_logger == 'logger2'){
  echo "SMA";
 }
 elseif($type_data_logger == 'logger3'){
   echo "Fronius";
 }


}*/


$tab [] = get_data();
$titre = $tab[0]['titre'];
$dossier = $tab[0]['dossier'];
$meteo = $tab[0]['meteo'];
$type_clock = $tab[0]['type_clock'];

$type_data_logger = $tab[0]['type_data_logger'];
$logo_user = $tab[0]['logo_user'];


if ($type_data_logger == 'logger1') {
    ?>
    <script>  $(document).ready(function () {
            demo.showNotificationHuawei();
        })</script>
<?php

} else if ($type_data_logger == 'logger2') {
?>
    <script>  $(document).ready(function () {
            demo.showNotificationSMA();
        })</script><?php
} elseif ($type_data_logger == 'logger3') {
?>
    <script>  $(document).ready(function () {
            demo.showNotificationFronius();
        })</script><?php
}


function get_file_name()
{

    $tab [] = get_data();
    $dossier = $tab[0]['dossier'];


// display the date of day
    $today = date("Ymd");
//$today = "20191021";
    $today_cara = $str2 = "min" . substr($today, 2);
    $namefile = $dossier . "/" . $today_cara . ".csv";
//var_dump($namefile);


//read the last file created from the directory

    $directory = glob($dossier . "/*.*");

    for ($i = 0; $i < count($directory); $i++) { // $i mean to start first files names.
        $num = $directory[$i];
        //$date[] = date("F d Y H:i:s.", filemtime($num));
        //var_dump($num);
        // Test if the num contains the day of the namefile
        if (strpos($num, $namefile) !== false) {

            $filename = $namefile;
            $file_exist_directory = 1;
            //echo $filename;
        } else {
            $file_exist_directory = 0;
        }
    }


    return array('filename' => $filename, 'file_exist_directory' => $file_exist_directory);


}

function find_indice_row($filename)
{

    $row = 1;
// The nested array to hold all the arrays
    $the_big_array = [];

// Open the file for reading
    if (($h = fopen("{$filename}", "r")) !== FALSE) {
        // Each line in the file is converted into an individual array that we call $data
        // The items of the array are comma separated
        while (($data = fgetcsv($h, 1000, ";")) !== FALSE) {
            // Each individual array is being pushed into the nested array
//	if (strpos($data[0],'#INV1') !== false){
//		echo "<b>trouv</b>";
//	}
            $num = count($data);
            //echo "<p> $num champs à la ligne $row: <br /></p>\n";
            $row++;
            if (strpos($data[0], '#INV1 ESN:210107379610HB002328') !== false) {
                //echo "le numero de la ligne cherche est :".$row;
                $var_start = $row;
            }
            $the_big_array[] = $data;
        }

        // Close the file
        fclose($h);
    }
    return $var_start;
}


$file_directory[] = get_file_name();
$file_exist_directory = $file_directory[0]['file_exist_directory'];
$filename = $file_directory[0]['filename'];

function read_since_line($file_exist_directory, $filename)
{

    $line_counter = 0;
    if ($file_exist_directory == 1) {
        $desired_line = find_indice_row($filename);

        $fh = fopen($filename, 'r') or die($php_errormsg);
        while ((!feof($fh)) && ($line_counter <= $desired_line)) {
            if ($s = fgets($fh, 1048576)) {
                $line_counter++;

            }
        }
        fclose($fh) or die($php_errormsg);
        $result = explode(';', $s);

    } else {
        header("Location: error.php");
    }

    return $result;


}


//insert data to the database

$result[] = read_since_line($file_exist_directory, $filename);
$upv1 = $result[0][1];
$upv2 = $result[0][2];
$ipv1 = $result[0][3];
$ipv2 = $result[0][4];
$uac = $result[0][5];
$iac = $result[0][6];
$status = $result[0][7];
$error = $result[0][8];
$temp = $result[0][9];
$cos = $result[0][10];
$fac = $result[0][11];
$pac = $result[0][12];
$qac = $result[0][13];
$eac = $result[0][14];
$eday = $result[0][15];
$eTotal = $result[0][16];
$cycleTime = $result[0][17];
//check if the filename exists or not in the database
$sql0 = "SELECT * FROM file_data WHERE filename like '$filename'";
$result0 = $conn->query($sql0);
//
if ($result0->num_rows > 0) {

    //echo "il y a un resultat";
    $sql4 = "UPDATE  file_data  SET dateinsertion=now(), Upv1=$upv1,Upv2=$upv2,ipv1=$ipv1,ipv2=$ipv2,Uac=$uac,Iac=$iac,Status= $status,Error=$error,Temp=$temp,cos=$cos,fac=$fac,Pac=$pac,Qac=$qac,Eac=$eac,Eday=$eday,ETotal=$eTotal,CycleTime=$cycleTime where filename='$filename' ";
    if ($conn->query($sql4) === TRUE) {
        //  echo "New record updated successfully";
    } else {
        echo "Error: " . $sql4 . "<br>" . $conn->error;
    }
} else {
    echo "0 results";
    //the row data must be stored in the database for each file
    $sql = "INSERT INTO file_data (dateinsertion,filename,Upv1,Upv2,ipv1,ipv2,Uac,Iac,Status,Error,Temp,cos,fac,Pac,Qac,Eac,EDay,ETotal,CycleTime) VALUES (now(),'$filename','$upv1','$upv2','$ipv1','$ipv2','$uac','$iac','$status','$error','$temp','$cos','$fac','$pac','$qac','$eac','$eday','$eTotal','$cycleTime ')";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

//count the data eday stored in the database for monthly return

$sql2 = "SELECT SUM(EDay) as sumeday FROM file_data";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {
        //echo " le rendement mensuel est  " . $row["sumeday"]. "<br>";
        $rendM = $row["sumeday"];
    }
} else {
    echo "0 results";
}

//count the Co2 formula

$sql5 = "SELECT SUM(ETotal) as sumetotal FROM file_data";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
    // output data of each row
    while ($row = $result5->fetch_assoc()) {
        //echo " le total est  " . $row["sumetotal"]. "<br>";
        $CO = ($row["sumetotal"] * 0.718) / 1000;
        //echo $CO;
    }
} else {
    echo "0 results";
}

?>

<div class="col-lg-4" style="position: absolute;
    width: 25%;
    height: 114%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';
    opacity: 1.08;    background: #000000;
    /* background: #6b75ff; */
    /* background: -webkit-linear-gradient(45deg, #212529 0%, #212529 0%, #212529 100%); */
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.25) 0%, #212529 0%, rgba(0, 0, 0, 0.1) 100%);
">
</div>
<div class="container-fluid" style="margin-top:2%;">
    <div class="row">
        <div class="col">

            <div class="col-lg-12 col-md-4">
                <center><img src="upload/<?php echo $logo_user; ?>" alt=""></center>
            </div>
            <div class="col-lg-12 col-md-4">
                <center>
             <article class="clock" style="margin-top: 30%; display: none" id="clock1">
                    <div class="hours-container">
                        <div class="hours" style="transform: rotateZ(648.5deg);"></div>
                    </div>
                    <div class="minutes-container" data-second-angle="318">
                        <div class="minutes" style="transform: rotateZ(222deg);"></div>
                    </div>
                    <div class="seconds-container">
                        <div class="seconds" style="transform: rotateZ(318deg);"></div>
                    </div>


                </article>

                    <div class="clockd large" id="clock">
                        <br><br><br>
                        <div class="time"></div>
                    </div>
                </center>

            </div>

            <div class="col-lg-12 col-md-4" style="margin-top: 15%;">
                <center><img src="images/logo-light.png" alt=""></center>

            </div>

        </div>

        <div class="col-6">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style=" color: #f8b81d; font-family: 'DS-Digital', arial;"><?php echo $titre ?></h1>
                    </div>
                    <div class="col-lg-12" style="margin-top: 8%;">
                        <div>
                            <div id="divR1">
                                <span id="spR1">Rendement journalier</span>
                            </div>
                            <div id="divR2">
                                <img src="images/solar-panel.png" alt="" id="imgR1">
                                <span id="spR2"><?php echo $result[0][15] ?>kWh</span>
                            </div>
                            <br>
                            <div id="divR3">
                                <span id="spR3">Rendement mensuel</span>
                            </div>
                            <div id="divR4">
                                <img src="images/solar-panel.png" alt="" id="imgR4">
                                <span id="spR4"><?php echo round($rendM, 2) ?>kwh</span>
                            </div>
                            <br>
                            <div id="divR5">
                                <span id="spR5">CO<sub>2</sub> - évité</span>
                            </div>
                            <div id="divR6">
                                <img src="images/co2.png" alt="" id="imgR6">
                                <span id="spR6"><?php echo round($CO, 2); ?>t</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div id="m-booked-bl-simple-week-vertical-7492">
                <div class="booked-wzs-160-275 weather-customize"
                     style="background-color:#rgba(255,255,255,0); width:200px;" id="width2 "><a target="_blank"
                                                                                                 class="booked-wzs-top-160-275"
                                                                                                 href="https://www.booked.net/"><img
                                src="//s.bookcdn.com/images/letter/s5.gif" alt="booked.net"></a>
                    <div class="booked-wzs-160-275_in">
                        <div class="booked-wzs-160-275-data">
                            <div class="booked-wzs-160-275-left-img wrz-06"></div>
                            <div class="booked-wzs-160-275-right">
                                <div class="booked-wzs-day-deck">
                                    <div class="booked-wzs-day-val">
                                        <div class="booked-wzs-day-number"><span class="plus">+</span>19</div>
                                        <div class="booked-wzs-day-dergee">
                                            <div class="booked-wzs-day-dergee-val">°</div>
                                            <div class="booked-wzs-day-dergee-name">C</div>
                                        </div>
                                    </div>
                                    <div class="booked-wzs-day">
                                        <div class="booked-wzs-day-d"><span class="plus">+</span>19°</div>
                                        <div class="booked-wzs-day-n"><span class="plus">+</span>18°</div>
                                    </div>
                                </div>
                                <div class="booked-wzs-160-275-info">
                                    <div class="booked-wzs-160-275-city smolest">Casablanca</div>
                                    <div class="booked-wzs-160-275-date">Lundi, 04</div>
                                </div>
                            </div>
                        </div>
                        <a target="_blank" href="https://hotelmix.fr/weather/casablanca-18374"
                           class="booked-wzs-bottom-160-275">
                            <table cellpadding="0" cellspacing="0" class="booked-wzs-table-160">
                                <tbody>
                                <tr>
                                    <td class="week-day"><span class="week-day-txt">Mardi</span></td>
                                    <td class="week-day-ico">
                                        <div class="wrz-sml wrzs-18"></div>
                                    </td>
                                    <td class="week-day-val"><span class="plus">+</span>19°</td>
                                    <td class="week-day-val"><span class="plus">+</span>15°</td>
                                </tr>
                                <tr>
                                    <td class="week-day"><span class="week-day-txt">Mercredi</span></td>
                                    <td class="week-day-ico">
                                        <div class="wrz-sml wrzs-01"></div>
                                    </td>
                                    <td class="week-day-val"><span class="plus">+</span>20°</td>
                                    <td class="week-day-val"><span class="plus">+</span>14°</td>
                                </tr>
                                <tr>
                                    <td class="week-day"><span class="week-day-txt">Jeudi</span></td>
                                    <td class="week-day-ico">
                                        <div class="wrz-sml wrzs-03"></div>
                                    </td>
                                    <td class="week-day-val"><span class="plus">+</span>20°</td>
                                    <td class="week-day-val"><span class="plus">+</span>13°</td>
                                </tr>
                                <tr>
                                    <td class="week-day"><span class="week-day-txt">Vendredi</span></td>
                                    <td class="week-day-ico">
                                        <div class="wrz-sml wrzs-06"></div>
                                    </td>
                                    <td class="week-day-val"><span class="plus">+</span>18°</td>
                                    <td class="week-day-val"><span class="plus">+</span>14°</td>
                                </tr>
                                <tr>
                                    <td class="week-day"><span class="week-day-txt">Samedi</span></td>
                                    <td class="week-day-ico">
                                        <div class="wrz-sml wrzs-01"></div>
                                    </td>
                                    <td class="week-day-val"><span class="plus">+</span>18°</td>
                                    <td class="week-day-val"><span class="plus">+</span>12°</td>
                                </tr>
                                <tr>
                                    <td class="week-day"><span class="week-day-txt">Dimanche</span></td>
                                    <td class="week-day-ico">
                                        <div class="wrz-sml wrzs-01"></div>
                                    </td>
                                    <td class="week-day-val"><span class="plus">+</span>19°</td>
                                    <td class="week-day-val"><span class="plus">+</span>12°</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="booked-wzs-center"><span
                                        class="booked-wzs-bottom-l">Prévisions sur 7 jours</span></div>
                        </a></div>
                </div>
            </div>
        </div>


    </div>

</div>

<?php
/*

if($type_clock== 'clock1'){
//echo "montre Analogique active";
*/?><!--<script>document.getElementById('clock1').style.display = "block";</script><?php
/*}else {
  //echo "montre Digitale active";
   */?><script>document.getElementById('clock2').style.display = "block";</script>--><?php
/*} */?>
<footer class="ftco-footer ftco-bg-dark  fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p> Copyright © <!--?php echo date('Y'); ?--> All rights reserved designed by SolarPlay® </p>
            </div>
        </div>
    </div>
</footer>


<script src="js/jquery.min.js"></script>

<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="../adiwatt/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../adiwatt/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="../adiwatt/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="../adiwatt/js/main2.js"></script>
<script src="../adiwatt/js/plugins/bootstrap-notify.js"></script>
<script src="../adiwatt/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="js/scrollax.min.js"></script>


<script src="js/main.js"></script>

<script>
    /*
  * Starts any clocks using the user's local time
  * From: cssanimation.rocks/clocks
  */
    function initLocalClocks() {
        // Get the local time using JS
        var date = new Date;
        //alert(date);
        var seconds = date.getSeconds();
        var minutes = date.getMinutes();
        var hours = date.getHours();

        // Create an object with each hand and it's angle in degrees
        var hands = [
            {
                hand: 'hours',
                angle: (hours * 30) + (minutes / 2)
            },
            {
                hand: 'minutes',
                angle: (minutes * 6)
            },
            {
                hand: 'seconds',
                angle: (seconds * 6)
            }
        ];
        // Loop through each of these hands to set their angle
        for (var j = 0; j < hands.length; j++) {
            var elements = document.querySelectorAll('.' + hands[j].hand);
            for (var k = 0; k < elements.length; k++) {
                elements[k].style.webkitTransform = 'rotateZ(' + hands[j].angle + 'deg)';
                elements[k].style.transform = 'rotateZ(' + hands[j].angle + 'deg)';
                // If this is a minute hand, note the seconds position (to calculate minute position later)
                if (hands[j].hand === 'minutes') {
                    elements[k].parentNode.setAttribute('data-second-angle', hands[j + 1].angle);
                }
            }
        }
    }


    initLocalClocks();
    //reload the page every 5 minutes
    setInterval(function () {
        window.location.reload();

    }, 300000);


</script>
<!-- weather widget start -->

<script type="text/javascript">
    var css_file = document.createElement("link");
    css_file.setAttribute("rel", "stylesheet");
    css_file.setAttribute("type", "text/css");
    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1');
    document.getElementsByTagName("head")[0].appendChild(css_file);

    function setWidgetData(data) {
        if (typeof (data) != 'undefined' && data.results.length > 0) {
            for (var i = 0; i < data.results.length; ++i) {
                var objMainBlock = document.getElementById('m-booked-bl-simple-week-vertical-7492');
                if (objMainBlock !== null) {
                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                    objMainBlock.innerHTML = data.results[i].html_code;
                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                }
            }
        } else {
            alert('data=undefined||data.results is empty');
        }
    } </script>
<script type="text/javascript" charset="UTF-8"
        src="https://widgets.booked.net/weather/info?action=get_weather_info&amp;ver=6&amp;cityID=18374&amp;type=4&amp;scode=124&amp;ltid=3457&amp;domid=581&amp;anc_id=55880&amp;cmetric=1&amp;wlangID=3&amp;color=137AE9&amp;wwidth=160&amp;header_color=ffffff&amp;text_color=333333&amp;link_color=08488D&amp;border_form=1&amp;footer_color=ffffff&amp;footer_text_color=333333&amp;transparent=0"></script>
<!-- weather widget end -->
<script type="text/javascript"> var css_file = document.createElement("link");
    css_file.setAttribute("rel", "stylesheet");
    css_file.setAttribute("type", "text/css");
    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1');
    document.getElementsByTagName("head")[0].appendChild(css_file);

    function setWidgetData(data) {
        if (typeof (data) != 'undefined' && data.results.length > 0) {
            for (var i = 0; i < data.results.length; ++i) {
                var objMainBlock = document.getElementById('m-booked-bl-simple-week-vertical-7492');
                if (objMainBlock !== null) {
                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                    objMainBlock.innerHTML = data.results[i].html_code;
                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                }
            }
        } else {
            alert('data=undefined||data.results is empty');
        }
    } </script>
<script type="text/javascript" charset="UTF-8"
        src="https://widgets.booked.net/weather/info?action=get_weather_info&amp;ver=6&amp;cityID=18374&amp;type=4&amp;scode=124&amp;ltid=3457&amp;domid=581&amp;anc_id=55880&amp;cmetric=1&amp;wlangID=3&amp;color=rgba(255,255,255,0)&amp;wwidth=200&amp;header_color=ffffff&amp;text_color=333333&amp;link_color=08488D&amp;border_form=1&amp;footer_color=ffffff&amp;footer_text_color=333333&amp;transparent=0"></script>
<script>
    if (navigator.geolocation) {
        // Request the current position
        // If successful, call getPosSuccess; On error, call getPosErr
        navigator.geolocation.getCurrentPosition(getPosSuccess, getPosErr);
    } else {
        alert('geolocation not available?! What year is this?');
        // IP address or prompt for city?
    }

    // getCurrentPosition: Successful return
    function getPosSuccess(pos) {
        // Get the coordinates and accuracy properties from the returned object
        var geoLat = pos.coords.latitude.toFixed(5);
        var geoLng = pos.coords.longitude.toFixed(5);
        var geoAcc = pos.coords.accuracy.toFixed(1);
    }

    // getCurrentPosition: Error returned
    function getPosErr(err) {
        switch (err.code) {
            case err.PERMISSION_DENIED:
                //alert("User denied the request for Geolocation.");
                break;
            case err.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case err.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            default:
                alert("An unknown error occurred.");
        }
    }
</script>

<!-- weather widget start -->
<script type="text/javascript"> $(document).ready(function () {
        $("div#clock").simpleClock(1);
    });
    (function ($) {
        $.fn.simpleClock = function (utc_offset) {
            var language = "fr";
            switch (language) {
                case "de":
                    var weekdays = ["So.", "Mo.", "Di.", "Mi.", "Do.", "Fr.", "Sa."];
                    var months = ["Jan.", "Feb.", "Mär.", "Apr.", "Mai", "Juni", "Juli", "Aug.", "Sep.", "Okt.", "Nov.", "Dez."];
                    break;
                case "es":
                    var weekdays = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"];
                    var months = ["Ene", "Feb", "Mar", "Abr", "Mayo", "Jun", "Jul", "Ago", "Sept", "Oct", "Nov", "Dic"];
                    break;
                case "fr":
                    var weekdays = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
                    var months = ["Jan", "Fév", "Mars", "Avr", "Mai", "Juin", "Juil", "Août", "Sept", "Oct", "Nov", "Déc"];
                    break;
                default:
                    var weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
                    var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
                    break;
            }
            var clock = this;

            function getTime() {
                var date = new Date();
                var nowUTC = date.getTime() + date.getTimezoneOffset() * 60 * 1000;
                date.setTime(nowUTC + (utc_offset * 60 * 60 * 1000));
                var hour = date.getHours();
                if (language == "en") {
                    suffix = (hour >= 12) ? 'p.m.' : 'a.m.';
                    hour = (hour > 12) ? hour - 12 : hour;
                    hour = (hour == '00') ? 12 : hour;
                }
                return {
                    day: weekdays[date.getDay()],
                    date: date.getDate(),
                    month: months[date.getMonth()],
                    year: date.getFullYear(),
                    hour: appendZero(hour),
                    minute: appendZero(date.getMinutes()),
                    second: appendZero(date.getSeconds())
                };
            }

            function appendZero(num) {
                if (num < 10) {
                    return "0" + num;
                }
                return num;
            }

            function refreshTime(clock_id) {
                var now = getTime();
                clock = $.find('#' + clock_id);
                $(clock).find('.date').html(now.day + ', ' + now.date + '. ' + now.month + ' ' + now.year);
                $(clock).find('.time').html("<span class='hour'>" + now.hour + "</span>:<span class='minute'>" + now.minute + "</span>:<span class='second'>" + now.second + "</span>");
                if (typeof (suffix) != "undefined") {
                    $(clock).find('.time').append('<strong>' + suffix + '</strong>');
                }
            }

            var clock_id = $(this).attr('id');
            refreshTime(clock_id);
            setInterval(function () {
                refreshTime(clock_id)
            }, 1000);
        };
    })(jQuery); </script>

</body>
</html>