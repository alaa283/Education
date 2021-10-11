<!DOCTYPE html>
<?php

require_once "./head.php";

?>
<body>
    <div id="page">
		<?php
		
		require_once "./nav.php";


		?>

<?php

session_start();
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
            $checked = $rows['ans_id1'] == $selected[$i];

            // echo $selected[$i]."<br>";
            // echo $checked."<br>";
            if($checked)
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

    .check 
    {
        display: inline-block;
        transform: rotate(45deg);
        height: 24px;
        width: 12px;
        border-bottom: 4px solid #78b13f;
        border-right: 4px solid #78b13f;
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
                        // echo $selected[$y]."<br>";
                            $checked1 = $rows1['ans_id1'];
                            if($checked1 == $rows2['aid'])
                            {
?>
                    <div class="card-body">
                       <span class="check" style="margin-left:10px;margin-right:10px"></span>
                       <span style="color: green;"> <?php echo $rows2['answer']; ?></span>
                    <div>
                        
<?php
                            }
                            else if($selected[$y]== $rows2['aid'])
                            {
                               ?>
                                <div class="card-body">
                                <input type="radio" value="<?php $rows2['aid']; ?>">
                                    <span style="color:red"> <?php echo $rows2['answer']; ?></span>
                                <div>
                               <?php
                            //    break; 
                            }  
                            else
                            {
?>
                    <div class="card-body">
                        <input type="radio" value="<?php $rows2['aid']; ?>">
                        <?php echo $rows2['answer']; ?>
                    <div>
<?php
                            }
                            $z++;
                        // }
                        // echo $y."<br>";
                    }
                }?>
                <br>
                <?php
                
        }
?>

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