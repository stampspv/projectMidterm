<?php
include 'header.php';
$ticketid = $_GET["ticketid"];
$token   = $_GET["token"];
$date    = date("Y-m-d H:i:s");
$usernameID   = ownerID($username);

store_log($username,"ซื้อบัตร token: ".$token);
if (empty($_GET)) {
    systemLog("$username พยายามจะซ์้อบัตรโดยไม่ใส่ URL ให้ถูกต้อง");
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {

    $sql    = "INSERT INTO `EventHandler` (`CardID`, `CardStatus`, `TicketID`, `CardSBuyTime`, `CardToken`, `OwnerID`) VALUES ('','0','$ticketid','$date','$token','$usernameID')";
    $result = mysqli_query($con, $sql);
    $sql_update    = "UPDATE `EventTicket` SET `TicketNow`=TicketNow+1 WHERE `TicketID` = '$ticketid'";
    $result_update = mysqli_query($con, $sql_update);
    if ($result) {
        echo "<script type='text/javascript'>";
        echo "window.location = 'payment.php?token=$token'; ";
        echo "</script>";
    } else {
        systemLog("$username ไม่สามารถซื้อบัตรเลขที่ $ticketid ได้");
        echo "<script type='text/javascript'>";
        echo "window.location = 'index.php'; ";
        echo "</script>";}
}
