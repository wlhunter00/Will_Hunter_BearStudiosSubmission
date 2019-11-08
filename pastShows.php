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
          if(sessionUsername === 'pikerAdmin'){
              $(".editMemberForm").show();
          }
          else{
            $(".editMemberForm").hide();
          }
          $(".signOutThing").unbind().click(function(){
            $(".signedInNav").hide();
            $(".signedOutNav").show();
            location.href = 'signOut.php';
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
            <li><a href="members.php">Members</a></li>
            <li><a href="#">Shows</a></li>
            <li><a href="#">Tickets</a></li>
            <li class="active"><a href="pastShows.html">Past Performances</a></li>
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
    <div class="row content">
      <div class="col-sm-1 sidenav">
      </div>
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="display-1 page-header">Our Past Shows</h1>
          </div>
        </div>
        <div class="row top-buffer">
          <?php
            require 'database.php';
            $stmt = $mysqli->prepare('SELECT videoName, videoURL FROM videos');
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }
            $stmt->execute();
            $stmt->bind_result($videoName, $videoURL);
            while($stmt->fetch()){
              echo '<div class="col-sm-10 col-sm-offset-1">';
                echo '<div class="well showContainer">';
                  echo '<h3 class="text-left videoName">', $videoName, '</h3>';
                  echo '<iframe width="90%" height="400px" src="', $videoURL,'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                  echo '<button type="button" class="btn btn-primary editMemberForm" data-toggle="modal" data-target="#exampleModal">';
                echo '</div>';
              echo '</div>';
              $countLoop = $countLoop + 1;

            }
           $stmt->close();
           ?>
        </div>
      </div>
      <div class="col-sm-3 sidenav">
        <a class="twitter-timeline" data-lang="en" data-width="90%" data-height="60%" data-theme="dark" data-link-color="#E81C4F" href="https://twitter.com/ThePikers?ref_src=twsrc%5Etfw">Tweets by ThePikers</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="container-fluid text-center">
    <p>© 2019 The Pikers - Site Designed by Will Hunter</p>
  </footer>

</body>

</html>
