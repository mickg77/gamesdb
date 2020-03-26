<?php
      session_start();
      require('connect.php');
      require('header.php');

      if(isset($_SESSION['admin'])){
         
?>

  <?php  
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

  <div class="card" id="cardstyle">
    <div class="card-header">
      Insert a Record
    </div>
    <div class="card-body">
      
      <form name="form1" action="" method="POST">
        <div class="form-group">
          <label for="namebox">Username</label>
          <input type="text" name="namebox" placeholder="enter name" id="namebox">
        </div>
        <div class="form-group">
          <label for="passwordbox">Password</label>
          <input type="password" name="passwordbox" id="passwordbox">
          <span id="passwordfeedback"></span>
        </div>
        <div class="form-group">
           <label for="emailbox">Email</label>
          <input type="email" name="emailbox" id="emailbox">
        </div>
         <div class="form-group">
           <label for="datebox">DOB</label>
          <input type="date" name="datebox" id="datebox">
        </div>
        
        <div class="form-group">
          <label for="rolebox">Role</label>
          <select name="rolebox" id="rolebox">
            <option value="user">User</option>
            <option value="admin">admin</option>
          </select>
        </div>
        
        
        
          <button type="submit" name="submit">Insert</button>
      
      </form>
      </div>
    </div>
    <?php
    }//end of session check
    else {
      echo "<h1>Please Login</h1>"; 
    }
  require('footer.php');  
  ?>