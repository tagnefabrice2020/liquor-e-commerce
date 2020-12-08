
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Website title - bootstrap html template</title>

<link href="{{asset('images/logo/favicon.png')}}" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{{asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

<!-- GT America font type -->
<link href="//db.onlinewebfonts.com/c/031da03967812d134ed68febd3ba78a9?family=GT+America" rel="stylesheet" type="text/css"/>

<!-- plugin: fancybox  -->
<script src="plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
<link href="plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="{{asset('css/ui.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="{{asset('js/script.js')}}" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>

</head>
<body  style="width: 100%">


<header class="section-header">
<nav class="navbar navbar-dark navbar-expand p-0 bg-reddish-gray">
<div class="container">
		<div class="col-lg-1 col-1">
		<a href="http://bootstrap-ecommerce.com" class="brand-wrap">
			<img class="logo" src="{{asset('images/logo/logo.png')}}">
		</a> <!-- brand-wrap.// -->
	</div>
    <ul class="navbar-nav d-none d-md-flex mr-auto">
		<li class="nav-item"><a class="nav-link" href="#">beer</a></li>
		<li class="nav-item"><a class="nav-link" href="#">wine</a></li>
		<li class="nav-item"><a class="nav-link" href="#">spirits</a></li>
		<li class="nav-item"><a class="nav-link" href="#">gifts</a></li>
		<li class="nav-item"><a class="nav-link" href="#">more</a></li>
    </ul>
    <ul class="navbar-nav right-side-nav">
		<li  class="nav-item"><a href="#" class="nav-link login-btn"> Log in </a></li>
		<li class="nav-item">
		 	<a href="#" class="nav-link btn-primary sign-up-btn" data-toggle="dropdown"> sign up </a>
		</li>
	</ul> <!-- list-inline //  -->
  </div> <!-- navbar-collapse .// -->
 <!-- container //  -->
</nav> <!-- header-top-light.// -->
</header> <!-- section-header.// -->

<nav class="navbar navbar-main navbar-expand-lg navbar-light" style="background: #82133E;">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse mobile-nav" id="main_nav" style="">
      <ul class="navbar-nav" style="text-transform: uppercase; color: #fff;">
        <li class="nav-item"><a class="nav-link" href="#">beer</a></li>
		<li class="nav-item"><a class="nav-link" href="#">wine</a></li>
		<li class="nav-item"><a class="nav-link" href="#">spirits</a></li>
		<li class="nav-item"><a class="nav-link" href="#">gifts</a></li>
		<li class="nav-item"><a class="nav-link" href="#">more</a></li>
      </ul>
    </div> <!-- collapse .// -->

    <div class="container container-content-p" id="" style="width: fit-content;">
      <p class="" style="text-transform: uppercase;width: fit-content;
    margin: auto; color: #fff; font-size: 11px;">set your information and register.</p>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->

</nav>


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body" style="box-shadow: 2px 5px 10px rgba(0,0,0,.28)">
		<header class="mb-4"><h4 class="card-title sign-up-txt">Sign up</h4></header>
		<form>
			<a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Sign in with Facebook</a>
      	  <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Sign in with Google</a>
				<div class="form-row">
					<div class="col form-group">
						<label>First name</label>
					  	<input type="text" class="form-control" placeholder="">
					</div> <!-- form-group end.// -->
					<div class="col form-group">
						<label>Last name</label>
					  	<input type="text" class="form-control" placeholder="">
					</div> <!-- form-group end.// -->
				</div> <!-- form-row end.// -->
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="">
					<small class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" checked="" type="radio" name="gender" value="option1">
					  <span class="custom-control-label"> Male </span>
					</label>
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input" type="radio" name="gender" value="option2">
					  <span class="custom-control-label"> Female </span>
					</label>
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>City</label>
					  <input type="text" class="form-control">
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>Country</label>
					  <select id="inputState" class="form-control">
					    <option> Choose...</option>
					      <option>Uzbekistan</option>
					      <option>Russia</option>
					      <option selected="">United States</option>
					      <option>India</option>
					      <option>Afganistan</option>
					  </select>
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Create password</label>
					    <input class="form-control" type="password">
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<label>Repeat password</label>
					    <input class="form-control" type="password">
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
			    </div> <!-- form-group// -->      
			    <div class="form-group"> 
		            <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#" class="terms-and-conditions">terms and contitions</a>  </div> </label>
		        </div> <!-- form-group end.// -->           
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="" class="login">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
	<div class="container">
		<section class="footer-top  padding-y">
			<div class="row">
				<aside class="col-md col-6">
					<h6 class="title">Our Story</h6>
					<ul class="list-unstyled">
						<li> <a href="#">Winemaking</a></li>
						<li> <a href="#">Blog</a></li>
						<li> <a href="#">Recipes</a></li>
						<li> <a href="#">How it works</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Press</h6>
					<ul class="list-unstyled">
						<li> <a href="#"> Jobs </a></li>
						<li> <a href="#"> Help </a></li>
						<li> <a href="#"> CCPA </a></li>
						<li> <a href="#"> Accessibilty </a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Wines</h6>
					<ul class="list-unstyled">
						<li> <a href="#"> Gifts </a></li>
						<li> <a href="#"> Member Credits </a></li>
						<li> <a href="#"> Refer & Earn 2 Bottles </a></li>
						<li> <a href="#"> Affiliate Program </a></li>
					</ul>
				</aside>
				<aside class="col-md">
					<h6 class="title text-md-right text-muted">Connect</h6>
					<div class="row">
						<div class="col">
							<ul class="list-unstyled social-media-footer-link">
								<li><a href="#"> <i class="fab fa-facebook"></i>  </a></li>
								<li><a href="#"> <i class="fab fa-twitter"></i>  </a></li>
								<li><a href="#"> <i class="fab fa-instagram"></i>  </a></li>
								<li><a href="#"> <i class="fab fa-youtube"></i>  </a></li>
							</ul>
						</div>					
					</div>
					<div class="row">
						<div class="col text-md-left text-muted">
							<i class="fab fa-lg fa-cc-visa"></i>
							<i class="fab fa-lg fa-cc-paypal"></i>
							<i class="fab fa-lg fa-cc-mastercard"></i>
						</div>
					</div>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom row">
			<div class="col-md-3">
				<p class="text-muted"> Terms & Conditions | Privacy </p>
			</div>
		</section>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->



</body>
</html>