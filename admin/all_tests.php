<!DOCTYPE HTML>
<html>
	<?php
	
	require_once "../head.php";

	?>

	<body>
	<div id="page">
			<?php
			
			require_once "../nav.php";
			?>

        <div class="container-fluid">
        <?php
			require_once "../Backend/connection_database.php";
            $count = 0;
				$q=" SELECT * FROM tests ";
				$query = mysqli_query($mysqli , $q);
			?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Test name</th>
                    <th scope="col">open</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while($rows = mysqli_fetch_array($query))
                    {
                ?>
                <tr>
                    <th scope="row"><?php echo ++$count; ?></th>
                    <td><?php echo $rows['test_name']; ?></td>
                    <td> 
                            <a href="test.php?id=<?php echo $rows['id_test'];?>" class="btn btn-primary px-4"> Open </a>
                    </td>
                    <td> 
                            <a href="delete.php?id=<?php echo $rows['id_test'];?>" class="btn btn-danger px-4"> Delete </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
	</div>

	<?php
	
	require_once "../JavaScript.php"
	
	?>
	</body>
</html>

