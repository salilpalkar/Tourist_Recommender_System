<html>
    <head>
        <title>Result</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:500&display=swap");
            body{
                text-align:center;
            }
            table{
                width: 50%;
                height: 100px;
                margin-top: 30px;
                border-collapse: collapse;
                margin-left:auto;
                margin-right:auto;
            }
            table, th, td{
                font-family: "Montserrat", sans-serif;
                border: 1px solid black;
                padding: 10px;
            }
            /* tr:hover {background-color:#f5f5f5;} */
            tr:nth-child(even) {background-color: #f2f2f2;}
            tr{
                text-align: center;
            }
        </style>
    </head>
</html>

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "DBMSP2";

// @mysqli_connect("$db_host", "$db_username", "$db_pass") or die ("ERROR: Could not connect to MySQL");
// @mysqli_select_db("$db_name") or die ("ERROR: Database connection failed");

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connection established";
// echo $_POST["season"];
$season = $_POST["season"];
$query = "SELECT * FROM VENUE_DETAILS WHERE SEASON = '$season' OR SEASON = 'ALL'";

$result = $conn->query($query);

echo "<table><tr><th>VENUE</th><th>CITY</th><th>SEASON</th></tr>";
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>" . $row["SEASON"]. "</td></tr>";
    }
}
else{
    echo "No rows fetched";
}
?>