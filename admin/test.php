<!DOCTYPE HTML>
<html>
	<?php
	require_once "../head.php";

	?>
	<body>
			<?php
				
				require_once "../nav.php";
				require_once "../Backend/connection_database.php";

				$id = $_GET['id'];

                $q2="SELECT aid FROM answers WHERE id_test = $id ORDER BY aid DESC LIMIT 1";
                $query2 = mysqli_query($mysqli , $q2);
                $count_answer = mysqli_fetch_array($query2);
                $count_answer['aid'];

                $q3="SELECT aid FROM answers WHERE id_test = $id ORDER BY aid LIMIT 1";
                $query3 = mysqli_query($mysqli , $q3);
                $count_answer_start = mysqli_fetch_array($query3);
                $count_answer_start['aid'];
                
			?>
			<div class="container">
				<h1 class="text-center text-primary mt-5">Quiz </h1>
				<h2 class="text-center text-primary"> Welcome ... </h2>
				<!-- <h3 class="text-center">You have to select only one out of 4. Best of luck <i class="far fa-smile-beam text-primary"></i></h3> -->
				<form action="test.php?id=<?php echo $id ?>" method="post">
                        <?php
                            for( $i = 1 ; $i <=5 ; $i++)
                                {
                                    if(isset($_POST['fff']) || isset($_POST['question'.$i]) || isset($_POST['answer'.$i]))
                                        {
                                            $question = $_POST['question'.$i];
                                            $result = mysqli_query($mysqli , "UPDATE questions SET question='$question' WHERE id_test = $id AND aaa =$i");
                                                                            
                                    $q=" SELECT * FROM questions WHERE id_test = $id AND aaa = $i";
                                    $query = mysqli_query($mysqli , $q);                                    
                                    // $result = mysqli_fetch_array($query);
                                    while($rows = mysqli_fetch_array($query))
                                        {
                        ?>
                            <div class="card-header bg-secondary mb-5 p-4 ">
                                <div class="input-group col-6 mb-3 ">
                                    <input type="text" name="question<?php echo $i; ?>" class="form-control border-0 p-4 " value="<?php echo $rows['question']; ?>" />
                                    <div class="input-group-append">
                                        <a href="delete_q.php?id_test=<?php echo $rows['id_test'];?>&qid=<?php echo $rows['qid'];?>" class="btn btn-danger pt-2 px-4"> Delete </a>
                                    </div>
                                </div>

                                <?php
                                for($x=$count_answer_start['aid'] ; $x <= $count_answer['aid']; $x++)
                                {
                                    // echo $x;
                                    $answer = $_POST['answer'.$x];
                                $result1 = mysqli_query($mysqli , "UPDATE answers SET  answer='$answer' WHERE id_test = $id AND aaa_id = $i AND aid =$x ");
                                            $q1=" SELECT *  FROM answers  WHERE id_test = $id AND aaa_id = $i AND aid =$x  ";
                                            $result1 = mysqli_query($mysqli , $q1);


                                            while($rows1 = mysqli_fetch_array($result1))
                                                {
                                                    // if($x == $rows1['aid'])
                                                    //     {
                                ?>
                                <div class="input-group d-flex justify-content-center  mb-3">
                                    <input type="text" name="answer<?php echo $x; ?>" class="form-control border-0 p-4 col-6 " value="<?php echo $rows1['answer']; ?>" />
                                    <div class="input-group-append">
                                        <?php
                                        if($rows['ans_id1'] != $rows1['aid'])
                                        {
                                        ?>
                                        <a href="delete_a.php?id_test=<?php echo $rows['id_test'];?>&aid=<?php echo $rows1['aid'];?>" class="btn btn-danger pt-2 px-4"> Delete </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                            </div>
                        <?php
                            
                            // else
                            // {
                            //     break;
                            // }
                        }}
                        ?>
                        </div>
                        <?php
                        }
                        }

                        else
                        {
                            $q=" SELECT * FROM questions WHERE id_test = $id AND aaa = $i";
                            $query = mysqli_query($mysqli , $q);

                            while($rows = mysqli_fetch_array($query))
                                {
                ?>

                            <div class="card-header bg-secondary mb-5 p-4 ">
                                <div class="input-group col-6 mb-3 ">
                                    <input type="text" name="question<?php echo $i; ?>" class="form-control border-0 p-4 " value="<?php echo $rows['question']; ?>" />
                                    <div class="input-group-append">
                                        <a href="delete_q.php?id_test=<?php echo $rows['id_test'];?>&qid=<?php echo $rows['qid'];?>" class="btn btn-danger pt-2 px-4"> Delete </a>
                                    </div>
                                </div>

                <?php
                                for($x=1 ; $x <= $count_answer['aid']; $x++)
                                {
                                    // $answer = $_POST['answer'.$x];
                                    $q=" SELECT *  FROM answers  WHERE id_test = $id AND aaa_id = $i AND aid =$x ";
                                    $query = mysqli_query($mysqli , $q);

                                    while($rows1 = mysqli_fetch_array($query))
                                        {
                ?>
                                <div class="input-group d-flex justify-content-center  mb-3">
                                    <input type="text" name="answer<?php echo $x; ?>" class="form-control border-0 p-4 col-6 " value="<?php echo $rows1['answer']; ?>" />
                                    <div class="input-group-append">
                                        <?php
                                            if($rows['ans_id1'] != $rows1['aid'])
                                            {
                                            ?>
                                            <a href="delete_a.php?id_test=<?php echo $rows['id_test'];?>&aid=<?php echo $rows1['aid'];?>" class="btn btn-danger pt-2 px-4"> Delete </a>
                                            <?php
                                            }
                                            ?>
                                    </div>
                                </div>
                <?php
                    }}}
                ?>
                            </div>
                <?php
                    }
                ?>      
                        

                        <?php
                        }
                        ?>
                        <div class="form-row d-flex justify-content-center">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary px-4 mb-3">
                        </div>
                </form>
			</div>
	<?php
	
	require_once "../JavaScript.php"
	
	?>
	</body>
</html>

