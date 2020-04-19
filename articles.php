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
      <a class="navbar-brand" href="/">LAIF</a>
    </div>
  </nav>

  <!-- About -->
  <section id="about" class="bg-light">
    <div class="container">
      <?php

      if($_GET["a"]){
        $file = base64_decode(urldecode($_GET["a"]));
        echo "<div class=\"row\">
        <div class=\"col-lg-12\">";

        $myfile = fopen($file, "r") or die("Unable to open file!");
        $head_line = fgets($myfile);
        $author = fgets($myfile);
        $file_date = date('l jS \of F Y', filemtime($file));
        echo "<h3 class=\"section-heading text-uppercase\">$head_line</h3>";
        echo "<p><b>$author</b></p>";
        echo "<p><b>$file_date</b></p>";
        while(!feof($myfile)) {
          echo "<p>" . fgets($myfile) . "</p>";
        }
        fclose($myfile); 
        echo "</div>";
        echo "</div>";
      }
      else{
        $files = glob('site_details/news/*.{txt}', GLOB_BRACE);

        // compares time stamps of files to sort them in descending order
        function timestamp_cmp($file1, $file2){
          if(filemtime($file1) == filemtime($file2)){
            return 0;
          }
          return (filemtime($file1) < filemtime($file2)) ? 1 : -1;
        }
        
        usort($files, timestamp_cmp);
        $totalFiles = count($files);

        for($x = 0; $x < $totalFiles; $x++){

          $file = $files[$x];
          echo "<div class=\"row\">
          <div class=\"col-lg-12\">";

          $myfile = fopen($file, "r") or die("Unable to open file!");
          $head_line = fgets($myfile);
          $author = fgets($myfile);
          $file_date = date('l jS \of F Y', filemtime($file));
          echo "<h3 class=\"section-heading text-uppercase\">$head_line</h3>";
          echo "<p><b>$author</b></p>";
          echo "<p><b>$file_date</b></p>";
          while(!feof($myfile)) {
            echo "<p>" . fgets($myfile) . "</p>";
          }
          fclose($myfile); 
          echo "</div>";
          echo "</div><hr>";
        }
      }
      ?>
    </div>
    <div class="col-lg-12 text-center">
        <div id="back-to-home"></div>
        <a href="/"><button id="backButton" class="btn btn-primary btn-xl text-uppercase">Back</button></a>
      </div>
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
