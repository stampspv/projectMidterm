<?php
include '../connection.php';
echo "CALCEL<br>";
echo $_GET['userID']."<br>";
echo $_GET['TicketID']."<br>";
echo $_GET['EventID']."<br>";


$UserID =$_GET['userID'];
$TicketID =$_GET['TicketID'];
$EventID =$_GET['EventID'];
$Token = $_GET['Token'];

$result0 = mysqli_query($con, "SELECT * FROM `EventOrganizers`  WHERE ID = $EventID ");
$row0 = mysqli_fetch_assoc($result0);
$url = $row0['ShortURL'];
$EventName  = $row0['EventName'];
$result3 = mysqli_query($con, "SELECT * FROM `user`  WHERE ID = $UserID ");
$row3 = mysqli_fetch_assoc($result3);
$email = $row3['email'];
$name = $row3['Firstname'];

echo "<br>".$email ."      EMAIL<br>";
echo $name ."   NAME<br>";
echo $EventName ."  EVENT NAME<br>";
echo $url."   URL<br>";
echo "http://localhost/projectMidterm/eventview/".$url;

sendEmail($email,$name,$EventName,'ca',$url,$Token);


$sql = "DELETE FROM EventHandler WHERE OwnerID=$UserID AND TicketID=$TicketID AND CardToken='$Token'  ";

$result = mysqli_query($con, $sql);
if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'memberediter.php?yy=$zz&eid=$EventID'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?st=1'; ";
    echo "</script>";
}


 ?>
