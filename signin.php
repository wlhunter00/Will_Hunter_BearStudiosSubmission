<?php
    // Getting data
    session_start();
    session_destroy();
    require 'database.php';
    $inputUsername = (String)$_POST['email'];
    $un = $inputUsername;
    $inputPassword = (String)$_POST['password'];
    $pw = $inputPassword;
    //Check against users table

    $stmt = $mysqli->prepare("select count(*), username, hashed_password from users where email =?");
    if(!$stmt){
      printf("Query Prep Failed: %s\n", $mysqli->error);
    	exit;
    }
    $stmt->bind_param('s', $un);
    $stmt->execute();
    $stmt->bind_result($userExistCount, $username, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    session_start();
    //if exists
    if($userExistCount > 0){
          //check password
          if(password_verify($pw, $hashedPassword)){
              //start session
              $_SESSION['username'] = $username;
              $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
              $_SESSION['sortType'] = 'popular';
              //redirect to main
              header("Location: main_page.php");
              exit;
        }
        else {
          $_SESSION['errorMessage'] = 'Wrong password!';
          header("Location: error.php");
          exit;
        }
      }
    else {
    //else
        //redirect to login
        $_SESSION['errorMessage'] = 'User not found!';
        header("Location: error.php");
        exit;
  }


?>
