<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Herosky Petshop And Grooming Center</title>

        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

		<link rel="stylesheet" href="style.css">

    <style type="text/css">
        .box {
            color: #000000;
        }
        .auto-style2 {
            font-size: 15pt;
        }
        .newStyle1 {
            color: #000000;
        }
        .auto-style3 {
            color: #000000;
            font-size: 15pt;
        }
        .newStyle2 {
            color: #FFFFFF;
        }
        .newStyle3 {
            color: #FFFFFF;
            font-size: 15px;
        }
        .newStyle4 {
            color: #FFFFFF;
            font-size: 15px;
        }
        .auto-style5 {
            color: #FFFFFF;
            font-size: 12pt;
        }
        .auto-style6 {
            font-size: 17pt;
        }
        .auto-style7 {
            text-decoration: none;
        }

        .dropbtn {
          background-color: #333;
          color: #82EEFD;
          font-size: 2rem;
          cursor: pointer;
          border-bottom: 1px solid #82EEFD;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          border: 1px solid #82EEFD;
          position: absolute;
          background-color: #333;
          min-width: 150px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: white;
          font-size: 2rem;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {color: #82EEFD;}

        .dropdown:hover .dropdown-content {
          display: block;
        }

        /* The message box is shown when the user clicks on the password field */
        #message {
          display:none;
          background: #f1f1f1;
          color: #000;
          position: relative;
          padding: 10px;
          margin-top: 10px;
        }

        #message p {
          padding: 10px 35px;
          font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
          color: green;
        }

        .valid:before {
          position: relative;
          left: -35px;
          content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
          color: red;
        }

        .invalid:before {
          position: relative;
          left: -35px;
          content: "✖";
        }
        
    </style>

</head>
<body>
		<header>
            <div id="menu-bar" class="fas fa-bars"></div>

            <a href="#" class="logo"><span>HERO</span>SKY</a>   
            <nav class="navbar">
                <a href="#home">Home</a>&nbsp;&nbsp;&nbsp;
                <a href="#book">book</a>&nbsp;&nbsp;&nbsp;
                <a href="#services">services</a>&nbsp;&nbsp;&nbsp;
                <a href="#gallery">gallery</a>&nbsp;&nbsp;&nbsp;
                <a href="#review">review</a>

            </nav>



            <?php
            
            if (isset($_SESSION['USER_ID']))
                {
                    $id = $_SESSION['USER_ID'];
                    // echo " <a style='color: #fff; font-size: 2rem;margin: 0.8rem;' class='navbar' href='Logout.php'>".$_SESSION['FIRSTNAME']." LOGOUT</a>" ;
                    $status = '';
                    $sql = "SELECT * from book where USER_ID = '$id'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc())
                       {
                        $status = $row['STATUS'];
                      }
                    echo "<div class='login-form-container'>
                            <i class='fas fa-times' id='form-close'></i>
                            <form method='POST' action=''>
                                <h3>Logout</h3>
                                <p>ARE YOU SURE?</p>
                                <br>
                                <button style='text-decoration: none; float: left; color: #fff; background-color: #000; font-size: 2rem;margin: 0.8rem; padding: 1rem;' class='navbar'><a href='' style='text-decoration: none;'>CLOSE</a></button>
                                <button style='float: right; color: #fff; background-color: #000; font-size: 2rem;margin: 0.8rem; padding: 1rem;' class='navbar'><a href='Logout.php' style='text-decoration: none;'>CONFIRM</a></button>
                            </form>
                        </div>

                            

                             

                            <div class='dropdown'>
                                  <button class='dropbtn'>".$_SESSION['FIRSTNAME']."</button>
                                  <div class='dropdown-content'>
                                      <a href='#' style='cursor: default; color: white;'>Appointment Status: <span style='color: yellow;'>".$status."</span></a>
                                      <a href='#'>
                                         <div class='icons'>
                                            <p hidden><i class='fas fa-search' id='search-btn'></i></p>
                                            <p id='login-btn'>Log out</p>
                                        </div>
                                      </a>
                                  </div>
                            </div>

                            
                        ";
                }
                
            else
                {
                    echo "
                        <div class= 'icons'>
                            <i id='search-btn'></i>
                            <i class='fas fa-user' id='login-btn'></i>
                        </div>";
                }        
            ?>
            
        </header>

<div class="login-form-container">
    <i class="fas fa-times" id="form-close"></i>
    <form method="POST"  action="iConnection.php">
        <h3>login</h3>
        <input type="text" class="box" name="USERNAME"  placeholder="Enter Username" value = "" required>
        <input type="password" class="box" name="PASSWORD"  placeholder="Enter Password" bvalue = "" required>
        <input type="submit" value="login now" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">Remember me</label>
        
        <p class="message">don't have account? <a href="#">register now</a></p>
    </form>

    <form class="reg-form" method="POST" action="Register.php">
        <h3>Register</h3>
        <input type="text" class="box2" name="FIRSTNAME"  placeholder="First name" value = "" required/>
        <input type="text" class="box2" name="LASTNAME"  placeholder="Last name" value = ""/ required>
        <input type="text" class="box2" name="USERNAME"  placeholder="Username" value = ""/ required>
        <input type="password" class="box2" id="psw" name="PASSWORD" pattern="[A-Z,a-z]{8,}" 
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "20" placeholder="New password" required>
        <div id="message">
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        
        <input type="submit" value="Register" class="btn2" />
        <p class="message">already have account? <a href="#">login</a></p>


    </form>
