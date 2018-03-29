<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LAIF</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">LAIF</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#mission">Mission</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To LAIF!</div>
        <div class="intro-heading text-uppercase">Legal Aid Initiative Forum</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#mission">Tell Me More</a>
      </div>
    </div>
  </header>

  <!-- About -->
  <section id="about" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About Us</h2>
          <h3 class="section-subheading text-muted center">
          	<?php 
          	$myfile = fopen("site_details/about_us.txt", "r") or die("Unable to open file!");
          	while(!feof($myfile)) {
 		 echo "<p>" . fgets($myfile) . "</p>";
		}
		//echo fread($myfile,filesize("site_details/about_us.txt"));
		fclose($myfile);
          	?>
          </h3>
        </div>
      </div>
    </div>
  </section>

  <!-- Mission -->
  <section id="mission">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Mission</h2>
          <h3 class="section-subheading text-muted center">
           <?php 
          	$myfile = fopen("site_details/mission.txt", "r") or die("Unable to open file!");
          	while(!feof($myfile)) {
 		 echo "<p>" . fgets($myfile) . "</p>";
		}
		//echo fread($myfile,filesize("site_details/mission.txt"));
		fclose($myfile);
          ?>
          </h3>
        </div>
      </div>
    </div>
  </section>


  <!-- Services -->
  <!--
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">We provide court representation to Plaintiff as well as Respondent in</h3>
	<?php
	$myfile = fopen("site_details/services.txt", "r") or die("Unable to open file!");
  	while(!feof($myfile)) {
	  echo "<div class=\"row text-center\"><div class=\"col-lg-12 text-center\"><h5>".fgets($myfile)."</h5></div></div>";
	}
	fclose($myfile);
         ?>
          <br>
          <div class="row text-center"><div class="col-lg-12 text-center"><h3 class="section-subheading text-muted">before all courts and tribunals including the Supreme Court of India.</h3></div></div>
        </div></div>
      </div>
    </section>
-->
    <!-- Team -->
    <section id="team" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Some of our esteemed members</h3>
          </div>
        </div>
        <?php 
        
        $files = glob('site_details/team/*.{txt}', GLOB_BRACE);
        $totalFiles = count($files);
        if($totalFiles <= 3){
        
        	$maxColWidth = 12;
        	$numOfColumns = count($files);
       		$colWidth = $maxColWidth/$numOfColumns;
        	echo " <div class=\"row\">";
        	
		foreach($files as $file) {
		
			$filename = pathinfo($file)['filename'];
			$myfile = fopen($file, "r") or die("Unable to open file!");
			$fileContents = fread($myfile,filesize($file));
			fclose($myfile);
	  		echo "<div class=\"col-sm-$colWidth\">
	            <div class=\"team-member\">
	              <img class=\"mx-auto rounded-circle\" src=\"img/team/$filename.jpg\" alt=\"\">
	              <h4>$filename</h4>
	              <br>
	              <h3 class=\"section-subheading text-muted\">$fileContents</h3>
	            </div>
	          </div>";
	          
		}  
		
		echo "</div>"; 
		
        }
        else{
        
	        $numOfRows = ceil($totalFiles/3);
	        $startFile = 0; $endFile = 3;
	        
	        for($x = 0 ; $x < $numOfRows ; $x++){
	        
	        	echo " <div class=\"row\">";
	        	
	        	$maxColWidth = 12;
	        	$numOfColumns = $endFile - $startFile;
	       		$colWidth = $maxColWidth/$numOfColumns;
	       		
			for($y = $startFile; $y < $endFile; $y++) {
			
				$file = $files[$y];
				$filename = pathinfo($file)['filename'];
				$myfile = fopen($file, "r") or die("Unable to open file!");
				$fileContents = fread($myfile,filesize($file));
				fclose($myfile);
		  		echo "<div class=\"col-sm-$colWidth\">
		            <div class=\"team-member\">
		              <img class=\"mx-auto rounded-circle\" src=\"img/team/$filename.jpg\" alt=\"\">
		              <h4>$filename</h4>
		              <br>
		              <h3 class=\"section-subheading text-muted\">$fileContents</h3>
		            </div>
		          </div>";
		          
			} 
			$startFile = $y;
			if(($startFile + 3)>$totalFiles){
				$endFile = $startFile + ($totalFiles - $startFile);
			}
			else{
				$endFile = $startFile + 3;
			}
			
			echo "</div>"; 
		}
        }
       ?>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">We would love to know more about you!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
          
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
</form>
      	</div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy;LAIF 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <span class="copyright">Designed by <a style="color:black" target="_blank" href="https://www.linkedin.com/in/sourabh-saha-sssaha2">Sourabh Saha</a></span>
          </div>
        </div>
      </div>
    </footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>

</body>

</html>
