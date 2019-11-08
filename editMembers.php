<?php
  session_start();
  require 'database.php';

  // gaining regular information
  $memberName = $_POST['editMemberName'];
  $description = $_POST['editMemberDescription'];
  $username = $_SESSION['username'];
  $memberID = $_POST['editMemberID'];
  echo $memberName, "<br>", $description, "<br>", $username , "<br>", $memberID, "<br>";
  if($username == "pikerAdmin"){
    echo "admin user";
    $stmt = $mysqli ->prepare("update members set memberName = ?, memberDescription = ? where memberID = ?");
    $stmt -> bind_param('sss', $memberName, $description, $memberID);
    if(!$stmt){
      printf("Query Prep Failed: %s\n", $mysqli->error);
      echo 'BROKE';
      exit;
    }
    $stmt -> execute();
    $stmt -> close();
  }
  else{
    echo "not admin";
  }

  if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  else{
    header("Location: main_page.php");
  }
  exit;
?>
