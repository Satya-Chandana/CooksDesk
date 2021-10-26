
<?php
session_start();            
include 'db.php';

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
        if($_POST['email']!=$email && $_POST['pass']!= $pass){
            header("Location: adminlogin.php");
            
        }else{
            $_SESSION["admin"] = true;
        }
    }
}
if(isset($_SESSION) && $_SESSION['admin']){

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

            
            body{
                background:url('images/adminbg.jpg');
                background-size: cover;
                background-color: blanchedalmond;
              
            }
        </style>
        <link rel="stylesheet" href="css/fsgn.css">
        <link rel="stylesheet" href="css/sladmin.css">
    </head>

    <body>
        <br><br><br><br><br><br>
        <h1 style="font-family: 'Pacifico', cursive; font-size: 55px; color: rgb(255, 255, 255); text-align: center;">Admin Portal 👨‍🍳</h1>
        <!-- <div style="position: relative;">
            <img src="adminbg.jpg" alt="simp" style="padding: 20px 195px; border-radius: 25%; width: 30cm; height: 15cm;"> -->
            
            <div style="position: absolute;top: 280px;left: 600px;">
                
                    <a href="adduser.php"><button class="btn btn1" style="width: 140%;">Add User Details</button></a>
                    <br>
                    <br>
                    <a href="updateUser.php"><button class="btn btn1" style="width: 140%;">Update User Details</button></a>
                    <br>
                    <br>
                    <a href="deleteUser.php"><button class="btn btn1" style="width: 140%;">Delete User Details</button></a>
                    <br>
                    <br>
                    <a href="logout.php"><button class="btn btn1" style="width: 140%;">Log Out</button></a>
        
 
            </div>
            
        <!-- </div> -->
        
    </body>
</html>
<?php
} 
?>