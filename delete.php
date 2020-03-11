<?php
  require('connect.php');
  
  if(isset($_GET['userid'])){
    $id=$_GET['userid'];
    
    $stmt=$conn->prepare("DELETE FROM users WHERE userid=:userid");
    $stmt->bindParam(":userid",$id);
    $stmt->execute();
  }

?>

<!DOCTYPE html>
<head>
  <title>Something</title>
</head>
<body>
  <h1>
    Delete Records
  </h1>
<?php
  $stmt=$conn->prepare("SELECT * FROM users");
  $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<p>".$row['userid']." ".$row['username'].
      "<a href='delete.php?userid=".$row['userid']."'>Delete</a></p>";
  }
  
?>
</body>
</html>