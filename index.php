<?php require('connect.php');
    session_start();
    if(isset($_POST['submit'])){

        //check if login is achieved
        //get variables from form
        $username=$_POST['namebox'];
        $password=$_POST['passwordbox'];

        $stmt= $conn->prepare("SELECT * FROM users WHERE
        username =:username AND password=:password");

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();

        if($stmt->rowCount()>0){
            echo "<p>Login successful</p>";
            $_SESSION['admin']=true;
        }

        else {
            echo "<p>no record exists</p>";
        }
      }//end of POST Submit check
?>
<?php 

    if(!isset($_SESSION['admin'])){
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Login Page</title>  
  </head>  
  <body>
    <?php require('nav.php'); ?>  
  
  <form name="login" action="" method="POST">
        <label>Name</label>
        <input type="text" name="namebox" length="30">
        <br/>
        <label>Password</label>
        <input type="password" name="passwordbox" length="30">
        <br/>
        <input type="submit" name="submit">
  </form>
<?php
    }
    else {
      require('nav.php');
      echo ("<h2>You have already logged in!</h2>");
    }
?>
</body>
</html>