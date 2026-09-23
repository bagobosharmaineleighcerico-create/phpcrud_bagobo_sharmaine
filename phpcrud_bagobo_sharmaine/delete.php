<?php

include 'database.php';

$Employee_id = $_GET['id'];

$sql = "DELETE FROM employee
        WHERE Employee_id='$Employee_id'";

if ($conn->query($sql) === TRUE) {

    header("Location: index.php");
    exit();

} else {

    echo "Error: " . $conn->error;

}

?>