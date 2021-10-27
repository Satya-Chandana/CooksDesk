
<?php
session_start();            
include 'db.php';
$email=$name=$title=$username=$gender=$id="";
if($_GET && isset($_GET['id'])){
  $sql = "SELECT * FROM users where id=".$_GET['id'];		 
  $result = $conn->query($sql);
    
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
      $id=$_GET['id'];
        $email = $row["email"];
        $username = $row["username"];
        $name = $row["name"];
        $gender =$row["gender"];
        $title = $row["password"];
    }
  } 
}

if(isset($_POST['submit'])){
  $email = $_POST["email"];
  $username = $_POST["username"];
  $name = $_POST["name"];
  $gender =$_POST["gender"];
  $password = $_POST["password"];
  $update = 'UPDATE users set name = "'.$name.'",username="'.$username.'",email="'.$email.'",gender="'.$gender.'",password="'.$password.'" where id ='.$id;
  
  if ($conn->query($update)) {
    header("Location: updateUser.php?id=$id"); 
  } else {  
    echo "<script>
            alert('".$conn->error."');
            </script>"; 
  }
  
}
$users = "SELECT * FROM users";		 
$result = $conn->query($users);

if(isset($_SESSION) && $_SESSION['admin']){

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,300&display=swap');

            table, th, td {
        border: 3px solid rgb(73, 73, 73);
        border-collapse: collapse;
        text-align: center;font-family: 'Averia Serif Libre', cursive; 
        color: rgb(58, 0, 97);
         font-size: 100%; 
        }
        th, td {
            padding: 15px;
        }
            
            /* body{
                background:url('images/adduserbg.jpg');
                background-size: cover;
            } */

        </style>

        <link rel="stylesheet" href="css/fsgn.css">
        <link rel="stylesheet" href="css/sl.css">
        <link rel="stylesheet" href="css/form66AddUpDel.css">
    </head>

    <body>
   

      
  
        <div class="container">
            <div class="header">
            Update User Details
            </div>
            <form id="form" class="form" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <div class="form-control">
                    <label for="fullname" class="det">Name</label>
                    <input name="name" type="text" value="<?php echo $name; ?>" id="fullname" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-control">
                    <label for="username" class="det">Username</label>
                    <input name="username" type="text" value="<?php echo $username; ?>" id="username" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-control">
                    <label for="username" class="det">Email</label>
                    <input name="email" type="email" value="<?php echo $email; ?>" id="email" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="username" class="det">Gender</label>
                    <input name="gender" type="text" value="<?php echo $gender; ?>" id="gender" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="username" class="det">Password</label>
                    <input name="password" type="password" value="<?php echo $password; ?>" id="password" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                
                <div class="button">
                    <input name="submit" type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>



        <script src="js/formjsAddU.js"></script>
    
         <div style="padding-left: 40px; padding-right: 40px;">
            <table style="width:100% ; background-color: rgba(255, 225, 180, 0.685);">
                <tr>
                  
                  <th>Name</th>
                  <th>Username</th> 
                  <th>Email</th>
                  <th>Gender</th>
                  <!-- <th>Recipie Title</th> -->
                  <th></th>
                </tr>
          <?php
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
            $url="updateUser.php?id=".$row["id"];

          ?>
                <tr>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["username"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["gender"]; ?></td>
                  <td>
                    <div class="button">
                    <a href="<?php echo $url; ?>" name="update"  value="Update">Update</a>
                </div>
              </td>
                </tr>
            <?php
            }
          }
          ?>  

              </table>
              <br>
  
  <div class="button1">
 <a href="index.php"><input type="submit" value="Home"></a>
</div>
<br>
<br>
    </div>
    </body>
</html>
<?php
}
$conn->close();
?>
<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');
 

            table, th, td {
        border: 3px solid rgb(73, 73, 73);
        border-collapse: collapse;
        }
        th, td {
            padding: 15px;
        }
            
            body{
                background:url('images/background.png');
                background-size: cover;
            }

        </style>

        <link rel="stylesheet" href="css/fsgn.css">
        <link rel="stylesheet" href="css/sl.css">
        <link rel="stylesheet" href="css/form66AddUpDel.css">
    </head>

    <body>
   

      
  
        <div class="container">
            <div class="header">
                Update User Details
            </div>
            <form id="form" class="form" action="adminloginOpt.html" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">

                    <div class="form-control">
                        <label for="username" class="det">Old Username</label>
                        <input type="text" placeholder="Riya" id="OldUsername" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>

                <div class="form-control">
                    <label for="username" class="det">New Name</label>
                    <input type="text" placeholder="Riya" id="fullname" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-control">
                    <label for="username" class="det">New Username</label>
                    <input type="text" placeholder="florinpop17" id="username" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-control">
                    <label for="username" class="det">New Email</label>
                    <input type="email" placeholder="a@florin-pop.com" id="email" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="username" class="det">New Gender</label>
                    <input type="email" placeholder="a@florin-pop.com" id="gender" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="username" class="det">New Recipe Title</label>
                    <input type="email" placeholder="a@florin-pop.com" id="Recipe Title" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                
                <div class="button">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>



        <script src="formjsUpdateU.js"></script>
    
         <div style="padding-left: 40px; padding-right: 40px;">
            <table style="width:100% ; background-color: rgba(255, 225, 180, 0.685);">
                <tr>
                  
                  <th>Name</th>
                  <th>Username</th> 
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Recipie Title</th>
                </tr>

                <tr>
                  <td>Riya</td>
                  <td>riya02</td>
                  <td>riya16@gmail.com</td>
                  <td>Female</td>
                  <td>Chocolate Cupcakes</td>
                </tr>
                
                <tr>
                    <td>Ram</td>
                    <td>ram54</td>
                    <td>ram235@gmail.com</td>
                    <td>Male</td>
                    <td>Cheese pizza</td>
                  </tr>
                
                  <tr>
                    <td>Sam</td>
                    <td>sams36</td>
                    <td>sam36@gmail.com</td>
                    <td>Female</td>
                    <td>Chicken Sandwich</td>
                  </tr>
                
                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                  </tr>

                  

              </table>
    </div>
    </body>
</html> -->