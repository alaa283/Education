<?php
	session_start();
?>

	
	
<div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="./index.php" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
            <?php 
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
            {
                if(isset($_SESSION["role"]) && $_SESSION["role"] == "student")
                {
            ?>
                    <a href="./index.php" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
            <?php 
                }
                else
                {
            ?>
                    <a href="./index_ad.php" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
            <?php
                }
            }
            ?>

                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">Education</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <!-- <a href="about.html" class="nav-item nav-link">About</a> -->
                    <?php
						if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
							{
                                if(isset($_SESSION["role"]) && $_SESSION["role"] === "student")
                                {
					?>
                                <a href="./all_tests.php" class="nav-item nav-link">Tests</a>

                    <?php
							}
                            else
                            {
                            // else if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && isset($_SESSION["username"]) && $_SESSION["username"] == "admin")
                            // {
					?>
                                <a href="./all_tests.php" class="nav-item nav-link">tests</a>
                    <!-- <a href="team.html" class="nav-item nav-link">Teachers</a> -->
                    <!-- <a href="gallery.html" class="nav-item nav-link">Gallery</a> -->
                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                    <?php }} ?>
                </div>
                    <?php
                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
                            {
                    ?>
                        <a href="./log_out.php" class="btn btn-primary px-4">log out</a>
                    <?php
							}
							else
                            {
                                
                    ?>
                                <a href="./login.php" class="btn btn-primary px-4">log in</a>
                                <a href="./sign_up.php" class="btn btn-primary px-4">sign up</a>
                    <?php
						    }
                    ?>
                
            </div>
        </nav>
</div>