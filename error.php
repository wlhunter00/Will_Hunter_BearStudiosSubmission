<!DOCTYPE html>
<!-- Basic fail site you get brought to if things go bad-->
<html lang=en>
<head>
    <meta charset="utf-8" />
    <title>Error - Process Failed</title>
</head>

<!--BEGIN CONTENT-->
<body>
    <!--DISPLAY ERROR MESSAGE-->
    <h1 id="titleHeading" style="text-align:center">Error - Process Failed</h1>
    <div id="main" style="text-align:center">


        <?php

        //Begins session
            session_start();
            echo "<p>Error is: ".$_SESSION['errorMessage']."</p><br>";
        ?>
        <!--Redirect to main page -->
      <form action="main_page.php" method="POST">
        <input type="submit" value="Return">
      </form>
    </div>
</body>

</html>