</div>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
    <script>
        $('.message a').click(function(){
        $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
        });
    </script>
<section class="home" id="home">
    <div class="content">
        <h3>Welcome to Herosky Petshop And Grooming</h3>
        <p>Please enjoy our offers</p>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-scr="1.mp4"></span>
        <span class="vid-btn" data-scr="2.mp4"></span>
        <span class="vid-btn" data-scr="3.mp4"></span>
        <span class="vid-btn" data-scr="4.mp4"></span>
        <span class="vid-btn" data-scr="5.mp4"></span>
    </div>

    <div class="video-container">
        <video src="1.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<section class="book" id="book">
<h1 class="heading">
    <span>b</span>
    <span>o</span>
    <span>o</span>
    <span>k</span>
    <span class="space"></span>
    <span>n</span>
    <span>o</span>
    <span>w</span>
</h1>

<div class="row">
    <div class="img">
        <img src="01.jpg" alt="">
    </div>
    <form action="Book.php" method ="POST">
        <div class="inputBox">
            <h3>Owner's Name</h3>
            <input type="text" name="FULLNAME" placeholder="Full name" required>
        </div>
        <div class="inputBox">
            <h3>Address</h3>
            <input type="text" name="ADDRESS" placeholder="Address" required>
        </div>
        <div class="inputBox">
            <h3>Contact Number</h3>
            <input type="tel" placeholder="Format: 09123456789" pattern="[0-9]{11}" name="NUMBER" oninput="javascript: 
            if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" required/>
        </div>
        <div class="inputBox">
            <h3>Email</h3>
            <input type="email" name="EMAIL" placeholder="Email" required>
        </div>
        <div class="inputBox">
            <h3>Services</h3>
            <select name="SERVICES" required style="padding:.5rem 0; width:100%; padding:1rem; border:.1rem solid rgba(0,0,0,.1); font-size: 1.7rem; color: #333; text-transform: none;">
              <option value="" selected disabled>Select Services</option>
              <option value="Vaccination">Vaccination</option>
              <option value="Grooming">Grooming</option>
              <option value="Chronic Disease Pain Management">Chronic Disease Pain Management</option>
            </select>
        </div>

        <div class="row">
        <div class="inputBox">
            <h3>Name of Pet</h3>
            <input type="text"name="PETNAME" placeholder="Name of Pet" required>
        </div>
        <div class="inputBox">
            <h3>Breed</h3>
            <input type="text" name="BREED" placeholder="Breed" required>
        </div>          
        <div class="inputBox">    
            <h3>Date of Birth</h3>
            <input type="Date" name="BIRTHDATE" required>
        </div>
        <div class="inputBox">
            <h3>Age</h3>
            <input type="text" name="AGE" placeholder="Pet Age" required>
        </div>
        <div class="inputBox">
            <h3>Species</h3>
            <input type="text" name="SPECIES" placeholder="Species" required>
        </div>
        <div class="inputBox">
            <h3>Gender</h3>
            <select name="GENDER" required style="padding:.5rem 0; width:100%; padding:1rem; border:.1rem solid rgba(0,0,0,.1); font-size: 1.7rem; color: #333; text-transform: none;">
              <option value="" selected disabled>Select Pet Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
        </div>
        <div class="inputBox">
            <h3>Neutered or Spayed</h3>
            <select name="GENITALS" required style="padding:.5rem 0; width:100%; padding:1rem; border:.1rem solid rgba(0,0,0,.1); font-size: 1.7rem; color: #333; text-transform: none;">
              <option value="" selected disabled>Neutered or Spayed</option>
              <option value="Neutered">Neutered</option>
              <option value="Spayed">Spayed</option>
              <option value="Spayed">N/A</option>
            </select>
        </div>
        <div class="inputBox">
            <h3>appointment date</h3>
            
            <input type="Date" name="DATE" required>
      
                 <script type="text/javascript">
                        var today = new Date().toISOString().split('T')[0];
                        document.getElementsByName("DATE")[0].setAttribute('min', today);
                 </script>
           
        </div>
        <?php 
     
        if (isset($_SESSION['USER_ID']))
            {
            
                         echo "<input type='submit' class='btn' value='Book Now'>";
                    
            }
        else
            {
                
            }
        ?>
    </form>
</div>
</section>



