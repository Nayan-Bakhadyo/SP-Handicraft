<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SP Handicraft</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="icon" href="assets/img/logo.jpg" type="image/icon type">
    <script>  
    function showhide()
    {  
         var div = document.getElementById("about2");  
         if (div.style.display !== "none") 
         {  
             div.style.display = "none";  
         }  
        
    } 
   
    
</script>  
</head>

<body id="page-top" onload="showhide()"><nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav"> 
    <div class="container">
    <img src="assets/img/logo.jpg" alt="sp handicraft" style="height:45px; width:45px; border-radius:50%;">&nbsp;&nbsp;
    <a class="navbar-brand js-scroll-trigger" href="#page-top">S.P Handicraft</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
        <div
            class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item " role="presentation"><a class="nav-link js-scroll-trigger" href="#page-top">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#products">Products</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                <?php
                include_once('connection.php');
                    $query = "select * from admin";
                    $result= mysqli_query($conn, $query);
                    $result = mysqli_fetch_row($result);

                    if(isset($_COOKIE["username"]) && isset($_COOKIE["userpassword"])){
                        if($_COOKIE["username"] == $result[1] && $_COOKIE["userpassword"] == $result[2]){
                        session_start();

                        // Set session variables
                        $_SESSION["logged_in"] =1;
                        ?>
                         <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href="admin.php" >Login</a></li>
                        <?php
                        }
                    }else{?>
                <li class="nav-item" role="presentation"><a class="nav-link href-btn"  href=""  data-toggle="modal" data-target="#login">Login</a></li>
                        <?php }
                        ?>
            </ul>
    </div>
    </div>
