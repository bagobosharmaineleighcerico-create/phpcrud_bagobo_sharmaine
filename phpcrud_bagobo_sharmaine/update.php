<?php

include 'database.php';

$Employee_id = $_POST['Employee_id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];

$sql = "UPDATE employee
        SET lastname='$lastname',
            firstname='$firstname'
        WHERE Employee_id='$Employee_id'";

if ($conn->query($sql) === TRUE) {

    header("Location: index.php");
    exit();

} else {

    echo "Error: " . $conn->error;

}

?>