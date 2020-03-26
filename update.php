<?php
 session_start();
 require('header.php');
 if(isset($_SESSION['admin'])){
  require('connect.php');
 
  
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
   
    echo '<ul class="list-group list-group-flush">';
   
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo '<li class="list-group-item">';
      echo "<p>".$row['userid']." ".$row['username'].
        "<a class='btn btn-primary' href='update.php?userid=".$row['userid']."'>Update</a>
        
        </p>";
      echo '</li>';
    }
   
    echo '</ul>';

  
  }
  else {
      echo ('<h2>Please Login</h2>');
    }
  
  require('footer.php');
?>
