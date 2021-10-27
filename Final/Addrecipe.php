<?php          
session_start();         
include 'db.php';
if(isset($_SESSION) && isset($_SESSION['user'])){
    $user_id=$_SESSION['user'];


if(isset($_POST['submit']) &&  $user_id){
  $sql = "INSERT INTO recipe (title,ingredients, steps,user_id) VALUES ('".$_POST["title"]."','".$_POST["ingredient"]."','".$_POST["steps"]."',' $user_id')";
  // print_r($sql);die;
  $conn->query($sql);
//   session_destroy();
  header("Location: MycookBook.php");

}
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="css/form66addrec.css">
    </head>

    <body>
        <div class="container">
            <div class="header">
                Add Recipe
            </div>
            <form id="form" class="form"  method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                <div class="form-control">
                    <label for="username" class="det">Recipe title</label>
                    <input name="title" type="text" placeholder="" id="title" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                </div>
                <div class="form-control">
                    <label for="username" class="det" >List of Ingredients</label>
                    <textarea id="ingredients" name="ingredient" rows="10" cols="80" style=" background-color: #ffdbbd;"></textarea>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-control">
                    <label for="username" class="det">Preparation Steps</label>
                <textarea id="steps" name="steps" rows="15" cols="80" style=" background-color: #ffdbbd;"></textarea>
                
                <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
            </div>
                
                <div class="button">
                    <input name="submit" type="submit" value="Add recipe">
                </div>
            </form>
        </div>



        <script src="js/formaddrec.js"></script>
    </body>
</html>
<?php
}else{
    header("Location: signin.php");
} 
?>