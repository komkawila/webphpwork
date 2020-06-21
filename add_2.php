<?php
$A_Vrms = $_GET['A_Vrms'];
$B_Vrms = $_GET['B_Vrms'];
$C_Vrms = $_GET['C_Vrms'];
$A_Irms = $_GET['A_Irms'];
$B_Irms = $_GET['B_Irms'];
$C_Irms = $_GET['C_Irms'];
$A_VA = $_GET['A_VA'];
$B_VA = $_GET['B_VA'];
$C_VA = $_GET['C_VA'];
$A_VAR = $_GET['A_VAR'];
$B_VAR = $_GET['B_VAR'];
$C_VAR = $_GET['C_VAR'];
$A_WATT = $_GET['A_WATT'];
$B_WATT = $_GET['B_WATT'];
$C_WATT = $_GET['C_WATT'];
$A_PF = $_GET['A_PF'];
$B_PF = $_GET['B_PF'];
$C_PF = $_GET['C_PF'];
$A_KWH = $_GET['A_KWH'];
$B_KWH = $_GET['B_KWH'];
$C_KWH = $_GET['C_KWH'];
$F_Hz = $_GET['F_Hz'];
$DATETIME = $_GET['DATETIME'];

$servername = "localhost";
$username = "id13605084_meter";
$password = "Frank310740@s";
$dbname = "id13605084_project";

//Create connention
$conn = new mysqli($servername, $username, $password, $dbname);
date_default_timezone_set("Asia/Bangkok");

//Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO meter set 
DATETIME='".$DATETIME."', 
F_Hz='".$F_Hz."',
C_KWH='".$C_KWH."', 
B_KWH='".$B_KWH."', 
A_KWH='".$A_KWH."', 
C_PF='".$C_PF."', 
B_PF='".$B_PF."', 
A_PF='".$A_PF."', 
C_VAR='".$C_VAR."', 
B_VAR='".$B_VAR."', 
A_VAR='".$A_VAR."', 
C_WATT='".$C_WATT."', 
B_WATT='".$B_WATT."', 
A_WATT='".$A_WATT."', 
C_VA='".$C_VA."', 
B_VA='".$B_VA."', 
A_VA='".$A_VA."', 
C_Irms='".$C_Irms."', 
B_Irms='".$B_Irms."', 
A_Irms='".$A_Irms."', 
C_Vrms='".$C_Vrms."', 
B_Vrms='".$B_Vrms."', 
A_Vrms='".$A_Vrms."'";

if ($conn->query($sql) === TRUE){
	echo "save OK";
}else{
	echo "Error" . $sql . "<br>". $conn->error;
}

$conn->close();
?>