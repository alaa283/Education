<?php
require_once "../Backend/connection_database.php";
$id_test = $_GET['id_test'];
$aid = $_GET['aid'];
$result = mysqli_query($mysqli, "DELETE FROM answers WHERE id_test=$id_test AND aid = $aid");

header("Location:test.php?id=$id_test");
?>