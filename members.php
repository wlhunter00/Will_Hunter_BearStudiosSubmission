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
          $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var memName = button.prevAll('h3.memberName').text();
            var memID = button.prevAll('input.memberID').val();
            var memDesc = button.prevAll('p.memberDesc').text();
            var modal = $(this);
            console.log(memID);
            modal.find('input.editMemberID').val(memID);
            modal.find('input.editMemberName').val(memName);
            modal.find('textarea.editMemberDescription').val(memDesc);
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
            <li><a href="pastShows.php">Past Performances</a></li>
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
        <?php
          $countLoop = 0;
          require 'database.php';
          $stmt = $mysqli->prepare('SELECT memberID, memberName, memberDescription, imageLink FROM members');
          if(!$stmt){
              printf("Query Prep Failed: %s\n", $mysqli->error);
              exit;
          }
          $stmt->execute();
          $stmt->bind_result($memberID, $memberName, $memberDescription, $imageLink);
          while($stmt->fetch()){
            if($countLoop == 3){
              echo '</div>';
              echo '<div class="row top-buffer">';
              $countLoop = 1;
            }
            echo  '<div class="col-sm-4">';
            echo    '<div class="well personContainer">';
            echo      '<h3 class="memberName">',$memberName, '</h3>';
            echo      '<img src="', $imageLink, '" alt="Piker Image" class="memberPhoto img-fluid img-thumbnail">';
            echo      '<input type="hidden" class = "memberID" value="', $memberID, '">';
            echo      '<p class = "memberDesc">', $memberDescription, '</p>';
            echo      '<button type="button" class="btn btn-primary editMemberForm" data-toggle="modal" data-target="#exampleModal">';
            echo        'Edit';
            echo      '</button>';
            echo    '</div>';
            echo  '</div>';
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

  <!-- edit modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="editMembers.php" method="post">
            <div class="form-group">
              <label for="member-name" class="col-form-label">Member Name:</label>
              <input type="text" class="form-control editMemberName" name = "editMemberName" id="member-name">
            </div>
            <div class="form-group">
              <label for="description-text" class="col-form-label">Member Description:</label>
              <textarea class="form-control editMemberDescription" name = "editMemberDescription" id="description-text"></textarea>
            </div>
            <input class = "editMemberID" type="hidden" name="editMemberID">
            <button type="submit" class="btn btn-primary">Submit Changes</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
