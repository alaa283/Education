<?php
require_once "../Backend/connection_database.php";
$id_test = $_GET['id_test'];
$qid = $_GET['qid'];
$result1 = mysqli_query($mysqli, "DELETE FROM questions WHERE id_test=$id_test AND qid = $qid");
$result2 = mysqli_query($mysqli, "DELETE FROM answers WHERE id_test=$id_test AND ans_id = $qid");

header("Location:test.php?id=$id_test");
?>