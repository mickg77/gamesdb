<?php
  require('connect.php');
  require('header.php');
  session_start();
?>
  <h1>
    Display Records
  </h1>
  
  <?php
  if(isset($_SESSION['admin'])){

    $stmt=$conn->prepare("SELECT * FROM users");
    $stmt->execute();
    //start of list
    echo '<ul class="list-group list-group-flush">';
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo '<li class="list-group-item">';
      echo "<p>".$row['userid']." ".$row['username']." ".$row['role']."</p>";
      echo '</li>';
    }
     echo '</ul>';
        //end of list
  }//end of admin section
  else {
    echo ('<h2>Please Login</h2>');
  }
  
  require('footer.php');?>
