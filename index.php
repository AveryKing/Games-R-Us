<?php 
include('config.php');
if(isset($_COOKIE['username'])) {
$user_name = $_COOKIE['username'];

}
if(isset($_COOKIE['userId'])) {
  $user_id = $_COOKIE['userId'];

  $sql = "SELECT credits FROM users WHERE user_id = $user_id";
  $result = $db->query($sql);
  $assoc = $result->fetch_assoc();
  $credits = $assoc['credits'];
}



?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles.css" /><title>Games-R-Us</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Turret+Road:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"
            defer
        ></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"
            defer
        ></script>
        <script src="scripts.js" defer></script>
    </head>


    <body>


            <img id="logo" src="images/gamesrus.png" alt="Company logo" />


            <ul id="nav" class="nav justify-content-center" >
                <li class="nav-item desktop" id='homeButton'>

                 <a  href="#top"  class="btn btn-outline-primary" >Home

             </a>
                </li>

                <li class="nav-item desktop" id='productsButton'>

                           <div class="btn-group" id='productsMenu'>
                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                      Store
                    </button>
                    <div class="dropdown-menu" id='productsMenu'>
                      <a class="dropdown-item" href="#" id='nintendoButton'>Nintendo</a>
                      <a class="dropdown-item" href="#" id='playStationButton'>PlayStation</a>
                      <a class="dropdown-item" href="#" id='xboxButton'>Xbox</a>
                
                    </div>
                  </div>

                </li>
                <li class="nav-item desktop" id='aboutUsButton'>
                  <a  class="btn btn-outline-primary" href="#">About Us</a>
                </li>
                <li class="nav-item desktop" id='contactUsButton'>
                  <a  class="btn btn-outline-primary" href="#">Contact</a>
                </li>

<p id="refreshGames" value="0"></p>

         <div class="btn-group" id='mobileMenu'>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    View Menu
  </button>
  <div class="dropdown-menu" id='menuDropdown'>
    <a class="dropdown-item" href="#" id='mobileHome'>Home</a>
    <a class="dropdown-item" href="#" id='mobileNintendo'>Nintendo Games</a>
    <a class="dropdown-item" href="#" id='mobilePlayStation'>PlayStation Games</a>
    <a class="dropdown-item" href="#" id='mobileXbox'>Xbox Games</a>
    <a class="dropdown-item" href="#" id='mobileAbout'>About Us</a>
    <a class="dropdown-item" href="#" id='mobileContact'>Contact Us</a>
    <a class="dropdown-item" href="#" id='mobileYourGames'>Your Games</a>
    <a class="dropdown-item" href="#" id='mobileLogout'>Logout</a>
    <a class="dropdown-item" href="#" id='mobileLogin'>Login</a>
    <a class="dropdown-item" href="#" id='mobileSignUp'>Sign Up</a>
  </div>
</div>

<span id="loginSignUp">
    <li class="nav-item desktop"><a id="signUpButton" class="btn btn-outline-success" href="#" role="button">Sign Up</a> </li>
  <li class="nav-item desktop"> <a id="loginButton" class="btn btn-outline-success" href="#" role="button">Log In</a></li>
</span>


<span id="membersButton">
    <li class="nav-item desktop"><a  class="btn btn-outline-primary" href="#" role="button">Your Games</a></li>
 </span>
  <span id="logoutButton">
    <li class="nav-item desktop"><a  class="btn btn-outline-danger" href="#" role="button">Log Out</a></li>
    
 </span>

              </ul>
