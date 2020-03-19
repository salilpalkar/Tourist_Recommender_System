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


$servername = "localhost:3308";
// $servername = "localhost";
$username = "root";
$password = "";
$db_name = "DBMSP2";

//establish connection to database
$conn = new mysqli($servername, $username, $password, $db_name);

if($conn -> connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["preset-1-button"])){
    $query="SELECT V.VENUE, V.CITY, V.SEASON,H.HOTEL_NAME,H.COST_PER_DAY
        FROM VENUE_DETAILS V, HOTEL_DETAILS H
        WHERE V.CITY = H.CITY AND H.COST_PER_DAY <= 3000;" ;
    $query=$query.";";
    $result = $conn->query($query);
    // echo $query;
    echo "<table><tr><th>VENUE</th><th>CITY</th><th>SEASON</th><th>HOTEL</th><th>COST PER DAY</th></tr>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>" . $row["SEASON"]. "</td><td>". $row["HOTEL_NAME"]. "</td><td>". $row["COST_PER_DAY"]."</td></tr>";
        }
    }
    else{
        echo "No rows fetched".$conn->error;
    }
    
}

elseif(isset($_POST["preset-2-button"])){
    $query="SELECT V.VENUE, V.CITY, V.SEASON, C.CUISINE
        FROM VENUE_DETAILS V, CITY_DETAILS C
        WHERE V.CITY = C.CITY AND C.CUISINE IN ('PETHA','THEPLA','BASUNDI','VADA PAV','DHOKLA','UTTAPUM','CHOLE BHARTURE');" ;
    $query=$query.";";
    $result = $conn->query($query);
    // echo $query;
    echo "<table><tr><th>VENUE</th><th>CITY</th><th>SEASON</th><th>CUISINE</th></tr>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>" . $row["SEASON"]. "</td><td>". $row["CUISINE"]. "</td></tr>";
        }
    }
    else{
        echo "No rows fetched".$conn->error;
    }
    
}

elseif(isset($_POST["preset-3-button"])){
    $query="SELECT V.VENUE, V.CITY, V.SEASON, A.ACTIVITY, A.PRICE 
        FROM VENUE_DETAILS V, ACTIVITY_DETAILS A
        WHERE V.VENUE = A.VENUE AND A.ACTIVITY IN ('SAFARI','SCUBA DIVING','SURFING','TREKKING','CAMPING');" ;
    $query=$query.";";
    $result = $conn->query($query);
    // echo $query;
    echo "<table><tr><th>VENUE</th><th>CITY</th><th>SEASON</th><th>ACTIVITY</th><th>PRICE</th></tr>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>" . $row["SEASON"]. "</td><td>". $row["ACTIVITY"]. "</td><td>". $row["PRICE"]."</td></tr>";
        }
    }
    else{
        echo "No rows fetched".$conn->error;
    }
    
}

elseif(isset($_POST["preset-4-button"])){
    $query="SELECT V.VENUE, V.CITY, A.ACTIVITY, A.PRICE 
        FROM VENUE_DETAILS V, ACTIVITY_DETAILS A
        WHERE V.VENUE = A.VENUE AND V.SEASON IN ('SUMMER','ALL') AND A.ACTIVITY IN ('SCUBA DIVING','SURFING','BOATING','TREKKING');" ;
    $query=$query.";";
    $result = $conn->query($query);
    // echo $query;
    echo "<table><tr><th>VENUE</th><th>CITY</th><th>ACTIVITY</th><th>PRICE</th></tr>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>". $row["ACTIVITY"]. "</<td><td>". $row["PRICE"]."</td></tr>";
        }
    }
    else{
        echo "No rows fetched".$conn->error;
    }
    
}

