<?php
session_start();  
include 'db.php';
if(isset($_SESSION) && isset($_SESSION['user'])){
    header("Location: MycookBook.php");            
} 
if(isset($_POST['submit'])){
    $email=$username=$pass='';
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
        $sql = "SELECT id, email,password,username FROM users where email='".$_POST['email']."' AND username='".$_POST['username']."' AND password='".$_POST['password']."'";		 
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                $email = $row["email"];
                $pass = $row["password"];
                $username = $row["username"];
                $id=$row["id"];
            }
         } 
         $conn->close();
        if($_POST['email']==$email && $_POST['password']== $pass && $_POST['username']== $username && $id){
            $_SESSION["user"] = $id;
            header("Location: index.php");  
                      
        }else{
            echo "<script>
            alert('Invalid User Data');
            </script>";   
        }
         
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="admin/css/form66.css">
    </head>

    <body>
        <div class="container">
            <div class="header">
                Login to your Account
            </div>
            <form id="form" class="form"  method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <!-- <div class="form-control">
                    <label for="username" class="det">Name</label>
                    <input type="text" placeholder="Riya" id="fullname" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div> -->
                
                <div class="form-control">
                    <label for="username" class="det">Username</label>
                    <input name="username" type="text" placeholder="florinpop17" id="username" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-control">
                    <label for="username" class="det">Email</label>
                    <input name="email" type="email" placeholder="a@florin-pop.com" id="email" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <!-- <div class="form-control">
                    <label for="username" class="det">Phone number</label>
                    <input type="tel" placeholder="01234-56789" id="num" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div> -->
                
                
                <div class="form-control">
                    <label for="username" class="det">Password</label>
                    <input name="password" type="password" placeholder="Password" id="password"/>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                
                <!-- <div class="form-control">
                    <label for="username" class="det">Password check</label>
                    <input type="password" placeholder="Password two" id="password2"/>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div> -->
                <!-- </div> -->

                <!-- <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <input type="radio" name="gender" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div> -->
                </div>
                
                <div class="button">
                    <input name="submit" type="submit" value="Login">
                </div>
            </form>
        </div>



        <script src="js/formjslogin.js"></script>
    </body>
</html>