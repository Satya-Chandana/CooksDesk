<?php 
session_start();
include 'db.php';
$sql = "SELECT * FROM recipe";
if(isset($_SESSION) && isset($_SESSION['user'])){
    $id = $_SESSION['user'];
    $sql = "SELECT * FROM recipe WHERE user_id='$id'";
}
		 
$result = $conn->query($sql);
if(isset($_POST['submit'])){
  if(isset($_POST['title'])){
    if(isset($_SESSION) && isset($_SESSION['user'])){
        $id = $_SESSION['user'];
        $sql = "SELECT * FROM recipe where title Like '%".$_POST['title']."%' AND user_id=$id";	
    }else{
        $sql = "SELECT * FROM recipe where title Like '%".$_POST['title']."%'";	
    }
       $result = $conn->query($sql);
       if ($result->num_rows < 0) {
          echo "<script>
          alert('Invalid Title name');
          </script>";   
      }
       
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@1,300&display=swap');
      table, th, td {
        border: 3px solid rgb(73, 73, 73);
        border-collapse: collapse;
        font-family: 'Averia Serif Libre', cursive;
        }
        th, td {
            padding: 15px;
        }
  </style>
        <link rel="stylesheet" href="css/form66book.css">
        <link rel="stylesheet" href="../signin/fsgn.css">
        <link rel="stylesheet" href="../signin/sl.css">
    </head>

    <body>
        <div class="container">
            <div class="header">
                Explore Recipe
            </div>
            <form id="form" class="form" method="POST" onsubmit="return checkInputs()">
                
                
                <div class="form-control">
                    <label for="username" class="det">Enter Recipe Title</label>
                    <input name="title" type="text" placeholder="florinpop17" id="title" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
          
                
                <div class="button">
                    <input name="submit" type="submit" value="Enter!">
                </div>
                
                <div style="padding-left: 40px; padding-right: 40px;">
                    <table style="width:100% ; background-color: rgba(255, 225, 180, 0.685);">
                        <tr>
                          <th>Recipie Title</th>
                          <th>Ingredients</th>
                          <th>Steps</th> 
                        </tr>
                        <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                            // print_r($row);
                            ?>
                        <tr>
                          <td><?php echo $row["title"];?></td>
                          <td><?php echo nl2br($row["ingredients"]);?>
                          </td>
                          <td><?php echo nl2br($row["steps"]);?>
                        </td>
                        </tr>
                            <?php
                            }
                        }
                        ?>   
                        
                  
        
                      </table>
            </div>
                
            </form>
            <br>
  
  <div class="button1">
 <a href="index.php"><input type="submit" value="Home"></a>
</div>
<br>
<br>
        </div>



        <script src="js/formjsrecipe.js"></script>
    </body>
</html>