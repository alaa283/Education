<?php
require_once "../Backend/connection_database.php";
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM tests WHERE id_test=$id");
$result1 = mysqli_query($mysqli, "DELETE FROM questions WHERE id_test=$id");
$result2 = mysqli_query($mysqli, "DELETE FROM answers WHERE id_test=$id");

header("Location:all_tests.php");
?>