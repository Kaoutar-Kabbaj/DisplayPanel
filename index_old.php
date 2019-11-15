
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Centrale photovoltaïque</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="refresh" content="300">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
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
  <body>
  <?php

  // display the date of day
  $today  =  date("Ymd");
  //$today = "20191021";
  $today_cara= $str2 = "min".substr($today, 2);
  $namefile = "data/".$today_cara.".csv";
  //var_dump($namefile);


  //read the last file created from the directory

  $directory = glob("data/*.*");

  for ($i = 0; $i < count($directory); $i++) { // $i mean to start first files names.
      $num = $directory[$i];
      //$date[] = date("F d Y H:i:s.", filemtime($num));
      //var_dump($num);
      // Test if the num contains the day of the namefile
      if (strpos($num, $namefile) !== false) {

          $filename=$namefile;
          //echo $filename;
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

  function find_indice_row( $filename){

      $row = 1;
// The nested array to hold all the arrays
      $the_big_array = [];

// Open the file for reading
      if (($h = fopen("{$filename}", "r")) !== FALSE)
      {
          // Each line in the file is converted into an individual array that we call $data
          // The items of the array are comma separated
          while (($data = fgetcsv($h, 1000, ";")) !== FALSE)
          {
              // Each individual array is being pushed into the nested array
//	if (strpos($data[0],'#INV1') !== false){
//		echo "<b>trouv</b>";
//	}
              $num = count($data);
              //echo "<p> $num champs à la ligne $row: <br /></p>\n";
              $row++;
              if (strpos($data[0],'#INV1 ESN:210107379610HB002328') !== false){
                  //echo "le numero de la ligne cherche est :".$row;
                  $var_start=$row;
              }
              $the_big_array[] = $data;
          }

          // Close the file
          fclose($h);
      }
      return  $var_start;
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
  $desired_line = find_indice_row($filename);

  $fh = fopen( $filename,'r') or die($php_errormsg);
  while ((! feof($fh)) && ($line_counter <= $desired_line))
  {
      if ($s = fgets($fh,1048576)) {
          $line_counter++;

      }
  }
  fclose($fh) or die($php_errormsg);
  $result= explode( ';', $s);

  //var_dump($result);

  ?>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

<!--	      <div class="collapse navbar-collapse" id="ftco-nav">-->
<!--	        <ul class="navbar-nav ml-auto">-->
<!--	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>-->
<!--	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>-->
<!--	          <li class="nav-item"><a href="speakers.html" class="nav-link">Speakers</a></li>-->
<!--	          <li class="nav-item"><a href="schedule.html" class="nav-link">Schedule</a></li>-->
<!--	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
<!--	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
<!--	          <li class="nav-item cta mr-md-2"><a href="#" class="nav-link">Buy ticket</a></li>-->
<!---->
<!--	        </ul>-->
<!--	      </div>-->
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/slider-1.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Centrale <br><span>photovoltaïque</span></h1>
            <div id="timer" class="d-flex mb-3">
						  <div class="time">Uac<span><?php echo $result[5] ?></span></div>
						  <div class="time pl-4">Pac<span><?php echo $result[12] ?></span></div>
						  <div class="time pl-4">Qac<span><?php echo $result[13] ?></span></div>
						  <div class="time pl-4">Eac<span><?php echo $result[14] ?></span></div>
						</div>
          </div>
        </div>
      </div>
    </div>



    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved designed
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
      setInterval(function() {
          window.location.reload();
      }, 300000);

  </script>
  </body>
</html>