</nav>
<header class="masthead text-center text-white d-flex" style="background-image:url('assets/img/image1.jpg');">
<div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="text-uppercase"><strong>S.P Handicraft</strong></h1>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">You can view and buy products from over here! </p><a class="btn btn-primary btn-xl js-scroll-trigger" role="button" href="view_products.php">View Products</a></div>
        </div>
    </header><hr>
    <section id="products" class="p-0 text-center" >
    <h2 class="mb-4" style="padding-top:10px;"> Products </h2>
        <div class="container-fluid p-0">
            <div class="row no-gutters ">
               <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Felt"><img class="img-fluid" src="assets/img/1.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded" style="font-size:22px;"><span>Felt </span></div></div></div></a></div>
                <div
                    class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Knit Wear"><img class="img-fluid" src="assets/img/2.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded" style="font-size:22px;"><span>Knit Wear </span></div><div class="project-name"><span> </span></div></div></div></a></div>
            <div
                class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Natural Fiber"><img class="img-fluid" src="assets/img/3.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>Natural Fiber </span></div><div class="project-name"><span></span></div></div></div></a></div>
        <div
            class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Paper"><img class="img-fluid" src="assets/img/4.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>Paper </span></div><div class="project-name"><span></span></div></div></div></a></div>
            <div
                class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Metal"><img class="img-fluid" src="assets/img/5.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>Metal</span></div><div class="project-name"><span></span></div></div></div></a></div>
                <div
                    class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Wooden"><img class="img-fluid" src="assets/img/6.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>Wooden</span></div><div class="project-name"><span> </span></div></div></div></a></div>
                    
        <div
            class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Pashmina"><img class="img-fluid" src="assets/img/pashmina.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>pashmina </span></div><div class="project-name"><span></span></div></div></div></a></div>
            <div
                class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php?category=Dhaka"><img class="img-fluid" src="assets/img/dhaka.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>dhaka</span></div><div class="project-name"><span></span></div></div></div></a></div>
                <div
                    class="col-sm-6 col-lg-4"><a class="portfolio-box" href="view_products.php"><img class="img-fluid" src="assets/img/52.jpg"><div class="portfolio-box-caption"><div class="portfolio-box-caption-content"><div class="project-category text-faded"  style="font-size:22px;"><span>others</span></div><div class="project-name"><span> </span></div></div></div></a></div>
                    </div>
        
                    </div>
                    </div>
    </section>
    <hr>
 <!-- section for about us -->
 <section class="showcase p-0 text-center" id="about">
 <h2 class="mb-4"style="padding-top:10px;" > About Us </h2>
        <div class="container ">
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white " style="background-image:url(assets/img/logo3.jpg); "><span></span></div>
                <div class="col-lg-6 my-auto order-lg-1 showcase-text">
                    <h3>How it started!</h3>
                    <p class="lead mb-0" style="font-size:17.5px;">With the motive to promote and preserve traditional and religious artifacts, S.P HANDICRAFT was established on the year 2014 (Registered under Nepal Government/ Ministry of Commerce and supply) as an autonomous and commercial organization.</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image:url(&quot;assets/img/vision.jpg&quot;);"><span></span></div>
                <div class="col-lg-6 my-auto order-lg-1 showcase-text">
                    <h3>Vision</h3>
                    <p class="lead mb-0" style="font-size:17.5px;">Within the next upcoming (5) years become nationally as well as internationally known for serving old and new generation and mostly supporting the women for entrepreneurs and independent business owners by creating friendly business of handicraft in world wide.</p>
                </div>
            </div><br>
            <div class="row no-gutters">
                <div class=" showcase-text">
                    <h3>Reach</h3>
                    <p class="lead mb-0" style="font-size:17.5px;">We export Nepalese Handicrafts to USA, UK, Europe, Australia, Japan, India, China, Tibet, Pakistan, Korea, France, Italy, Spain, Canada and East Asian Countries.</p>
                </div>
            </div><hr>
            <div class="text_container2">
            <h3 type="button" class="btn btn-primary">Read more...</h3></div>
            <br>
            <div class="about2" id="about2">

            <h3 class="mb-6" > Our Objectives</h3>
        <span> S.P Handicraft is to support the overall growth and development of Handicrafts by maintaining state of art design technology in Nepal.<br>
         To Increase economic opportunities and enhance business skills and explore potentials.<br>
         To promote Nepalese Handicrafts market all over the World.<br>
         To target low income level people<br>
         To keep alive age old Nepalese and Tibetan art lineage.<br>
         To bequeath traditional know-how to the posterity.<br>
         To continue producing young and new artists.<br>
         To make a proper management of the items produced from the different raw materials by the dispersed workers and to promote market in an integrated way.<br>
         We are on the way to the conservation of cultural tradition and artistic heritage of Nepal through newly concepts and generation without debasing their unique originality and quality.
        </span><br><br>
        <h3 class="mb-6" > Our Strategy</h3>
        <span>

        Became nationally as well as internationally as "The" resource for handicraft business.<br>
        Use network/ personal contacts to create an opportunity to speak, get reviews regarding the handicraft.<br>
        We are starting to prove market ability and seeking national as well as international importers.<br>
        Continue to turn coaching and consulting process into products, products into program.<br>
        Create products and program for orders to sell that serve the entrepreneurial market.<br>
        Seek endorsements/ approval/intros/quotes from noted SBA( Small Business Associations)
        Exist strategy to sell to major importing company for handicraft.
        </span><br><br>
        <h3 class="mb-6" > Action Plan</h3>
        <span>

        Develop the handmade products and marketing plan.<br>
        Develop women in Business practitioners program.<br>
        Contract design for production.<br>
        Submit proposal for entrepreneur for home base business.<br>
        Complete mailing to trade association of worldwide for speaking engagement.<br>
        Complete stress free and eco friendly selling.<br>
        Promoting Nepalese handmade products and their values

        </span>

        <hr>
    <div class="text_container">
        <h3 type="button" class="btn btn-primary">Hide</h3>
        </div>
                    </div>
</div>
    </section>
<!-- For getting feedback  -->