<div id="homeTab">
         <div id='mainJumbotron' class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Welcome to Games-R-Us</h1>

            <p class="lead">The Future Of Gaming</p>

         
            <p class="lead">

            </p>
         </div>

         <div class="container-fluid" id="mostpop">
             <div id='featured'></div>
         <h2 id="#mostop">Featured Products</h2>
         <hr class="my-4">
        </div>
         <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-default">
                            <h5 class="card-header" id='featured1'>
                                    Product 1
                                </h5>

                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="imgContainer" id='featured1Image'>
                                            <img class="img-fluid" src="images/3.jpg">

                                        </div>
                                       
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button id='featured1Button' type="button" value="1" class="btn btn-primary moreinfo" >More Info</button>

                                </div>
                            </div>
                            <div class="card" >
                                <h5 class="card-header" id='featured2'>
                                    Product2
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="imgContainer" id='featured2Image'>
                                            <img class="img-fluid" src="images/16.jpg">
                                        </div>
                                       
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button id='featured2Button' type="button" value="2" class="btn btn-primary moreinfo" >More Info</button>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header" id='featured3'>
                                    Product 3
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="imgContainer" id='featured3Image'>
                                            <img  class="img-fluid" src="images/noimage.png">
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button id='featured3Button' type="button" value="6" class="btn btn-primary moreinfo">More Info</button>

                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-header" id='featured4'>
                                    Product 4
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="imgContainer" id='featured4Image'>
                                            <img  class="img-fluid" src="images/noimage.png">
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button id='featured4Button' type="button" value="4" class="btn btn-primary moreinfo">More Info</button>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header" id='featured5'>
                                    Product 5
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="imgContainer" id='featured5Image'>
                                            <img  class="img-fluid" src="images/noimage.png">
                                        </div>
                                        
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button id='featured5Button' type="button" value="5" class="btn btn-primary moreinfo">More Info</button>

                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-header" id='featured6'>
                                    Product 6
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="imgContainer" id='featured6Image'>
                                        <img  class="img-fluid" src="images/noimage.png">
                                    </div>
                                       
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button id='featured6Button' type="button" value="3" class="btn btn-primary moreinfo" >More Info</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

<!-- View All Products-->
<div id='allProducts'>
    <h1 class='my-4'>All Products</h1>

</div>
<!-- XBOX Page-->
<div id='xboxTab'>

    <div class="container-fluid" id="mostpop">
        <div id='xboxImage' >
        <img src='images/xboxlogo.png'></img>
    </div>
        <hr class="my-4">
       </div>
        <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="card bg-default">
                           <h5 class="card-header">
                                   Sunset Overdrive
                               </h5>

                               <div class="card-body">
                                   <p class="card-text">
                                   <div class="imgContainer">
                                           <img src="images/15.jpg">

                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 1" type="button" value="13" class="btn btn-primary moreinfo" >More Info</button>

                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">
                                   Sea of Thieves
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/16.jpg">
                                       </div>
                                      
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 2" type="button" value="14" class="btn btn-primary moreinfo" >More Info</button>

                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="card">
                               <h5 class="card-header">
                                   Gears 5
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/17.jpg">
                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 3" type="button" value="15" class="btn btn-primary moreinfo">More Info</button>

                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">
                                   Halo Wars 2
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/18.jpg">
                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 4" type="button" value="16" class="btn btn-primary moreinfo">More Info</button>

                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="card">
                               <h5 class="card-header">
                                   Forza Motorsport 7
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/19.jpg">
                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 5" type="button" value="17" class="btn btn-primary moreinfo">More Info</button>

                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">
                                   Quantum Break
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                       <img src="images/20.jpg">
                                   </div>
                                      
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 6" type="button" value="18" class="btn btn-primary moreinfo" >More Info</button>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


</div>
<!-- PlayStation Page-->