<section class="services" id="services">
    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">
        <div class="box">
            <i class="fas fa-bookmark"></i>
                <h3>Vaccination</h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                
        </div>
        <div class="box">
            <i class="fas fa-bookmark"></i>
                <h3>Grooming</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                
        </div>
        <div class="box">
            <i class="fas fa-bookmark"></i>
                <h3>Chronic Disease Pain Management</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                <p>&nbsp;</p>
                
        </div>
        <div class="box">
            <i class="fas fa-bookmark"></i>
                <h3>Medicine</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                
        </div>
        <div class="box">
            <i class="fas fa-bookmark"></i>
                <h3>Dog Food</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                
        </div>
        <div class="box">
            <i class="fas fa-bookmark"></i>
                <h3>Pet Accesories</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
                
        </div>
    </div>
</section>

<section class="gallery" id="gallery">
    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

<div class="box-container">
    
    <div class="box">
        <img src="pic1.jpg" alt="">
        <div class="content">
            <h3>Herosky Photos</h3>
            <p>“If having a soul means being able to feel love and loyalty and gratitude, then animals are better off than a lot of humans.” James Herriot, British Writer</p>
            
        </div>
    </div>
    <div class="box">
        <img src="pic2.jpg" alt="">
        <div class="content">
            <h3>Herosky Photos</h3>
            <p>“I think having an animal in your life makes you a better human.” Rachael Ray, American Television Personality</p>
            
        </div>
    </div>
    <div class="box">
        <img src="pic3.jpg" alt="">
        <div class="content">
            <h3>Herosky Photos</h3>
            <p>“Until one has loved an animal, a part of one’s soul remains unawakened.” Anatole France, French Poet</p>
            
        </div>
    </div>
    <div class="box">
        <img src="pic4.jpg" alt="">
        <div class="content">
            <h3>Herosky Photos</h3>
            <p>“Pets have more love and compassion in them than most humans.” Robert Wagner, American Actor</p>
            
        </div>
    </div>
    <div class="box">
        <img src="pic5.jpg" alt="">
        <div class="content">
            <h3>Herosky Photos</h3>
            <p>“Be kind to all pets and animals because they will be kind back to you.” Wesley Porter, American Author</p>
            
        </div>
    </div>
    <div class="box">
        <img src="pic6.jpg" alt="">
        <div class="content">
            <h3>Herosky Photos</h3>
            <p>“Pets reflect you like mirrors. When you are happy, you can see your dog smiling and when you are sad, your cat cries.” Munia Khan, Bangladeshi Poet</p>
            
        </div>
    </div>
</div>
</section>


<section class="review" id="review">
    <h1 class="heading">
        <span>r</span>  
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>  
    </h1>

    <div class="swiper mySwiper review-slider">
        <div classs="swiper-wrapper wrapper">
            <div class="swiper-slide">
                <div class="box">
                    <img src="cute1.jpg" alt="">
                    <h3>Samantha Reese</h3>
                    <p>Herosky has been such a good place for our family - a true blessing! This facility is very different from any other place we have been. 
                    I have been taking my dog here for many years. They are always on time, very clean, extremely professional, and super loving!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">   
                    <img src="cute2.jpg" alt="">
                    <h3>Ryle Jace</h3>
                    <p>Everyone is absolutely wonder. They have cared for our puppy since we moved to the area a few years ago.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="cute3.jpg" alt="">
                    <h3>Larry Key</h3>
                    <p>I took my cat to HeroSky for issues with her stomach, and she's doing great now.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box">
                    <img src="cute4.jpg" alt="">
                    <h3>Perry Lou</h3>
                    <p>Puppy Power!</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>



<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>about us</h3>
            <p>Herosky Petshop & Grooming</p>
            <p>
                <span class="box">
           <a href="#" class="newStyle2">Phone Number</a></span><span class="auto-style7"><span class="box">
               <a href="#">+639338173317</a>
               <a href="#">+63955593884</a>
            </p>
            <p>&nbsp;<span class="auto-style2"> </span></p>
        </div>      

        <div class="box">
            <h3>branch locations</h3>
            </span></span>
            <span class="box">
            <span class="auto-style6">
           <a href="#">Congressional</a></span></span><span class="auto-style5">02 Congresional Ave,
               <br />
                Project 8, Quezon City
                </span><span class="auto-style2"><span class="auto-style3">
               <br />
                &nbsp;
               </span></span>       
            <span class="box">
               <span class="auto-style6">
               <a href="#">Tandang Sora</a></span></span><span class="auto-style3"><span class="auto-style2"><span class="box">       
           </span></span>       
            </span>       
           <a href="#"><span class="auto-style5">176 G Tandang Sora Avenue
               <br />
               Barangay Tandang Sora Quezon City</span></a>

        </div>

        <div class="box">
            <h3>quick links</h3>
           <a href="#">home</a>
           <a href="#">book</a>
           <a href="#">service</a>
           <a href="#">gallery</a>
           <a href="#">review</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
           <a href="#">facebook</a>
           <a href="#">instagram</a>
           <a href="#">twitter</a>
           <a href="#">likedin</a>
        </div>
    </div>
    <h1 class="credit"> created by <span>SBIT-2E GROUP 1</span> | all rights reserved </h1>
</section>

    
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>	 
    <script src="main.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6241b8d20bfe3f4a87700f5e/1fv8bjugh';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script>
var myInput = document.getElementById("psw");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</body>
</html>