<section id="contact" style="padding-bottom:40px;padding-right:5px;padding-left:4px; padding-top:0px;">
    <div class="container text-center" style="padding-top:20px;">
        <?php
        if(isset($_GET['errorcode'])){
            if($_GET['errorcode']==1){
            ?>
            <div class="alert alert-success alert-dismissible fade show">
            <strong>Thankyou for contacting us </strong> We will get back to you soon.
        </div>
        <?php
        }else{
            if($_GET['errorcode']==2){?>
                <div class="alert alert-warning alert-dismissible fade show">
                <strong>Warning! </strong>Your name is either empty or there are special characters!
                </div>
                <?php
            }
            if($_GET['errorcode'] == 3){?>
                <div class="alert alert-warning alert-dismissible fade show">
                <strong>Warning! </strong>Name too long!
                </div>
                <?php    
            }
            if($_GET['errorcode'] == 4){?>
                <div class="alert alert-warning alert-dismissible fade show">
                <strong>Warning! </strong>Subject is required!!
                </div>
                <?php 
        }
            if($_GET['errorcode'] == 5){?>
                <div class="alert alert-warning alert-dismissible fade show">
                <strong>Warning! </strong>Subject too long!
                </div>
        <?php 
    }
            if($_GET['errorcode'] == 6){?>
                <div class="alert alert-warning alert-dismissible fade show">
                <strong>Warning! </strong>Enter valid email!
                </div>
        <?php 
        }
                 if($_GET['errorcode'] == 7000){?>
                     <div class="alert alert-warning alert-dismissible fade show">
                     <strong>Warning! </strong>Your message is either empty or too long!
                     </div>
        <?php 
            }
    }
}
        ?>
            </div>
        <div class="container">
            <form id="feedbackform" name="feedbackform" action="contactform.php" onsubmit="return validate()"  method="post">
                <div class="form-row" style="margin-left:0px;margin-right:0px;padding:10px;">
                    <div class="col-md-6" style="padding-left:20px;padding-right:20px;">
                        <fieldset></fieldset>
                        <legend><i class="fa fa-info"></i> &nbsp;Corporate Information</legend>
                        <p></p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-building"></i></td>
                                        <td> Near Khwopa Engineering College</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-map-marker"></i></td>
                                        <td>Liwali-2 Bhaktapur 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-phone"></i></td>
                                        <td>Contact - 977-01-5122255<br>
                                        Cell No - 977-9851037208 / 9843698638
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-envelope"></i></td>
                                        <td>sp.handicraft55@gmail.com </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-facebook-square"></i></td>
                                        <td><a href="https://www.facebook.com/search/top?q=s.p%20handicraft%20export%20%26%20import" target="_blank" rel="noopener noreferrer">facebook/s.p handicraft export & import</a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" id="message" style="padding-right:20px;padding-left:20px;">
                        <fieldset>
                            <legend><i class="fa fa-envelope"></i>&nbsp;Contact US</legend>
                        </fieldset>

                        <div class="form-group has-feedback"><label for="from_name">Name</label><input class="form-control" type="text" id="name" tabindex="-1" name="name" required="" placeholder="Your name here"></div>
                        <div class="form-group has-feedback"><label for="from_email">Email</label><input class="form-control" type="email" id="email" name="email" required="" placeholder="Email address"></div><label for="name">Subject</label>
                        <div class="form-row">
                            <div class="col"><input class="form-control" type="text" id="subject" tabindex="-1" name="subject" required="" placeholder="Subject"></div>
                        </div>
                        <div class="form-group"><label for="comments">Message</label><textarea class="form-control" required="" id="message" name="message" placeholder="Your message" rows="5"></textarea></div>
                        <div class="form-group"><button class="btn btn-primary active btn-block" style="background-color:#303641;" type="submit" name="submit">Send <i class="fa fa-chevron-circle-right"></i></button></div>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
    </section>
<!-- login form for admin panel -->

<div class="modal fade" role="dialog" tabindex="-1" id="login">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Log In</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-user"></i></span></div>
                                      <input class="form-control" type="text" required="" placeholder="Username" name="username" id="username">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="text-primary input-group-text"><i class="fa fa-lock"></i></span></div>
                                      <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                            <input type="checkbox" onclick="Show_password()">&nbsp;
                            <span style="font-size:12px;">Show Password</span>
                           
                            <div class="form-group">
                                <input type="checkbox" id="remember" name="remember">&nbsp; <span style="font-size:12px;">Remember me</span></input>
                            </div>
                            <div class="form-group"><button class="btn btn-primary btn-lg text-white"  type="submit" id="addarts" name="addarts" style="width: 100%;" type="button">Log in</button></div>
                        </form>
       
                </div>
            </div>
        </div>


<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
    <script src="assets/js/index.js"></script>


   
<script type="text/javascript">
	$(document).ready(function(){
		$('.text_container').click(function() {
			$('.about2').css("display", "none");

			$('.about2').css("color", "red");
		});
	});</script>
 <script type="text/javascript">
	$(document).ready(function(){
		$('.text_container2').click(function() {
			$('.about2').css("display", "");

			$('.about2').css("color", "black");
		});
    });
    </script>
</body>
</html>