<div id='playStationTab'>

    <div class="container-fluid" id="mostpop">
        <div id='playStationImage'>
        <img src='images/playstation.png'></img>
    </div>
        <hr class="my-4">
       </div>
        <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="card bg-default">
                           <h5 class="card-header">
                                   God of War
                               </h5>

                               <div class="card-body">
                                   <p class="card-text">
                                   <div class="imgContainer">
                                           <img src="images/9.jpg">

                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 1" type="button" value="7" class="btn btn-primary moreinfo" >More Info</button>

                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">
                                   Devil May Cry 3
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/10.jpg">
                                       </div>
                                      
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 2" type="button" value="8" class="btn btn-primary moreinfo" >More Info</button>

                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="card">
                               <h5 class="card-header">
                                   Call of Duty: Modern Warfare 2
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/11.jpg">
                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 3" type="button" value="9" class="btn btn-primary moreinfo">More Info</button>

                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">
                                   Dante's Inferno
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/12.jpg">
                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 4" type="button" value="10" class="btn btn-primary moreinfo">More Info</button>

                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="card">
                               <h5 class="card-header">
                                 Borderlands
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                           <img src="images/13.jpg">
                                       </div>
                                       
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 5" type="button" value="11" class="btn btn-primary moreinfo">More Info</button>

                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">
                                   Rocket League
                               </h5>
                               <div class="card-body">
                                   <p class="card-text">
                                       <div class="imgContainer">
                                       <img src="images/14.jpg">
                                   </div>
                                      
                                   </p>
                               </div>
                               <div class="card-footer">
                                   <button data-itemName="Item 6" type="button" value="12" class="btn btn-primary moreinfo" >More Info</button>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
</div>




<!---Nintendo page-->

<div id='nintendoTab'>
<div class="container-fluid" id="mostpop">
    <div id='nintendoImage'>
    <img class='img-fluid' src='images/nintendologo.png' id='nintendologo'></img>
    </div>

    <hr class="my-4">
   </div>
    <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-4">
                       <div class="card bg-default">
                       <h5 class="card-header">
                               The Legend of Zelda: Breath of the Wild
                           </h5>

                           <div class="card-body">
                               <p class="card-text">
                               <div class="imgContainer">
                                       <img src="images/2.jpg">

                                   </div>
                                   
                               </p>
                           </div>
                           <div class="card-footer">
                               <button data-itemName="Item 1" type="button" value="1" class="btn btn-primary moreinfo" >More Info</button>

                           </div>
                       </div>
                       <div class="card">
                           <h5 class="card-header">
                               Mario Kart 8 Deluxe
                           </h5>
                           <div class="card-body">
                               <p class="card-text">
                                   <div class="imgContainer">
                                       <img src="images/3.jpg">
                                   </div>
                                  
                               </p>
                           </div>
                           <div class="card-footer">
                               <button data-itemName="Item 2" type="button" value="2" class="btn btn-primary moreinfo" >More Info</button>

                           </div>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="card">
                           <h5 class="card-header">
                               Fortnite
                           </h5>
                           <div class="card-body">
                               <p class="card-text">
                                   <div class="imgContainer">
                                       <img src="images/4.jpg">
                                   </div>
                                   
                               </p>
                           </div>
                           <div class="card-footer">
                               <button data-itemName="Item 3" type="button" value="3" class="btn btn-primary moreinfo">More Info</button>

                           </div>
                       </div>
                       <div class="card">
                           <h5 class="card-header">
                               Carnival Games
                           </h5>
                           <div class="card-body">
                               <p class="card-text">
                                   <div class="imgContainer">
                                       <img src="images/6.jpg">
                                   </div>
                                   
                               </p>
                           </div>
                           <div class="card-footer">
                               <button data-itemName="Item 4" type="button" value="4" class="btn btn-primary moreinfo">More Info</button>

                           </div>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="card">
                           <h5 class="card-header">
                               Lego DC Super-Villains
                           </h5>
                           <div class="card-body">
                               <p class="card-text">
                                   <div class="imgContainer">
                                       <img src="images/7.jpg">
                                   </div>
                                   
                               </p>
                           </div>
                           <div class="card-footer">
                               <button data-itemName="Item 5" type="button" value="5" class="btn btn-primary moreinfo">More Info</button>

                           </div>
                       </div>
                       <div class="card">
                           <h5 class="card-header">
                               Animal Crossing
                           </h5>
                           <div class="card-body">
                               <p class="card-text">
                                   <div class="imgContainer">
                                   <img src="images/8.jpg">
                               </div>
                                  
                               </p>
                           </div>
                           <div class="card-footer">
                               <button data-itemName="Item 6" type="button" value="6" class="btn btn-primary moreinfo" >More Info</button>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   </div>
