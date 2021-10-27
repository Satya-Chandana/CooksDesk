<?php   
session_start();
include 'db.php';
if(isset($_SESSION) && isset($_SESSION['user'])){
    $id=$_SESSION['user'];
    $sql = "SELECT recipe.id,name, email,password,username,title FROM recipe LEFT JOIN users on recipe.user_id=users.id where users.id='$id'";		 
    // print_r($sql);die;   
    $result = $conn->query($sql);
    // print_r($result->num_rows);die;
       if ($result->num_rows < 0) {
          echo "<script>
          alert('Invalid Username');
          </script>";   
      }
}else{
    header("Location: signin.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
  <style>
      
      table, th, td {
        border: 3px solid rgb(73, 73, 73);
        border-collapse: collapse;
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
                My Cook Book
            </div>
            <br>
            <br>
           
                <center>
                <div style="padding-left: 40px; padding-right: 40px;">
                  <table style="width:75% ; background-color: rgba(255, 225, 180, 0.685);">
                    <tr>
                      <th>Recipie Title</th>
                    </tr>
                    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
          $id=$row["id"];
       $url="recipe.php?id=$id";
        ?>
                    <tr>
                      <td><a href="<?php echo $url;?>"><p style="text-align: center; font-family:monospace; font-size: 140%; font-weight: bold;"><?php echo $row["title"];?></p></a></td>
                    </tr>
                    <?php
      }
    }
    ?> 
                  
                  </table>
                    </center>
          

           <br>
           <br>
  
      <form id="form" class="form" action="../Mainpg/intex.html" method="POST" onsubmit="return checkInputs()">
      <div class="button">
        <input type="submit" value="Go back to home">
    </div>
</form>
      
        </div>



        <script src="formjsbook.js"></script>
    </body>
</html>
<?php
 
 $conn->close();
?>