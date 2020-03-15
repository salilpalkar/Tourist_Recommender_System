<?php
$servername = "localhost:3308";
$username = "root";
$password = "";

// Creating a connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="DROP DATABASE DBMSP2";
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully with the name newDB<br>";
} else {
    echo "Error dropping database: " . $conn->error."<br>";
}
//Creating a database named newDB
$sql = "CREATE DATABASE DBMSP2";
if ($conn->query($sql) === TRUE) {
    echo "Database CREATED successfully with the name newDB<br>";
} else {
    echo "Error creating database: " . $conn->error."<br>";
}

//Connecting to the database
$db="DBMSP2";
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)."<br>";
} 
else{
    echo "Connected to newDB<br>";
}
$sql="CREATE TABLE `VENUE_DETAILS` (
    `VENUE` VARCHAR(20) NOT NULL ,
     `CITY` VARCHAR(20) NOT NULL ,
     `SEASON` VARCHAR(20) NOT NULL,
       PRIMARY KEY(`VENUE`) )ENGINE = InnoDB;";
if($conn->query($sql)===TRUE){
    echo "succesful creation of venue_details<br>";
}
else{
    echo "Error creating VENUE_DETAILS".$conn->error."<br>";
}

$sql="CREATE TABLE `CITY_DETAILS` (
     `CITY` VARCHAR(20) NOT NULL ,
     `STATE` VARCHAR(20) NOT NULL,
       PRIMARY KEY(`CITY`) )ENGINE = InnoDB;";
if($conn->query($sql)===TRUE){
    echo "succesful creation of CITY_DETAILS<br>";
}
else{
    echo "Error creating CITY_DETAILS".$conn->error."<br>";
}

$sql="ALTER TABLE `VENUE_DETAILS` ADD CONSTRAINT `VENUE_DETAILS_FK_CITY` 
      FOREIGN KEY (`CITY`) REFERENCES `CITY_DETAILS`(`CITY`)
       ON DELETE RESTRICT 
       ON UPDATE RESTRICT;";
if($conn->query($sql)===TRUE){
        echo "VENUE_DETAILS foreign key added<br>";
    }
    else{
        echo "VENUE_DETAILS foreign key not added".$conn->error."<br>";
    }
// closing connection
$conn->close();
?>