<!--More Info Modal-->

       <div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" >
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 id="mtitle" class="modal-title" >

               </h5>
                 <button type="button" class="close" data-dismiss="modal" >

                 </button>
               </div>
               <div id="modal-pic" class="modal-pic">

                 </div>

               <div id="mbody" class="modal-body">
              
                <div id='msystem'></div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button id="buyNowButton" type="button" class="btn btn-primary">Buy Now</button>
               </div>
             </div>
           </div>


</div>

<!--About Us page-->
<div id='aboutUsTab'>


    <div id='mainJumbotron' class="jumbotron jumbotron-fluid">
        <h1 class="display-4">About Us</h1>
        <p class="lead">
        </p>
      </div>
   
    <div class='container-fluid'>
        <h1>Who are we?</h1>
        <p>
            We are Games-R-Us. We sell video games from Nintendo, PlayStation, and Xbox. Founded in 2021 and headquarted in Kalamazoo, Michigan, Games-R-Us brings you the most popular games for the best prices. Day-by-day, Games-R-Us is revolutionizing the way that people game. Don't miss out, and place an order today!
        </p>
        <h2>We're different from the rest.</h2>
        <p>
          We pride ourselves in being the best video game seller on the market. Our prices are the lowest anywhere! If you find a better deal elsewhere, we will match it. Here at Games-R-Us we believe that everyone should have access to high quality video games at an affordable price. Don't see a game that you're looking for? <a id='contactInAbout'>Click here to contact us to see if we can place a special order for you!</a>
         
        </p>



    </div>

</div>

<!--Member's Area-->
<div id='membersArea'>


    <div id='mainJumbotron' class="jumbotron jumbotron-fluid">
        <h1 class="display-4" id='yourLibrary'><?php echo($user_name."'s Library"); ?></h1>
        <p class="lead">
        </p>
      </div>
   
    <div class='container-fluid'>
    <div id='creditDiv' style='margin-top:30px; float:right;'>
    <h2 id='credits'>Credits: <?php echo($credits); ?></h2><br>
    <button id='addCreds'  type="button" class="btn btn-success" value=''>Add Credits</button>
    </div>
      <br>  <h1 style='text-align: left;'>Your Games</h1>
      
        <p id="gamesList">
        <?php
        if(isset($_COOKIE['userId'])) {
          $query = "SELECT library FROM users WHERE user_id = $user_id";
          $libraryResult = $db->query("SELECT library FROM users WHERE user_id = $user_id");
        
        $libres = $libraryResult->fetch_assoc();
        if($libres['library']=="none") {
         echo("You have not yet purchased any games.");
        }
        else {
          function returnName($itemId) {
            include('config.php');
            switch($_COOKIE['loggedIn']) {
              case 1:
                $sql = "SELECT * FROM items WHERE item_id = $itemId";
                $result = $db->query($sql);
                $assoc = $result->fetch_assoc();
            
                return $assoc['name'];
                break;
              case 2:
                $sql = "SELECT * FROM items WHERE item_id = 5";
                $result = $db->query($sql);
                $assoc = $result->fetch_assoc();
            
                return $assoc['name'];
                break;    
            }
            
         
         }
          $variable = $libres['library'];
          $var=explode(',',$variable);
          foreach($var as $row)
           {
           echo("<a class='openGame' href='#' data-name='".returnName($row)."' data-value='".$row."'>".returnName($row)."<br></a>");
        //   echo(file_get_contents('https://defunctive-coxswain.000webhostapp.com/purchaseGame.php?cmd=getName&itemId='.$row."<br>"));
           }
         // echo($libres['library']);
        }
      }
      ?>
      </p>





    </div>

