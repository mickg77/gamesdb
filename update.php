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
    <h1>
      Update Records
    </h1>
  <?php
   require('nav.php');
   if(isset($_GET['userid'])){//runs if get method has been used with userid
    $id=$_GET['userid'];
    $stmt=$conn->prepare("SELECT * FROM users WHERE userid=:userid");
    $stmt->bindParam(":userid",$id);
    $stmt->execute();
    
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      
      echo '
      
      <form name="update" action="update.php" method="POST">
        <input name="userid" type="hidden" value="'.$row["userid"].'">
        <input name="usernamebox" value="'.$row["username"].'">
        <input type="submit" name="update">
      
      ';
     
    } 
  }//end of get method code
 
  else if(isset($_POST['update'])){
    $userid     = $_POST['userid'];
    $username   = $_POST['usernamebox']; 
    
    $stmt=$conn->prepare("UPDATE users
                          SET username=:username
                          WHERE userid=:userid");
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":userid",$userid);
    $stmt->execute();
    
    
  }
   
    $stmt=$conn->prepare("SELECT * FROM users");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo "<p>".$row['userid']." ".$row['username'].
        "<a href='update.php?userid=".$row['userid']."'>Update</a></p>";
    }

  
  }
  else {
      echo ('<h2>Please Login</h2>');
    }
  ?>
</body>
</html>