    <?php
    session_start();
    if(isset($_SESSION['admin'])){
      require('connect.php');

      if(isset($_GET['userid'])){
        $id=$_GET['userid'];

        $stmt=$conn->prepare("DELETE FROM users WHERE userid=:userid");
        $stmt->bindParam(":userid",$id);
        $stmt->execute();
      }
    }//end of session check
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
    if(isset($_SESSION['admin'])){
      require('nav.php'); ?>
      <?php
        $stmt=$conn->prepare("SELECT * FROM users");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<p>".$row['userid']." ".$row['username'].
            "<a href='delete.php?userid=".$row['userid']."'>Delete</a></p>";
        }
      
    }//end of session check
    else {
      echo('<h2>Please Log in</h2>');
    } 
   ?> 
</body>
</html>