<!DOCTYPE HTML>
<html>
	<?php
	require_once "./head.php";

	?>
	<body>
		<div id="page">
			<?php
				
				require_once "./nav.php";
				require_once "./Backend/connection_database.php";

				$id = $_GET['id']; 

			?>
			<div class="container">
				<h1 class="text-center text-primary mt-5">Quiz </h1>
				<h2 class="text-center text-primary"> Welcome ... </h2>
				<h3 class="text-center">You have to select only one out of 4. Best of luck <i class="far fa-smile-beam text-primary"></i></h3>
				
				<form method="POST" action="check.php?id=<?php echo $id; ?>" >
					<?php
						for($i = 1 ; $i <=5 ; $i++)
							{
								$q=" SELECT * FROM questions WHERE id_test = $id AND aaa = $i";
								$query = mysqli_query($mysqli , $q);

								while($rows = mysqli_fetch_array($query))
									{
					?>

					<div class="card" >
						<h4 class="card-header"><?php echo $rows['question']; ?></h4>
					</div>

					<?php
										$q=" SELECT *  FROM answers  WHERE id_test = $id AND aaa_id = $i  ";
										$query = mysqli_query($mysqli , $q);

										while($rows = mysqli_fetch_array($query))
											{
					?>
					<div class="card-body text-primary">
							<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
								<span style="font-weight:600"><?php echo $rows['answer']; ?></span>
					</div>
					<?php
						}}
					?>

					<?php
						}
					?>
					<div class="form-row d-flex justify-content-center">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary px-4">
					</div>

				</form>
			</div>
		</div>
	<?php
	
	require_once "./JavaScript.php"
	
	?>
	</body>
</html>

