<?php require('connect.php');
  require('header.php');
  
    session_start();
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
<?php 

    if(!isset($_SESSION['admin'])){
?>
<div class="card" id="cardstyle">
  <div class="card-header">
    Game Shop
  </div>
  <div class="card-body">
    <h5 class="card-title">Login Form</h5>
    <div class="card-text">
      <form name="login" action="" method="POST">
        <div class="form-group">
          <label for="namebox">Name</label>
          <input id="namebox" type="text" name="namebox" length="30">
        </div>
        <div class="form-group">
          <label for="passwordbox">Password</label>
          <input id="passwordbox" type="password" name="passwordbox" length="30">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">
      Submit Form
    </button>
      </form>

    </div>
  </div>
</div>
<!--end of card-->

<!--carousel goes in here-->

<div id="dogshow" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/dog.jpg" class="d-block w-100" alt="Dog">
    </div>
    <div class="carousel-item">
      <img src="images/car_dog.jpg" class="d-block w-100" alt="Dog in a car">
    </div>

  </div>
  <a class="carousel-control-prev" href="#dogshow" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#dogshow" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--end of carousel-->

<?php
    }
    else {
      
      
      
      echo ('<div class="alert alert-success" role="alert">
              You have already logged in!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
            </div>');
    }
  require('footer.php');?>