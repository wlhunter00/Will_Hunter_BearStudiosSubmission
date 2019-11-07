<?php

    //clear previous data
    session_start();
    session_destroy();

    //load posted data
    require 'database.php';
    $inputUsername = (String)$_POST['username'];
    $un = $inputUsername;
    $inputPassword = (String)$_POST['password'];
    $pw = $inputPassword;
    $inputEmail = (String)$_POST['email'];
    $email = $inputEmail;

    //Check against users table
    $stmt = $mysqli->prepare("select count(*) from users where username =?");
    if(!$stmt){
      printf("Query Prep Failed: %s\n", $mysqli->error);
      exit;
    }
    $stmt->bind_param('s', $un);
    $stmt->execute();
    $stmt->bind_result($userExistCount);
    $stmt->fetch();
    $stmt->close();

    session_start();
    //if exists
    if($userExistCount > 0){
        //redirect to error
        $_SESSION['errorMessage'] = 'Username already exists!';
        header("Location: error.php");
        exit;
      }
    //else
    else{
        //create sql entry for user in users
        $stmt = $mysqli->prepare("insert into users (username, hashed_password, email) values (?, ?, ?)");
        if(!$stmt){
          printf("Query Prep Failed: %s\n", $mysqli->error);
          exit;
        }
        //hash password
        $stmt->bind_param('sss', $un, password_hash($pw, PASSWORD_DEFAULT), $email);
        $stmt->execute();
        $stmt->close();

        //start session
        $_SESSION['username'] = $un;
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        //redirect to feed
        header("Location: main_page.php");
        exit;
    }

?>
