<!DOCTYPE html>
<html lang="en">
<head>
    <title>Centrale photovoltaïque</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="//db.onlinewebfonts.com/c/223f224650510797e0f06233d2a0f97b?family=DS-Digital" rel="stylesheet" type="text/css"/>
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
</head>
<body id="background_image" class="js-fullheight">
<?php

// display the date of day
$today = date("Ymd");
//$today = "20191021";
$today_cara = $str2 = "min" . substr($today, 2);
$namefile = "data/" . $today_cara . ".csv";
//var_dump($namefile);


//read the last file created from the directory

$directory = glob("data/*.*");

for ($i = 0; $i < count($directory); $i++) { // $i mean to start first files names.
    $num = $directory[$i];
    //$date[] = date("F d Y H:i:s.", filemtime($num));
    //var_dump($num);
    // Test if the num contains the day of the namefile
    if (strpos($num, $namefile) !== false) {

        $filename = $namefile;
        $file_exist_directory=1;
        //echo $filename;
    }
    else{
        $file_exist_directory=0;
    }
}

/*
  for ($i = 0; $i < count($date); $i++)  {
      echo $date[$i] ."<br />";
      //compare the date
//      if ($date[$i] <$date[$i+1]){
//          echo "la dernière date de modif est :".$date[$i+1];
//      }
//      else{
//          echo "la dernière date de modif est :".$date[$i];
//      }
  }
*/

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

/*******************************************************************/
//var_dump(find_indice_row($filename));
/********************************************************************/
// Display the code in a readable format
//echo "<pre>";
//var_dump($the_big_array);
//echo "</pre>";

/*
$var_start=0;
$row = 1;
$desired_line = 374;
if (($handle = fopen("min191021.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE && ($row <= $desired_line)) {

        $num = count($data);
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        if (strpos($data[0],'#INV1') !== false ){

for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";

        }       	 		}




    }
    fclose($handle);
}


*/
//first thing is to find the line number where you have #INV1 ESN:210107379610HB002328

$line_counter = 0;
if ($file_exist_directory==1) {
    $desired_line = find_indice_row($filename);

    $fh = fopen($filename, 'r') or die($php_errormsg);
    while ((!feof($fh)) && ($line_counter <= $desired_line)) {
        if ($s = fgets($fh, 1048576)) {
            $line_counter++;

        }
    }
    fclose($fh) or die($php_errormsg);
    $result = explode(';', $s);

//var_dump($result);


//insert data to the database
    include 'connection/db_connection_file.php';
    $conn = OpenCon();

    /*$sql = "SELECT * FROM file_data";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "E-Day: " . $row["E-Day"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();*/
//$string = $filename;
//$filenamedb = str_replace("data/", "", $string);
//


//check if the filename exists or not in the database
    $sql0 = "SELECT * FROM file_data WHERE filename like '$filename'";
    $result0 = $conn->query($sql0);
//
    if ($result0->num_rows > 0) {

        //echo "il y a un resultat";
        $sql4 = "UPDATE  file_data  SET dateinsertion=now(), Upv1=$result[1],Upv2=$result[2],ipv1=$result[3],ipv2=$result[4],Uac=$result[5],Iac=$result[6],Status=$result[7],Error=$result[8],Temp=$result[9],cos=$result[10],fac=$result[11],Pac=$result[12],Qac=$result[13],Eac=$result[14],Eday=$result[15],ETotal=$result[16],CycleTime=$result[17] where filename='$filename' ";
        if ($conn->query($sql4) === TRUE) {
            //  echo "New record updated successfully";
        } else {
            echo "Error: " . $sql4 . "<br>" . $conn->error;
        }
    } else {
        echo "0 results";
        //the row data must be stored in the database for each file
        $sql = "INSERT INTO file_data (dateinsertion,filename,Upv1,Upv2,ipv1,ipv2,Uac,Iac,Status,Error,Temp,cos,fac,Pac,Qac,Eac,EDay,ETotal,CycleTime) VALUES (now(),'$filename',$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10],$result[11],$result[12],$result[13],$result[14],$result[15],$result[16],$result[17])";
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

<div class="hero-wrap">

    <div class="overlay">
        <article class="clock">
            <div class="hours-container">
                <div class="hours"></div>
            </div>
            <div class="minutes-container">
                <div class="minutes"></div>
            </div>
            <div class="seconds-container">
                <div class="seconds"></div>
            </div>
        </article>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <img src="images/adiwatt_logo.png" alt="" id="lmnp">
                <img src="images/logo-light.png" alt="" id="logofooter">
            </div>
            <div class="col">
                <h1 id="title1">Centrale photovoltaïque</h1>
                
                <div>
                    <div id="m-booked-bl-simple-week-vertical-7492"></div>
                    <div id="menu">
                        <div  id="divR1">
                            <span id="spR1">Rendement journalier</span>
                        </div>
                        <div  id="divR2">
                            <img src="images/solar-panel.png" alt="" id="imgR1" />
                            <span  id="spR2" ><?php echo $result[15] ?>kWh</span>
                        </div>
                        <br>
                        <div id="divR3" >
                            <span id="spR3">Rendement mensuel</span>
                        </div>
                        <div  id="divR4" >
                            <img src="images/solar-panel.png" alt="" id="imgR4" />
                            <span id="spR4"><?php echo round($rendM,2) ?>kwh</span>
                        </div>
                        <br>
                        <div id ="divR5" >
                            <span id="spR5">CO<SUB>2</SUB> - évité</span>
                        </div>
                        <div  id="divR6" >
                            <img src="images/co2.png" alt="" id="imgR6" />
                            <span id="spR6" ><?php  echo round($CO,2); ?>t</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="ftco-footer ftco-bg-dark ftco-section" id="footer1212">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p> Copyright &copy; <?php echo date('Y'); ?> All rights reserved designed by SolarPlay® </p>
                </div>
            </div>
        </div>
    </footer>

</div>


</body>
</html>
<?php
}
else{
    echo ("Error in the datalogger !");
}
?>

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
            src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=18374&type=4&scode=124&ltid=3457&domid=581&anc_id=55880&cmetric=1&wlangID=3&color=137AE9&wwidth=160&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script>
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
            src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=18374&type=4&scode=124&ltid=3457&domid=581&anc_id=55880&cmetric=1&wlangID=3&color=rgba(255,255,255,0)&wwidth=160&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script>
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




