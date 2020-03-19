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

    <?php require('header.php');
     
    if(isset($_SESSION['admin'])){
     
        $stmt=$conn->prepare("SELECT * FROM users");
        $stmt->execute();
        //start of list
        echo '<ul class="list-group list-group-flush">';
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          echo '<li class="list-group-item">';
          echo " ".$row['userid']." ".$row['username']."<a href='delete.php?userid=".$row['userid']."'>
            <button type='button' class='btn btn-danger' style='margin-left: 10px;'> Delete</button>
            </a>";
          echo '</li>';
        }
        echo '</ul>';
        //end of list
    }//end of session check
    else {
      echo('<h2>Please Log in</h2>');
    } 
   ?> 
    <?php require('footer.php');