<?php
include 'db.php';
if(isset($_POST['submit'])){

    $sqlUser = "SELECT id FROM users where email='".$_POST["email"]."' and username='".$_POST["username"]."'";		 
    $resultUser = $conn->query($sqlUser);
    
    if ($resultUser->num_rows > 0) {
        echo "<script>
            alert('The Username, Email already Exist');
            </script>";
    }else{    
        $sql = "INSERT INTO users (name,username, email,gender,password) VALUES ('".$_POST["name"]."','".$_POST["username"]."','".$_POST["email"]."','".$_POST["gender"]."','".$_POST["password"]."')";
        // print_r($sql);die;
        $conn->query($sql);

        header("Location: signin.php"); 
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
                Create Account
            </div>
            <form id="form" class="form" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <div class="form-control">
                    <label for="username" class="det">Name</label>
                    <input name="name" type="text" placeholder="Riya" id="fullname" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
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
                

                
                
                <div class="form-control">
                    <label for="username" class="det">Password</label>
                    <input name="password" type="password" placeholder="Password" id="password"/>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                
                
                </div>

                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="Male">
                    <input type="radio" name="gender" id="dot-2" value="Female">
                    <input type="radio" name="gender" id="dot-3" value="Prefer not to say" checked>
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
                    </div>
                </div>
                
                <div class="button">
                    <input name="submit" type="submit" value="Sign Up">
                </div>
            </form>
        </div>



        <script src="admin/js/formjs.js"></script>
    </body>
</html>