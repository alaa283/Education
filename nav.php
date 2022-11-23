<?php
	session_start();
?>

<div class="fh5co-loader"></div>
	
	
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">www.yourdomainname.com</p>
						<p class="num">Call: +01 123 456 7890</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i>Educ<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="courses.php">Courses</a></li>
							<?php
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
							{
								?>
								<li><a href="./question.php">Exam</a></li>
							<?php
							}
							?>
							

							<li><a href="about.php">About</a></li>
							</li>
							<li><a href="contact.php">Contact</a></li>
							
							<?php
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
							{
								?>
							<li class="btn-cta"><a href="./log_out.php"><span>log out</span></a></li>
								<?php
							}
							else
							{
							?>
							
							<li class="btn-cta"><a href="./login.php"><span>Login</span></a></li>
							<li class="btn-cta"><a href="./sign_up.php"><span>Sign Up</span></a></li>
						<?php
						}?>
							
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>