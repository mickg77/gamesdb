<?php
      session_start();
      if(isset($_SESSION['admin'])){
          require('connect.php');
?>
          <!DOCTYPE html>
          <head>
            <title>Something</title>
          </head>
          <body>
            <?php require('nav.php'); 
            if(isset($_POST['submit'])){ //when the form has been submitted

              $username   =   $_POST['namebox'];
              $password   =   $_POST['passwordbox'];
              $email      =   $_POST['emailbox'];
              $dob        =   $_POST['datebox'];
              $role       =   $_POST['rolebox'];

              $stmt=$conn->prepare("INSERT INTO users 
                                      (userid, username, password,email, dob, role)
                                      VALUES 
                                      (NULL, :username, :password, :email, :dob,
                                      :role)");

              $stmt->bindParam(':username',$username);
              $stmt->bindParam(':password',$password);
              $stmt->bindParam(':email',$email);
              $stmt->bindParam(':dob',$dob);
              $stmt->bindParam(':role',$role);

              $stmt->execute();

              if($stmt){
                  echo "<p>Statement Executed</p>";
              }
              else {
                  echo "<p>Something Wrong</p>";
              }

          }//end of submit check
          ?>
            <form name="form1" action="" method="POST">
              <input type="text" name="namebox" placeholder="enter name" >
              <input type="password" name="passwordbox" >
              <input type="email" name="emailbox" >
              <input type="date" name="datebox" >
              <input type="role" name="rolebox" >
              <input type="submit" name="submit">
            </form>
          </body>
          </html>
    <?php
    }//end of session check
    else {
      echo "<h1>Please Login</h1>"; 
    }
    ?>