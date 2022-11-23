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

    require_once "./Backend/connection_database.php";
    $id = $_GET['id']; 

    if(isset($_POST['submit']))
    {
        if(!empty($_POST['quizcheck']))
        {
            $count = count($_POST['quizcheck']);
            ?>

            <div class="d-flex justify-content-center">

            <h3 class="text-center">Out of 5, you have selected<?php echo " ".$count." "; ?> options</h3>

            </div>

            <?php

            // echo "Out of 10, you have selected ". $count . " options";

            $result = 0;
            // $i = 1;
            global $selected;


            $selected = $_POST['quizcheck'];
            $q=" SELECT * FROM questions WHERE id_test = $id ";
            $query = mysqli_query($mysqli , $q);

            $q4=" SELECT *  FROM answers  WHERE id_test = $id";
			$query4 = mysqli_query($mysqli , $q4);

            while($rows4 = mysqli_fetch_array($query4))
            {
                
                $qqq = $rows4['ans_id'];
                break;
            }
            // echo $qqq;
            $i = $qqq;
            // echo $i;
            while($rows = mysqli_fetch_array($query))

            {
                $checked = $rows['ans_id1'] ;

                // echo $qqq;
                // echo $selected[$i];
                // print_r($selected)."<br>";
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

<div class="container">
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
<?php
    global $z , $q3 , $query3;

    $z = 1;
    // echo $i;
    // print_r($selected)."<br>";
    for( $y = 1 ; $y <= 5 ; $y++)
    {
        $q1=" SELECT * FROM questions WHERE aaa = $y AND id_test = $id ";
        $query1 = mysqli_query($mysqli , $q1);
        
        while($rows1 = mysqli_fetch_array($query1))
        {?>
        <div class="card">
            <h4 class="card-header"><?php echo $rows1['question']; ?></h4>
        </div>
    <?php
        $q2 = " SELECT * FROM answers WHERE aaa_id = $y AND id_test = $id ";
        $query2 = mysqli_query($mysqli , $q2);
                        
        while($rows2 = mysqli_fetch_array($query2))
            {
                $checked1 = $rows1['ans_id1'];
                
                // echo $selected[$qqq];
                
                switch ($checked1)
                    { 
                    case $checked1 == $rows2['aid'] && $selected[$qqq] == $rows2['aid']:
                       
    ?>
                    <div class="card-body">
                       <span class="" style="color:#78b13f"><i class="fas fa-user-check"></i></span>
                       <span style="font-weight:600"> <?php echo $rows2['answer']; ?></span>
                    </div>
                <?php
                    break;
                    case $checked1 == $rows2['aid'] && $selected[$qqq] != $rows2['aid']:
                ?>
                    <div class="card-body">
                        <span style="color:green" ><i class="fas fa-check"></i></span>
                        <span style="color: green;font-weight:600"> <?php echo $rows2['answer']; ?></span>
                    </div>
                <?php
                    break;
                    case $checked1 != $rows2['aid'] && $selected[$qqq]== $rows2['aid']:
                ?>
                <div class="card-body">
                    <span class="" style="color:red"> <i class="fas fa-times"></i></span>
                    <span style="color: red;font-weight:600"> <?php echo $rows2['answer']; ?></span>
                </div>

                <?php
                    break;
                    default:
                ?>
                <div class="card-body">
                    <span class="text-primary" ><i class="far fa-hand-point-right"></i></span>
                    <span class="text-primary" style="font-weight:600"> <?php echo $rows2['answer']; ?></span>
                </div>
        

        <?php 
            break;
        }      
        
        // echo $qqq.'<br>';
        }
    // echo $selected[$qqq].'<br>';  
    // $qqq++;
}}}
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
</body>
</html>