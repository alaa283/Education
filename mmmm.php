<!DOCTYPE HTML>
<html>
	<?php
	require_once "../head.php";

	?>
	<body>
		<div id="page">
			<?php
				
				require_once "../nav.php";
				require_once "../Backend/connection_database.php";

				$id = $_GET['id'];
			?>
			<div class="container">
				<h1 class="text-center text-primary mt-5">Quiz </h1>
				<h2 class="text-center text-primary"> Welcome ... </h2>
				<!-- <h3 class="text-center">You have to select only one out of 4. Best of luck <i class="far fa-smile-beam text-primary"></i></h3> -->
				<form action="test.php?id=<?php echo $id ?>" method="post">
                        <?php
                            for( $i = 1 ; $i <=5 ; $i++)
                                {
                                    if(isset($_POST['update']) || isset($_POST['question'.$i]))
                                        {
                                            $question = $_POST['question'.$i];
                                            // echo $question;
                                            $result = mysqli_query($mysqli , "UPDATE questions SET question='$question' WHERE id_test = $id AND aaa =$i");
                                            // break;
                                        }
                                    $q=" SELECT * FROM questions WHERE id_test = $id AND aaa = $i";
                                    $query = mysqli_query($mysqli , $q);                                    
                                    // $result = mysqli_fetch_array($query);

                                    while($rows = mysqli_fetch_array($query))
                                        {
                        ?>
                        <!-- <form action="test.php?id=<?php //echo $id ?>" method="post"> -->
                            <div class="card-header bg-secondary mb-5 p-4 ">
                                <div class="form-group">
                                    <input type="text" name="question<?php echo $i; ?>" class="form-control border-0 p-4 col-6 " value="<?php echo $rows['question']; ?>" />
                                <!-- </div> -->

                                <?php
                                            // $g++;
                                            $q1=" SELECT *  FROM answers  WHERE id_test = $id AND aaa_id = $i  ";
                                            $query1 = mysqli_query($mysqli , $q1);

                                            while($rows1 = mysqli_fetch_array($query1))
                                                {
                        ?>
                            <div class="form-group d-flex justify-content-center">
                                <input type="text" name="answer" class="form-control border-0 p-4 col-6 " value="<?php echo $rows1['answer']; ?>" />
                            </div>
                                <!-- <div class="form-row d-flex justify-content-center">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary px-4 mb-3">
                                </div> -->
                        <!-- </form> -->
                    
                        <?php
                            }}
                        ?>
                        
                        </div>

                        <?php
                            }
                        ?>
                        <div class="form-row d-flex justify-content-center">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary px-4 mb-3">
                        </div>
                    </form>
			</div>
		</div>
	<?php
	
	require_once "../JavaScript.php"
	
	?>
	</body>
</html>

