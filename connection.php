<?php
//$con= mysqli_connect("localhost","admin","jay23513","mydatabase") or die("Error: " . mysqli_error($con));
$mysql_server = "csku.science";
$mysql_user = "spppaper_pjmt";
$mysql_password = "0fFBvKgv";
$mysql_db = "spppaper_pjmt";
$con = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($con->connect_errno) {
	printf("Connection failed: %s \n", $con->connect_error);
	exit();
}
$con->set_charset("utf8");

function t()
{
    echo "pass";
}

function getOneValue($string)
{
    global $con;
    $data = $con->query($string)->fetch_assoc();
    $get  = $data['get'];
    // mysql_close();
    return $get;
}

function checkType($user)
{
    $type = getOneValue("SELECT `role` AS 'get' FROM `user` WHERE `Username` = '$user'");
    if ($type == "A") {
        return "Admin";
    } else if ($type == "M") {
        return "User";
    } else if ($type == "O") {
        return "Organizer";
    } else {
        return "NotLogin";
    }
}
