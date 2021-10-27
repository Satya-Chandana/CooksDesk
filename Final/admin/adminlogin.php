<?php
session_start();         
include 'db.php';
if(isset($_SESSION) && isset($_SESSION['admin'])){
    header("Location: adminloginOpt.php");            
} 
if(isset($_POST['submit'])){
    if(isset($_POST['email']) && isset($_POST['pass'])){
        $sql = "SELECT email,password FROM admin";		 
         $result = $conn->query($sql);
           
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                $email = $row["email"];
                $pass = $row["password"];
            }
         } 
         $conn->close();
        if($_POST['email']==$email && $_POST['pass']== $pass){
            $_SESSION["admin"] = true;
            header("Location: adminloginOpt.php");  
                      
        }else{
            echo "<script>
            alert('Invalid Data');
            </script>";   
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="css/form66.css">
    </head>

    <body>
        <div class="container">
            <div class="header">
               Admin Account
            </div>
            <form id="form" class="form" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <div class="form-control">
                    <label for="email" class="det">Email</label>
                    <input type="email" name="email" placeholder="a@florin-pop.com" id="email" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="form-control">
                    <label for="password" class="det">Password</label>
                    <input name="pass" type="password" placeholder="Password" id="password"/>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                </div>
                
                <div class="button">
                    <input name="submit" type="submit" value="Login">
                </div>
            </form>
        </div>
        <script src="js/formjslogin.js"></script>
    </body>
</html>
