<!DOCTYPE html>
<?php

require_once "./head.php";

?>
<body>
    <div id="page">
		<?php
		
		require_once "./nav.php";


		?>
        	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<?php

require_once "./Backend/connection_database.php";

if(isset($_POST['submit']))
{
    if(!empty($_POST['quizcheck']))
    {
        $count = count($_POST['quizcheck']);
        ?>

        <div class="d-flex justify-content-center">

        <h3 class="text-center">Out of 10, you have selected<?php echo " ".$count." "; ?> options</h3>

        </div>

        <?php

        // echo "Out of 10, you have selected ". $count . " options";

        $result = 0;
        $i = 1;
        
        global $selected;


        $selected = $_POST['quizcheck'];
        // print_r ($selected);    
        $q=" SELECT * FROM questions";
        $query = mysqli_query($mysqli , $q);

        while($rows = mysqli_fetch_array($query))

        {
            // echo $selected[$i]."<br>";
            $checked = $rows['ans_id1'] ;

            // echo $selected[$i]."<br>";
            // echo $checked."<br>";
            if($selected[$i] == null)
                {
                    $selected[$i] = 0 ;
                }
            else if($checked == $selected[$i])
            {
                $result++;
            }

            $i++;
        }

        ?>

        <div class="d-flex justify-content-center">
<style>
    #result
    {
        border-style: solid;
        background-color:blue;
        color:white;
        border:none;
        margin-left:10px;
        padding-right:5px;
        border-radius:5px;
    }
</style>
        <h3 class="text-center">Total Score is<span id="result"><?php echo " ".$result; ?></span></h3>

        </div>

        <?php

?>
<div style="margin-left:20rem">
<?php
global $z , $q3 , $query3;

$z = 1;
// print_r($selected)."<br>";
for($y = 1 ; $y <= 10 ; $y++)
{
    $q1=" SELECT * FROM questions WHERE qid = $y ";
    $query1 = mysqli_query($mysqli , $q1);
    
    while($rows1 = mysqli_fetch_array($query1))
    {
        ?>
                    <div class="card">
                        <h4 class="card-header" style="font-weight: bold;color:green"><?php echo $rows1['question']; ?></h4>
                        
                        <?php
                    $q2 = " SELECT * FROM answers WHERE ans_id = $y ";
                    $query2 = mysqli_query($mysqli , $q2);
                   
                    
                    while($rows2 = mysqli_fetch_array($query2))
                    {
                            $checked1 = $rows1['ans_id1'];
                            switch ($checked1)
                            {
                                case $checked1 == $rows2['aid'] && $selected[$y] == $rows2['aid']:
?>

                    <div class="card-body">
                       <span class="" style="margin-right:5px;color:#78b13f"><i class="fas fa-user-check"></i></span>
                       <span style="color: #78b13f;font-weight:600"> <?php echo $rows2['answer']; ?></span>
                    <div>
                        

                   
<?php
                                break;
                                case $checked1 == $rows2['aid'] && $selected[$y] != $rows2['aid']:
                                    ?>
                                    <div class="card-body">
                                        <span style="margin-right:5px;color:green" ><i class="fas fa-check"></i></span>
                                        <span style="color: green;font-weight:600"> <?php echo $rows2['answer']; ?></span>
                                    <div>
                                    <?php
                                    break;
                                    case $checked1 != $rows2['aid'] && $selected[$y]== $rows2['aid']:
                                    ?>
                                    <div class="card-body">
                                        <span class="" style="margin-right:5px;color:red"> <i class="fas fa-times"></i></span>
                                        <span style="color: red;font-weight:600"> <?php echo $rows2['answer']; ?></span>
                                    <div>

                                    <?php
                                    break;
                                default:
                                ?>
                                    <div class="card-body">
                                        <span class="" style="margin-right:5px;color:#bcb4ff;"><i class="far fa-hand-point-right"></i></span>
                                        <span style="color:#bcb4ff;font-weight:600"> <?php echo $rows2['answer']; ?></span>
                                    <div>
                                <?php
                                break;
                            } 
                    }
                }?>
                <br>
                <?php
                
        }
?>
<?php
    }

    else
    {
        ?>
        <h3 class="text-center">Please Solve Exam . You not Solve this</h3>
        <h3 class="text-center">Total Score is <span>0</span></h3>
        <?php
    }
}
?>
</div>
    </div>

    <?php
	
	require_once "./JavaScript.php";
	
	?>

</body>
</html>