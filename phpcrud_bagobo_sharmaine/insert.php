<?php

include 'database.php';

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];

$sql = "INSERT INTO employee (lastname, firstname)
        VALUES ('$lastname', '$firstname')";

if ($conn->query($sql) === TRUE) {

    header("Location: index.php");
    exit();

} else {

    echo "Error: " . $conn->error;

}

?>