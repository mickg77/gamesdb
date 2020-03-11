<?php
  require('connect.php');
?>

<!DOCTYPE html>
<head>
  <title>Something</title>
</head>
<body>
  <h1>
    Display Records
  </h1>
<?php
  $stmt=$conn->prepare("SELECT * FROM users");
  $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<p>".$row['userid']." ".$row['username']." ".$row['role']."</p>";
  }
  
?>
</body>
</html>