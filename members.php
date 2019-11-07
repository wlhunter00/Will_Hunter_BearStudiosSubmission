<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
          const sessionUsername = '<?php
          session_start();
          echo $_SESSION["username"];
          ?>';
          if(sessionUsername === ''){
              $(".signedInNav").hide();
              $(".signedOutNav").show();
              console.log("No one signed in");
          }
          else{
            $(".signedOutNav").hide();
            $(".signedInNav").show();
            console.log("Someone signed in");
            }
            $(".signOutThing").unbind().click(function(){
              $(".signedInNav").hide();
              $(".signedOutNav").show();
              <?php
              // session_start();
              // session_destroy();
              ?>
            })
    });
  </script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Our Members</title>
</head>

<body>
  <!-- Top Nav Bar -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="main_page.php">The Pikers</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="main_page.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Explore the Pikers
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="members.php">Members</a></li>
            <li><a href="#">Shows</a></li>
            <li><a href="#">Tickets</a></li>
            <li><a href="pastShows.html">Past Performances</a></li>
            <li><a href="#">Give Feedback</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class = "signedInNav"><span class="glyphicon glyphicon-ok"></span> Welcome <?=$_SESSION['username']?></a></li>
        <li><a class= "signOutThing signedInNav" href='#'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
        <li><a class = "signedOutNav" href="#"><span class="glyphicon glyphicon-globe"></span> Welcome Guest</a></li>
        <li><a class = "signedOutNav" href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a class = "signedOutNav" href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      </ul>
    </div>
  </nav>
  <!-- Body -->
  <div class="container-fluid text-center">
    <div class="row content" style="display:inline-table">
      <div class="col-sm-1 sidenav">
      </div>
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="display-1 page-header">Meet Our Members</h1>
          </div>
        </div>
        <div class="row top-buffer">
          <div class="col-sm-4">
            <div class="well personContainer">
              <h3 class="memberName1">Mike Boeckman</h3>
              <img src="memberPhotos/mikeBoeckman.jpg" alt="Piker Image" class="memberPhoto1 img-fluid img-thumbnail">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit explicabo facilis eos! Nam id nulla itaque nostrum sit doloremque blanditiis minus nobis eos aspernatur! Mollitia, fugiat, consequuntur. Non accusamus, suscipit.</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well personContainer">
              <h3 class="memberName2">Devon Finlay</h3>
              <img src="memberPhotos/devonFinlay.jpg" alt="Piker Image" class="memberPhoto2 img-fluid img-thumbnail">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit explicabo facilis eos! Nam id nulla itaque nostrum sit doloremque blanditiis minus nobis eos aspernatur! Mollitia, fugiat, consequuntur. Non accusamus, suscipit.</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well personContainer">
              <h3 class="memberName3">Collin S</h3>
              <img src="memberPhotos/collinSzczepanski.jpg" alt="Piker Image" class="memberPhoto3 img-fluid img-thumbnail">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit explicabo facilis eos! Nam id nulla itaque nostrum sit doloremque blanditiis minus nobis eos aspernatur! Mollitia, fugiat, consequuntur. Non accusamus, suscipit.</p>
            </div>
          </div>
        </div>
        <div class="row top-buffer">
          <div class="col-sm-4">
            <div class="well personContainer">
              <h3 class="memberName4">Zach Eisner</h3>
              <img src="memberPhotos/zachEisner.jpg" alt="Piker Image" class="memberPhoto4 img-fluid img-thumbnail">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit explicabo facilis eos! Nam id nulla itaque nostrum sit doloremque blanditiis minus nobis eos aspernatur! Mollitia, fugiat, consequuntur. Non accusamus, suscipit.</p>
            </div>
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4">
            <div class="well personContainer">
              <h3 class="memberName5">Max Klapow</h3>
              <img src="memberPhotos/maxKlapow.jpg" alt="Piker Image" class="memberPhoto5 img-fluid img-thumbnail">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit explicabo facilis eos! Nam id nulla itaque nostrum sit doloremque blanditiis minus nobis eos aspernatur! Mollitia, fugiat, consequuntur. Non accusamus, suscipit.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3 sidenav">
        <a class="twitter-timeline" data-lang="en" data-width="90%" data-height="60%" data-theme="dark" data-link-color="#E81C4F" href="https://twitter.com/ThePikers?ref_src=twsrc%5Etfw">Tweets by ThePikers</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
  </div>
  <!-- <div class="container" style="text-align:center">
  </div> -->
  <!-- Footer -->
  <footer class="container-fluid text-center">
    <p>© 2019 The Pikers - Site Designed by Will Hunter</p>
  </footer>
</body>

</html>