elseif(isset($_POST["custom-selection"])){
    if(isset($_POST["season"])){
        $seasons = $_POST["season"];
        $seasons_string  = "";
        foreach($seasons as $temp){
            $seasons_string = "'".$temp."',".$seasons_string;
        }
        $seasons_string = strtoupper(rtrim($seasons_string, ","));
    }

    if(isset($_POST["state"])){
        $states = $_POST["state"];
        $states_string  = "";
        if(isset($states)){
            foreach($states as $temp){
                $states_string = "'".$temp."',".$states_string;
            }
            $states_string = strtoupper(rtrim($states_string, ","));
        }
    }

    if(isset($_POST["cuisine"])){
        $foods = $_POST["cuisine"];
        $foods_string  = "";
        if(isset($foods)){
            foreach($foods as $temp){
                $foods_string = "'".$temp."',".$foods_string;
            }
            $foods_string = strtoupper(rtrim($foods_string, ","));
            echo "$foods_string";
        }
    }

    if(isset($_POST["activity"])){
        $activities = $_POST["activity"];
        $activities_string  = "";
        if(isset($activities)){
            foreach($activities as $temp){
                $activities_string = "'".$temp."',".$activities_string;
            }
            $activities_string = strtoupper(rtrim($activities_string, ","));
        }
    }

    if(isset($_POST["hotel-price"])){
        $hotels=$_POST["hotel-price"];
        echo "hotel price = " . $_POST["hotel-price"];
    }

    // $query = "SELECT V.VENUE, V.CITY, V.SEASON, C.STATE FROM 
    //             VENUE_DETAILS V
    //             JOIN
    //             CITY_DETAILS C
    //             ON V.CITY = C.CITY";

    $query="SELECT V.VENUE, V.CITY, V.SEASON, C.STATE,C.SECURITY,C.RATING,C.CUISINE,H.HOTEL_ID,H.HOTEL_NAME,H.COST_PER_DAY,A.ACTIVITY,A.RATING,A.PRICE
            FROM 
            VENUE_DETAILS V JOIN CITY_DETAILS C JOIN HOTEL_DETAILS H JOIN ACTIVITY_DETAILS A
            ON V.CITY = C.CITY AND H.CITY=C.CITY AND A.VENUE=V.VENUE" ;

    $flag = 0;
    if(isset($_POST["season"]) && strpos($seasons_string, "ALL") == false){
        $query = $query." WHERE SEASON IN ($seasons_string)";
        $flag = 1;
    }
    if(isset($_POST["state"]) && strpos($states_string, "ALL") == false){
        if($flag == 0){
            $query = $query." WHERE C.STATE IN ($states_string)";
            $flag = 1;
        }
        else{
            $query = $query." AND C.STATE IN ($states_string)";
        }
    }
    if(isset($_POST["cuisine"]) && strpos($foods_string, "ALL") == false){
        if($flag == 0){
            $query = $query." WHERE C.CUISINE IN ($foods_string)";
            $flag = 1;
        }
        else{
            $query = $query." AND C.CUISINE IN ($foods_string)";
        }
    }
    if(isset($_POST["activity"]) && strpos($activities_string, "ALL") == false){
        if($flag == 0){
            $query = $query." WHERE A.ACTIVITY IN ($activities_string)";
            $flag = 1;
        }
        else{
            $query = $query." AND A.ACTIVITY IN ($activities_string)";
        }
    }
    if(isset($_POST["hotel-price"])){
        if($flag == 0){
            $query = $query." WHERE H.COST_PER_DAY<".$hotels;
            $flag = 1;
        }
        else{
            $query = $query." AND H.COST_PER_DAY<".$hotels;
        }
    }
    $query=$query.";";
    $result = $conn->query($query);
    echo $query;
    echo "<table><tr><th>VENUE</th><th>CITY</th><th>SEASON</th><th>STATE</th><th>SECURITY</th><th>CITY RATING</th><th>CUISINE</th><th>HOTEL ID</th><th>HOTEL NAME</th><th>COST PER DAY</th><th>ACTIVITY</th><th>ACTIVITY RATING</th><th>ACTIVITY PRICE</th></tr>";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["VENUE"]. " </td><td>" . $row["CITY"]. "</td><td>" . $row["SEASON"]. "</td><td>". $row["STATE"]. "</td><td>". $row["SECURITY"]."</td><td>". $row["RATING"]. "</td><td>". $row["CUISINE"]. "</td><td>". $row["HOTEL_ID"]. "</td><td>". $row["HOTEL_NAME"]. "</td><td>". $row["COST_PER_DAY"]. "</td><td>". $row["ACTIVITY"]. "</td><td>". $row["RATING"]. "</td><td>". $row["PRICE"]. "</td></tr>";
        }
    }
    else{
        echo "No rows fetched".$conn->error;
    }
}

?>