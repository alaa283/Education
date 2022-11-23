<!DOCTYPE html>
<html lang="en">

<!-- Start head -->
    <?php
        
        require_once "./head.php";

	?>
<!-- end head -->

<body>
    <!-- Navbar Start -->
        <?php
			require_once "./nav.php";
		?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0"> Learning and Testing Center</h4>
                <h1 class="display-3 font-weight-bold text-white">Hello WEBW</h1>
                <p class="text-white mb-4">Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed sit.
                    Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed ipsum at ipsum nonumy amet. Clita
                    lorem dolore sed stet et est justo dolore.</p>
                <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="img/header.png" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Facilities Start -->
    
    <!-- Facilities Start -->


    <!-- About Start -->
   
    <!-- About End -->


    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Popular Classes</span></p>
                <h1 class="mb-4">tests for Your Kids</h1>
            </div>
            <?php
                require_once "./Backend/connection_database.php";
                $count = 0;
                $q=" SELECT * FROM tests ";
                $query = mysqli_query($mysqli , $q);
			?>
            <div class="row">
                <?php
                    while($rows = mysqli_fetch_array($query))
                        {
                ?>
                            <div class="col-lg-4 mb-5">
                                <div class="card border-0 bg-light shadow-sm pb-2">
                                    <img class="card-img-top mb-2" src="img/class-1.jpg" alt="">
                                    <div class="card-body text-center">
                                        <h4 class="card-title"><?php echo $rows['test_name']; ?></h4>
                                        <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum duo et no et, ipsum ipsum erat duo amet clita duo</p>
                                    </div>
                                    <div class="card-footer bg-transparent py-4 px-5">
                                        <div class="row border-bottom">
                                            <div class="col-6 py-1 text-right border-right"><strong>Age of Kids</strong></div>
                                            <div class="col-6 py-1">3 - 6 Years</div>
                                        </div>
                                        <div class="row border-bottom">
                                            <div class="col-6 py-1 text-right border-right"><strong>Total Seats</strong></div>
                                            <div class="col-6 py-1">40 Seats</div>
                                        </div>
                                        <div class="row border-bottom">
                                            <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                            <div class="col-6 py-1">08:00 - 10:00</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 py-1 text-right border-right"><strong>Tution Fee</strong></div>
                                            <div class="col-6 py-1">$290 / Month</div>
                                        </div>
                                    </div>
                                    <!-- <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a> -->
                                    <?php
                                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
                                            {
                                        ?>
                                            <a href="question.php?id=<?php echo $rows['id_test'];?>" class="btn btn-primary px-4 mx-auto mb-4"> Open </a>
                                    <?php
							                }
							                else
                                            {
                                
                                    ?>  
                                    <a href="./login.php" class="btn btn-primary px-4 mx-auto mb-4">Open</a> 
                                    <?php
                                            }
                                    ?> 
                                            
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Class End -->


    <!-- Registration Start -->
    
    <!-- Registration End -->

    <!-- Testimonial Start -->
   
    <!-- Testimonial End -->


    <!-- Blog Start -->

    <!-- Blog End -->


    <!-- Footer Start -->
    <?php
        
        // require_once "./footer.php";
    
    ?>
    <!-- Footer End -->
        
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- start JavaScript -->
        <?php
        
            require_once "./JavaScript.php";
        
        ?>
    <!-- end JavaScript -->


</body>

</html>