</div>

<!--Contact Page-->
<div id='contactTab'>
    <div class="form-body">


        <div class="form-box">
          <h1>Contact Us</h1>
        
          <form method="get" action="#" id="sampleForm">
        
          <hr>
          <label id="icon" for="name"><i class="fa fa-user fa-fw"></i></label>
          <input type="text" name="name" id="name" placeholder="Name" />
          <label id="icon" for="email"><i class="fa fa-phone fa-fw"></i></label>
          <input type="text" name="phone" id="phone" placeholder="Phone" />
          <label id="icon" for="email"><i class="fa fa-envelope fa-fw"></i></label>
          <input type="text" name="email" id="email" placeholder="Email" />
          <label id="icon" for="email"><i class="fa fa-envelope fa-fw"></i></label>
          <input type="text" name="Description" id="email" placeholder="Reason for contacting us" />
        
        
        
           <button type="submit" ><i class="fa fa-reply fa-fw"></i> Submit </button>
        
          </form>
        </div>
        
        <div id="errors" class="visible">
        </div>
        
        </div>
</div>
<hr class="my-4">
<div id="footer">
    <p class="footext" > 	&copy; Copyright 2021</p>
</div>

<!----Are You Sure? popup-->

<div class="modal fade" id="buyNowModal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 id="mtitle" class="modal-title" >
                  Confirm Purchase

                </h5>
                  <button type="button" class="close" data-dismiss="modal" >

                  </button>
                </div>
                <div id="modal-pic" class="modal-pic">

                  </div>
                <div id="mbody" class="modal-body">
                  <p id="areYouSure"> Are you sure you want to buy {item} for {price} ? </p>
                </div>
                <div class="modal-footer">
                  <button id="yesSureClose" type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  <button id='yesSure' type="button" class="btn btn-success" value=''>Yes</button>
                </div>
              </div>
            </div>
          </div>

          <!---- Plz Login -----> 

          
          <div class="modal fade" id="pleaseLogin" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 id="mtitle" class="modal-title" >
                  Error

                </h5>
                  <button type="button" class="close" data-dismiss="modal" >

                  </button>
                </div>
                <div id="modal-pic" class="modal-pic">

                  </div>
                <div id="mbody" class="modal-body">
                  <p id="mustbeloggedin"> You must be logged in to purchase a game. <br>Please sign in or create a new account. </p>
                </div>
                <div class="modal-footer">
                <button id='loginExisting' type="button" class="btn btn-success">Log In</button>
                  <button id='createNewAcct' type="button" class="btn btn-success">Sign Up</button>
                </div>
              </div>
            </div>
          </div>

<!--- Buy Game Response --->
                
        <div class="modal fade" id="afterBuy" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 id="afterTitle" class="modal-title" >
                  Title

                </h5>
                  <button type="button" class="close" data-dismiss="modal" >

                  </button>
                </div>
                <div id="modal-pic" class="modal-pic">

                  </div>
                <div id="mbody" class="modal-body">
                  <p id="afterMessage"> </p>
                </div>
                <div class="modal-footer">
                <button id='afterClose' type="button" class="btn btn-primary">Close</button>
                 
                </div>
              </div>
            </div>
          </div>

     


          <!--- download modal --->

          <div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 id="downloadTitle" class="modal-title" >
                  Title

                </h5>
                  <button type="button" class="close" data-dismiss="modal" >

                  </button>
                </div>
                <div id="modal-pic" class="modal-pic">

                  </div>
                <div id="mbody" class="modal-body">
                  <p id="downloadText"> </p><br>
                  <p id="downloadStatus"></p>
                  <button id='downloadButton' data-id='' type="button" class="btn btn-info">Download</button>
                </div>
                <div class="modal-footer">
                <button id='downloadClose' type="button" class="btn btn-primary">Close</button>
                 
                </div>
              </div>
            </div>
          </div>

          <!---credits modal---->

          <div class="modal fade " id="creditsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Modify Credit Balance
                    
                  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="modal-pic" class="modal-pic">
                    
                    </div>
                  <div class="modal-body">
                  Enter new credits balance below:<br>
                  <form action='purchaseGame.php?cmd=modifyCredits' method='post' id='modifyCredForm' value=''>
                  
        <div class="form-group row">
         
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-money"></i>
                </div>
              </div> 
             
              <input id="creditsBalance" value="<?php echo($credits); ?>"name="credits" type="text" class="form-control" required="required">
              <input type="hidden" name="u" value="<?php echo($user_id);?>">
  
            </div>
          </div>
        </div>
        
        <div class="form-group row">
          <div class="offset-4 col-8">
            <p id="finalizeResponse"> </p>
            <button name="submit"  type="submit" class="btn btn-success">Update Balance</button>
          </div>
        </div>
      </form>
                  </div>
  </div>
                 
                </div>
              </div>

