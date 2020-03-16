<html>
    <head>
        <title>Result</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:500&display=swap");
            body{
                text-align:center;
                font-family: "Montserrat", sans-serif;
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

//establish connection to database
$conn = new mysqli($servername, $username, $password, $db_name);

if($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["season"])){
    $seasons = $_POST["season"];
    $seasons_string  = "";
    foreach($seasons as $temp){
        $seasons_string = "'".$temp."',".$seasons_string;
    }
    $seasons_string = strtolower(rtrim($seasons_string, ","));
}

if(isset($_POST["city"])){
    $cities = $_POST["city"];
    $cities_string  = "";
    if(isset($cities)){
        foreach($cities as $temp){
            $cities_string = "'".$temp."',".$cities_string;
        }
        $cities_string = strtolower(rtrim($cities_string, ","));
    }
}

if(isset($_POST["state"])){
    $states = $_POST["state"];
    $states_string  = "";
    if(isset($states)){
        foreach($states as $temp){
            $states_string = "'".$temp."',".$states_string;
        }
        $states_string = strtolower(rtrim($states_string, ","));
    }
}

if(isset($_POST["hotel-price"])){
    echo "hotel price = " . $_POST["hotel-price"];
}

$query = "SELECT V.VENUE, V.CITY, V.SEASON, C.STATE FROM 
            VENUE_DETAILS V
            JOIN
            CITY_DETAILS C
            ON V.CITY = C.CITY";

$flag = 0;
if(isset($_POST["season"]) && strpos($seasons_string, "all") == false){
    $query = $query." WHERE SEASON IN ($seasons_string)";
    $flag = 1;
}
if(isset($_POST["state"]) && strpos($states_string, "all") == false){
    if($flag == 0){
        $query = $query." WHERE C.STATE IN ($states_string)";
        $flag = 1;
    }
    else{
        $query = $query." AND C.STATE IN ($states_string)";
    }
}
if(isset($_POST["city"]) && strpos($cities_string, "all") == false){
    if($flag == 0){
        $query = $query." WHERE V.CITY IN ($cities_string)";
        $flag = 1;
    }
    else{
        $query = $query." AND V.CITY IN ($cities_string)";
    }
}
$result = $conn->query($query);

echo "<table><tr><th>VENUE</th><th>CITY</th><th>SEASON</th><th>STATE</th></tr>";
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>" . $row["SEASON"]. "</td><td>". $row["STATE"]. "</td></tr>";
    }
}
else{
    echo "No rows fetched";
}


?>