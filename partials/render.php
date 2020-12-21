<?php
include '../controllas/content.con.php';
 function render_header(){
     session_start();
     if(isset($_SESSION['firstname'])){

         echo'<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between container">
        <img class="ml-3 " style = "max-height: 5rem;" src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
        <div class = "ml-auto d-inline-flex justify-content-around align-items-center">
        <p class="my-1"> Hi ' . htmlspecialchars($_SESSION["username"]) . '</p><br>
                <form class="" action = "controlla/logout.con.php" method = "POST">
                    <button class = "form-control-sm mx-3 btn-sm btn-outline-secondary" type = "submit" name = "logout">Log Out</button>
                </form>
        </div>
    </div>
    <nav class="ml-4 navbar navbar-light navbar-expand-lg bg-transparent navbar-custom">
        <!-- Brand -->
        <a class="navbar-brand" href="#">R V I</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="#">MH Topics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Archives</a>
                </li>
            </ul>
        </div>
     </nav>
</header>';
     }
     else{
         echo'<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Visionaries Initiative</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header class="mainheader">
    <div class = "d-flex justify-content-between container">
        <img class="ml-3" style ="max-height: 5rem;" src="../images/imageonline-co-whitebackgroundremoved.PNG" alt="">
        <div class = "ml-auto d-inline-flex justify-content-around align-items-center">
        <form class = "form-group form-inline d-l-block" action="controlla/login.con.php" method = "POST">
                    <input class = "form-control-sm form-former" type = "hidden" name = "url_log" value = {$_SERVER["REQUEST_URI"]}/>
                    <input class = "form-control-sm form-former  btn-outline-info" type = "name" placeholder = "Username/email" name = "uname_log" required/>
                    <input class = "form-control-sm form-former  btn-outline-info" type = "password" placeholder = "Password" name = "pw_log" required/>
                    <button class = "form-control-sm btn-sm btn-outline-secondary" type = "submit" name = "submit_log">LOG IN</button>
                </form>
</div>
    </div>
    <nav class="ml-4 navbar navbar-light navbar-expand-lg bg-transparent navbar-custom">
        <!-- Brand -->
        <a class="navbar-brand" href="#">R V I</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="#">MH Topics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Archives</a>
                </li>
            </ul>
        </div>
    </nav>
</header>';
     }
 }

 function render_banner(){
    $banner = get_banner_content();
     echo '<section id="" class="carousel slide subpage contact-page" data-ride="carousel" data-interval ="6500" >
                <div class="carousel-inner w-100">
                  <div class="carousel-item active w-100">
                    <img class="d-block w-100 landing-contact" src="' .$banner[0]->spread . '" alt="First slide">
                  </div>
                  <div class="carousel-item w-100">
                    <img class="d-block w-100 landing-contact" src="' .$banner[0]->spread . '" alt="Second slide">
                  </div>
                  <div class="carousel-item landing-contact">
                    <img class="d-block w-100 landing-contact" src="' .$banner[0]->spread . '" alt="Third slide">
                  </div>
                </div>
            </section>';

 }

 function render_media(){
     echo 'rest of the shit goes here';
 }

 function render_footer(){
     echo'<div
class="footer">
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <a class=" pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseOne">
                  Our Sponsors
                </a>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body container">
                    <ul class="list-unstyled">
                    <a href="#"><li>Grace Cottage</li>
                    <a href="#"><li>Sanwo Olu</li>
                    <a href="#"><li>Dr Peeeeee</li>
                      </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class=" pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseTwo">
                  Help Us
                </a>
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body container">
                    <ul class="list-unstyled">
                    <a href="#"><li>Become a real Visionary</li>
                    <a href="#"><li>Make A Donation</li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class="pity-sans collapsed card-link font-weight-bold" data-toggle="collapse" href="#collapseThree">
                  Help You
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body container" style="height: fit-content;">
                    <ul class=" pity-sans list-unstyled">
                    <a href="#"><li>Join a Support Group</li>
                    <a href="#"><li>Educate yourself on our many Topics</li>
                    <a href="#"><li>Join or Start a Discussion</li>
                    <a href="#"><li>Call Someone to Talk to</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="d-block d-flex p-3 " style="font-size: small;"> 
        <div class="mr-auto mt-3">Privacy Legal Notice</div>
        <ul class="mt-3 list-inline mx-auto">
          <li class="list-inline-item px-1">
            <img src="../images/icons/facebook (1).png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/instagram.png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/twitter.png">
          </li>
          <li class="list-inline-item px-1">
              <img src="../images/icons/whatsapp (1).png">
          </li>
        </ul>
        <div class="ml-auto mt-3">© 2019 R.V.I.</div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src ="../scripts/scripts.js"></script>
  </body>
</html>';
 }

 function render_body(){
    render_banner();
    render_media();
 }