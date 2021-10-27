<?php
session_start();            
include 'db.php';

if(isset($_POST['submit'])){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $sql = "SELECT id FROM users where name='$username'";	
        $result = $conn->query($sql);
           
         if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                    $id=$row["id"];
                    $sql = "Delete FROM users where name='$username'";	
                    $conn->query($sql);

                    $sql = "Delete FROM recipe where user_id='$id'";	
                    $conn->query($sql);
        
        
                }
                
                       
            header("Location: adminlogin.php");
            
         }else{
            echo "<script>
            alert('There is no user with this name.');
            </script>"; 
         }
         $conn->close();
        
    }
}
if(isset($_SESSION) && $_SESSION['admin']){

?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="css/form66AddUpDel.css">
    </head>

    <body>
        <div class="container">
            <div class="header">
               Delete User 
            </div>
            <form id="form" class="form" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <div class="form-control">
                    <label for="username" class="delete">Enter Username to delete</label>
                    <input type="text" name="username" placeholder="Riya" id="username" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                                
                <div class="button">
                    <input name="submit" type="submit" value="Delete User">
                </div>
            </form>
            <br>
  
  <div class="button1">
 <a href="index.php"><input type="submit" value="Home"></a>
</div>
<br>
<br>
        </div>



        <script src="js/formjsdeleteU.js"></script>
    </body>
</html>
<?php }?>