<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--link rel="stylesheet" href="assets/css/style.css"
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>-->
  <!-- -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #333399;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .jumbotron a{
	  color: #fff
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #fff;
      z-index: 9999;
      border: 0;
      font-size: 14px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #000066 !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #fff !important;
      background-color: #333399 !important;
	  min-height: 70px;
      max-height: 100px;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #000066 !important;
  }
  .navbar-brand {
	  min-height: 70px;
      max-height: 100px;
	  width: 200px;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #333399;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;	
      animation-duration: 1s;	
      -webkit-animation-duration: 1s;
      visibility: visible;			
  }
  @keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }	
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>
</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand" href="#home">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./about">About Us</a></li>
        <li><a href="#testimoni">Testimoni</a></li>
        <li><a href="#partner">Partner</a></li>
        <li data-toggle="modal" data-target="#myModal"><a href="#">
           
            <p>Login</p>
          
            </a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
		<a href="{{url('sso-login')}}" class="btn btn-danger">UI</a>
        <button type="button" class="btn btn-danger">Non UI</button>
        <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

<!-- EDIT PROFILE -->
    
    <div id="container" class="container-fluid bg-grey">
        <div id="content" class="container col-md-8 col-xs-4 col-lg-8 col text-left">
            <p>
            <h1>Edit Profile</h1>
            <form>
            Nama    : <input type="text" class="form-control" name="name">
            Email   : <input type="email" class="form-control" name="email"> 
            Deskripsi   : <input type="text" class="form-control" name="name">
            Email   : <input type="email" class="form-control" name="email"> 
            Nama    : <input type="text" class="form-control" name="name">
            Email   : <input type="email" class="form-control" name="email"> 
            
            </form>
            </p>
        
        </div>
    </div>

<div id="menu" class="container-fluid text-center bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> UILancer </h3>
                <ul>
                    <li> <a href="#"> Home </a> </li>
                    <li> <a href="#"> How It Works </a> </li>
                    <li> <a href="#"> Search Job </a> </li>
                    <li> <a href="#"> Search Workers </a> </li>
                </ul>
            </div>
            <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> About </h3>
                <ul>
                    <li> <a href="#"> About Us </a> </li>
                    <li> <a href="#"> Testimoni </a> </li>
                    <li> <a href="#"> Partner </a> </li>
                    <li> <a href="#"> Info Akun Official </a> </li>
                </ul>
            </div>
				<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> Get In Touch </h3>
                <ul>
                    <li> <a href="#"> Join Partner </a> </li>
                    <li> <a href="#"> Contact Us </a> </li>
                    <li> <a href="#"> Help </a> </li>
                    <li> <a href="#"> FAQ </a> </li>
                </ul>
            </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                <h3> Lorem Ipsum </h3>
                <ul>
                    <li> <a href="#"> Lorem Ipsum </a> </li>
                    <li> <a href="#"> Lorem Ipsum </a> </li>
                    <li> <a href="#"> Lorem Ipsum </a> </li>
                    <li> <a href="#"> Lorem Ipsum </a> </li>
                </ul>
            </div>
			<div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                <h3> Lorem Ipsum </h3>
                <ul>
                    <li>
                        <div class="input-append newsletter-box text-center">
                            <input type="text" class="full text-center" placeholder="Email ">
                            <button class="btn  bg-gray" type="button"> Lorem ipsum <i class="fa fa-long-arrow-right"> </i> </button>
                        </div>
                    </li>
                </ul>
                <ul class="social">
                    <li> <a href="#"> facebook <i class=" fa fa-facebook">   </i> </a> </li>
                    <li> <a href="#"> twitter <i class="fa fa-twitter">   </i> </a> </li>
                    <li> <a href="#"> gplus <i class="fa fa-google-plus">   </i> </a> </li>
                    <li> <a href="#"> pinterest<i class="fa fa-pinterest">   </i> </a> </li>
                    <li> <a href="#"> youtube<i class="fa fa-youtube">   </i> </a> </li>
                </ul>
            </div>
        </div>
        <!--/.row--> 
    </div>
	<!--/.container--> 
</div>

<footer class="container-fluid text-center">
  <a href="#home" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br>
  <img src="logo2.png" alt="UILancer" width="200" height="50">
  <p>UILancer is marketplace for service blablabla</p>
  <a href="#">(+62) 813-681-999</a></br>
  <a href="#">ask@uilancer.com</a><br>
  <p>Made By <a href="" title="UILancer">PPL A6</a></p>		
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#home']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
