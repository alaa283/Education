<!DOCTYPE HTML>
<html>
	<?php
	
	require_once "./head.php";
	// if(!isset($_SESSION['loggedin'])){
	// 	header('location:login.php');
	// }
	?>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<body>
	<div id="page">
			<?php
			
			require_once "./nav.php";
			require_once "./aside.php";
			?>
				<div class="container" style="font-family: Arial, Helvetica, sans-serif;">
					<br>
					<h1 class="text-center text-primary">Quiz </h1>
					<br>

					<h2 class="text-center text-success"> Welcome ... </h2> <br>
					
						<div >
							<h3 class="text-center card-header">You have to select only one out of 4. Best of luck <i class="far fa-smile-beam" style="color:green"></i></h3>

							<form method="POST" action="check.php" >
									
									<div class="d-flex justify-content-center" style="margin-left:7rem">
									<?php
										require_once "./Backend/connection_database.php";
										for($i = 1 ; $i < 11 ; $i++){
										$q=" SELECT * FROM questions WHERE qid = $i ";
										$query = mysqli_query($mysqli , $q);

										while($rows = mysqli_fetch_array($query))
										{
									?>
											<div class="card" >
												<h4 class="card-header" style="font-weight: bold;color:green"><?php echo $rows['question']; ?></h4>
											</div>

										<?php

											$q=" SELECT * FROM answers WHERE ans_id = $i ";
											$query = mysqli_query($mysqli , $q);

											while($rows = mysqli_fetch_array($query))
											{
										?>

											<div class="card-body" style="color:#bcb4ff;">
												<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
												<span style="font-weight:600"><?php echo $rows['answer']; ?><span>
											<div>
												
											
										
										<?php
											}}
										?>
											<br>
											<?php
												}
											?>
											<div class="form-row text-center">
												<input type="submit" name="submit" value="Submit" class="btn btn-success ">
											</div>
									</div>
									
							</form>
						</div>
						
				</div>
			

			<?php
			
			// require_once "./footer.php";
			
			?>

	</div>
	<?php
	
	require_once "./JavaScript.php"
	
	?>
	</body>
</html>

