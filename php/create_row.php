<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['name']) && isset($_POST['className']) && isset($_POST['classNumber'])) {
 
    $name = $_POST['name'];
    $className = $_POST['className'];
    $classNumber = $_POST['classNumber'];
    $detail = $_POST['detail'];
    $location = $_POST['location'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $url = $_POST['url'];
	
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO ECHO(name, className, classNumber, details, location, lat, lng, pictureUrl) VALUES('$name', '$className', '$classNumber', '$detail', '$location', '$lat', '$long', '$url')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>