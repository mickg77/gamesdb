<?php require('connect.php');

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
  <form name="login" action="" method="POST">
        <label>Name</label>
        <input type="text" name="namebox" length="30">
        <br/>
        <label>Password</label>
        <input type="password" name="passwordbox" length="30">
        <br/>
        <input type="submit" name="submit">
  </form>