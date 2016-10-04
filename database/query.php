<?php

include ( "db_connect.php" );

//CREATE DATABASE
$sql = "INSERT INTO contacts (firstname, lastname, phone)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

 ?>