<!--- Confirm your pw TO BUY --->
          <div class="modal fade " id="confirmBuy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        User Authentication
                    
                  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="modal-pic" class="modal-pic">
                    
                    </div>
                  <div class="modal-body">
                    <p>Please enter your password to finalize purchase</p>
                  <form action='purchaseGame.ph?cmd=doPurchase' method='post' id='confirmPwBuy' value=''>
        <div class="form-group row">
          <label for="password" class="col-4 col-form-label">Password</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-key"></i>
                </div>
              </div> 
              <p id="hiddenGsh"><?php echo($_COOKIE['hiddenGsh']); ?></p>
              <p id="hiddU"><?php echo($_COOKIE['userId']); ?></p>
              <input id="passwordBuy" name="password" type="password" class="form-control" required="required">
              <input id="hiddenU" type="hidden" name="u" value="<?php echo($_COOKIE['userId']) ; ?>"><br>
              <p id="authenticateStatus"> </p>
            </div>
          </div>
        </div>
        
        <div class="form-group row">
          <div class="offset-4 col-8">
            <p id="finalizeResponse"> </p>
            <button name="submit"  type="submit" class="btn btn-success">Purchase Game</button>
          </div>
        </div>
      </form>
                  </div>
  </div>
                 
                </div>
              </div>


<!--- After "Yes" on Are you sure?  ---->

 <div class="modal fade" id="buyCallbackModal2" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 id="buyCallbackTitle" class="modal-title" >
                  Title

                </h5>
                  <button type="button" class="close" data-dismiss="modal" >

                  </button>
                </div>
                <div id="modal-pic" class="modal-pic">

                  </div>
                <div id="mbody" class="modal-body">
                  <p id="buyCallbackMsg">  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" data-dismiss="buyCallbackModal" class="btn btn-primary">Close</button>
                </div>
              </div>
            </div>
          </div>
<!--- Contact submitted modal --->
          <div class="modal fade " id="contactSubmittedModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">
                      Message Submitted
                  
                </h5>
                  <button type="button" class="close" data-dismiss="modal" >
                 
                  </button>
                </div>
                <div id="modal-pic" class="modal-pic">
                  
                  </div>
                <div class="modal-body">
                    
                   <div id='contactedName'></div>
                
                </div>
                <div class="modal-footer">
                  
                  <button id='closeContacted' type="button" class="btn btn-primary">Close</button>
                </div>
