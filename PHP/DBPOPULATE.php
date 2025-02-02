<?php
$servername = "localhost:3308";
// $servername = "localhost";
$username = "root";
$password = "";

//Connecting to the database
$db="DBMSP2";
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)."<br>";
} 
else{
    echo "Connected to DBMSP2<br>";
}

if($conn->query("DELETE FROM `VENUE_DETAILS`")){
    echo "Table VENUE_DETAILS is empty.<br>";
}
else{
    echo "error deleting.".$conn->error;
}
if($conn->query("DELETE FROM `CITY_DETAILS`")){
    echo "Table CITY_DETAILS is empty.<br>";
}
else{
    echo "error deleting.".$conn->error;
}
if($conn->query("DELETE FROM `HOTEL_DETAILS`")){
    echo "Table HOTEL_DETAILS is empty.<br>";
}
else{
    echo "error deleting.".$conn->error;
}
if($conn->query("DELETE FROM `ACTIVITY_DETAILS`")){
    echo "Table ACTIVITY_DETAILS is empty.<br>";
}
else{
    echo "error deleting.".$conn->error;
}
$f_pointer1=fopen("../CSV/CITY_DETAILS_POPULATE.csv","r"); // file pointer

while(! feof($f_pointer1)){
$ar1=fgetcsv($f_pointer1);
$sql1="INSERT INTO `CITY_DETAILS`(`CITY`,`STATE`,`SECURITY`,`RATING`,`CUISINE`)values('$ar1[0]','$ar1[1]','$ar1[2]',$ar1[3],'$ar1[4]')";
if($conn->query($sql1)===TRUE){
    echo $sql1;
}
else{
    echo "Error in inserting.<br>".$conn->error;
}
echo "<br>";
}
echo "Table CITY_DETAILS populated<br>";


$f_pointer2=fopen("../CSV/VENUE_DETAILS_POPULATE.csv","r"); // file pointer

while(! feof($f_pointer2)){
$ar2=fgetcsv($f_pointer2);
$sql2="INSERT INTO `VENUE_DETAILS`(`VENUE`,`CITY`,`SEASON`)values('$ar2[0]','$ar2[1]','$ar2[2]')";
if($conn->query($sql2)===TRUE){
    echo $sql2;
}
else{
    echo "Error in inserting.<br>".$conn->error;
}
echo "<br>";
}
echo "Table VENUE_DETAILS populated<br>";


$f_pointer3=fopen("../CSV/HOTEL_DETAILS_POPULATE.csv","r"); // file pointer

while(! feof($f_pointer3)){
$ar3=fgetcsv($f_pointer3);
$sql3="INSERT INTO `HOTEL_DETAILS`(`HOTEL_ID`,`HOTEL_NAME`,`CITY`, `COST_PER_DAY`)values('$ar3[0]','$ar3[1]','$ar3[2]',$ar3[3])";
if($conn->query($sql3)===TRUE){
    echo $sql3;
}
else{
    echo "Error in inserting.<br>".$conn->error;
}
echo "<br>";
}
echo "Table HOTEL_DETAILS populated<br>";

$f_pointer4=fopen("../CSV/ACTIVITY_DETAILS_POPULATE.csv","r"); // file pointer

while(! feof($f_pointer4)){
$ar4=fgetcsv($f_pointer4);
$sql4="INSERT INTO `ACTIVITY_DETAILS`(`VENUE`,`ACTIVITY`,`RATING`,`PRICE`)values('$ar4[0]','$ar4[1]',$ar4[2],$ar4[3])";
if($conn->query($sql4)===TRUE){
    echo $sql4;
}
else{
    echo "Error in inserting.<br>".$conn->error;
}
echo "<br>";
}
echo "Table ACTIVIITY_DETAILS populated<br>";

// closing connection
$conn->close();
?>