<?php
session_start();            
include 'db.php';

if(isset($_POST['submit'])){
  $sql = "INSERT INTO users (name,username, email,gender,password) VALUES ('".$_POST["name"]."','".$_POST["username"]."','".$_POST["email"]."','".$_POST["gender"]."','".$_POST["password"]."')";
  // print_r($sql);die;
  $conn->query($sql);
}
$users = "SELECT * FROM users";		 
$result = $conn->query($users);

if(isset($_SESSION) && $_SESSION['admin']){

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add User</title>
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
                Add User Details
            </div>
            <form id="form" class="form" id="adduser" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <div class="form-control">
                    <label for="fullname" class="det">Name</label>
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
                    <label for="username" class="det">Gender</label>
                    <input name="gender" type="text" placeholder="female" id="gender" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="username" class="det">Password</label>
                    <input name="password" type="password" placeholder="Password" id="title" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                
                <div class="button">
                    <input name="submit" type="submit" value="Add">
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
                </tr>
          <?php
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
            

          ?>
                <tr>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["username"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["gender"]; ?></td>
                </tr>
            <?php
            }
          }
          ?>    
                <!-- <tr>
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
                  </tr> -->

                  

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