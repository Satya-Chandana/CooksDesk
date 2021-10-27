<?php
session_start();
// $id="";
// if(isset($_SESSION) && isset($_SESSION['user'])){
//     $id=$_SESSION['user'];
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cooks Desk</title>

    
    <!--font style -->
    <link rel="stylesheet" href="css/all.css">


    <!--owl carousal -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!--AOS Library -->
    <link rel="stylesheet" href="./css/aos.css">

    <!--Custom style -->
    <link rel="stylesheet" href="css/Style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>

<body>
<!--style="font-family: 'Satisfy', cursive;">Scout the South-->
    <!--navigation-->
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray"><img style="width: 3.1cm; height: 1.5cm;" src="assets/logo5.png"></a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="#">Home</a>
                    </li>
                    <?php 
                    if(isset($_SESSION) && isset($_SESSION['user'])){
                        ?>
                        <li class="nav-link">
                        <a href="logout.php">Log Out</a>
                    </li>
                        <?php
                    }else{
                    ?>
                    <li class="nav-link">
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-link">
                        <a href="signin.php">Sign In</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <div class="social text-gray">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter-square"></i></a>
                <a href="#"><i class="fab fa-youtube-square"></i></a>
            </div>
        </div>

      

    </nav>

    <!--navigation-->

    <!--site title-->
    
    <main>
        <section class="site-title">
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
                <h3>Anyone can cook… A recipe has no soul!</h3>
                <h1>Cooks Desk</h1>
                <a href="#states"><button class="btn" >Explore</button></a>
            </div>
        </section>
    


    <!--site title-->

    <!--owl carousal -->

        <section>
            <div class="blog">
                <div class="container" id="#states">
                    <div class="owl-carousel owl-theme blog-post">
                        <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                            <img src="./assets/addre.png" alt="post-1" style="width: 364px;height: 220px;">
                            <div class="blog-title">
                                <h3>Add a Recipe</h3>
                                <button class="btn btn-blog" ><a href="Addrecipe.php">Add</a></button>
                                                        
                            </div>
                        </div>
                       
                        <div class="blog-content">
                            <img src="./assets/findarec.png" alt="post-1" style="width: 364px;height: 220px;">
                            <div class="blog-title">
                                <h3>Find a Recipe</h3>
                                <button class="btn btn-blog" ><a href="recipe.php">Find</a></button>
                                                        
                            </div>
                        </div>

                        
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/cookbook.png" alt="post-1" style="width: 364px;height: 220px;">
                            <div class="blog-title">
                                <h3>My Cook Book</h3>
                                <button class="btn btn-blog" ><a href="MycookBook.php">My Recipes</a></button>
                                                       
                            </div>
                        </div>
                        
                    <div class="owl-navigation" id="states">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <!--owl carousal -->

    <!--Custom javascript-->

    <script src="./js/jquery.3.4.1.min.js"></script>
     
    <!--AOS Library Js -->

    <script src="./js/aos.js"></script>


    <!--owl carousal -->

    <script src="./js/owl.carousel.min.js"></script>

    <!--Custom javascript-->
    <script src="./js/main.js"></script>
    
</body>

</html>