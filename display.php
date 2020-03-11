<?php
  require('connect.php');
?>

<!DOCTYPE html>
<head>
  <title>Something</title>
</head>
<body>
  <?php require('nav.php'); 
  session_start();
  ?>
  <h1>
    Display Records
  </h1>
  
  <?php
  if(isset($_SESSION['admin'])){

    $stmt=$conn->prepare("SELECT * FROM users");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo "<p>".$row['userid']." ".$row['username']." ".$row['role']."</p>";
    }
  }//end of admin section
  else {
    echo ('<h2>Please Login</h2>');
  }
  
?>
</body>
</html>