</div>
               
              </div>
            </div> 
       

        
            <div class="modal fade " id="contactModal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" >
                        Contact Us
                    
                  </h5>
                    <button type="button" class="close" data-dismiss="modal" >
                    </button>
                  </div>
                  <div id="modal-pic" class="modal-pic">
                    
                    </div>
                  <div class="modal-body">
                
       
        <div class="form-group row">
          <label for="email" class="col-4 col-form-label">Your Email: </label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-at"></i>
                </div>
              </div> 
              <input  name="email" type="email" class="form-control" required="required">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-4 col-form-label">Your Name</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-address-book"></i>
                </div>
              </div> 
              <input id="thename" name="name" type="text" class="form-control" required="required">
            </div>
          </div>
        </div>
        <div class="form-group row">
            <label for="message" class="col-4 col-form-label">Your Message</label> 
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-envelope"></i>
                  </div>
                </div> 
                <textarea class="form-control"rows="3"></textarea>
              </div>
            </div>
          </div>
        <div class="form-group row">
          <div class="offset-4 col-8">
           
            <button id='submitContact' name="submit"  type="submit" class="btn btn-success">Submit</button><br>
          </div>
        </div>

    
                  </div>
  </div>
                 
                </div>
              </div>
            </div>

                <!---Sign Up modal-->

          <div class="signup">
            <div class="modal fade " id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Create An Account
                    
                  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="modal-pic" class="modal-pic">
                    
                    </div>
                  <div class="modal-body">
                  <form id="signUpForm" action="validateSignUp.php?action=register" method="post">
        <div class="form-group row">
          <label for="username" class="col-4 col-form-label">Username</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-address-card"></i>
                </div>
              </div> 
              <input id="username" name="username" type="text" class="form-control" required="required">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-4 col-form-label">Email Address</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-envelope"></i>
                </div>
              </div> 
              <input id="email" name="email" type="email" class="form-control" required="required">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-4 col-form-label">Password</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-key"></i>
                </div>
              </div> 
              <input id="signUpPw" name="password" type="password" class="form-control" required="required">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-4 col-form-label" for="text">Confirm Password</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-check"></i>
                </div>
              </div> 
              <input id="signUpConfirmPw" name="confirmPassword" type="password" required="required" class="form-control">
            </div>
          </div>
        </div> 
        <div class="form-group row">
          <div class="offset-4 col-8">
            <p id="signUpResponse"></p>
            <button name="submit"  type="submit" class="btn btn-success">Sign Up</button>
          </div>
        </div>
      </form>
                  </div>
  </div>
                 
                </div>
              </div>
            </div>
  
  
            <!----- Login modal -->
  
            <div class="login">
            <div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Log In
                    
                  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="modal-pic" class="modal-pic">
                    
                    </div>
                  <div class="modal-body">
                    
                  <form action='validateLogin.php' method='post' id='loginForm'>
        <div class="form-group row">
          <label for="email" class="col-4 col-form-label">Email Address</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-envelope"></i>
                </div>
              </div> 
              <input id="email2" name="email2" type="text" class="form-control" required="required">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-4 col-form-label">Password</label> 
          <div class="col-8">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-key"></i>
                </div>
              </div> 
              <input id="password" name="password" type="password" class="form-control" required="required">
            </div>
          </div>
        </div>
        
        <div class="form-group row">
          <div class="offset-4 col-8">
            <p id="loginResponse"> </p>
            <button name="submit"  type="submit" class="btn btn-success">Log In</button><br><br><button type="button" href="passwordreset.php" class="btn btn-link"> Forgot your password? </button>
          </div>
        </div>
      </form>
                  </div>
  </div>
                 
                </div>
              </div>
            </div>
  
            <!--- Account created success modal --->
            <div class="modal fade " id="accountCreatedSuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Account Created
                    
                  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="modal-pic" class="modal-pic">
                    
                    </div>
                  <div class="modal-body">
                  <p id='createdUsername'>Your account has been created successfully.<br> Thanks for joining, **Name**</p>
                  
                  </div>
                  <div class="modal-footer">
                    
                    <button type="button" onclick="$('#accountCreatedSuccessModal').modal('hide')" class="btn btn-primary">Continue</button>
                  </div>
  </div>
                 
                </div>
              </div>
  
    </body>


</html>
