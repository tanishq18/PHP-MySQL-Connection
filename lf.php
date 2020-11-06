<html>

<head>
<title>17BCE0343 CSE3002 LAB FAT</title>
</head>

<body>

<?php

$billno = $_POST["billno"];
$pencilr = $_POST["pencil"];
$penr = $_POST["pen"];
$eraserr = $_POST["eraser"];

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "labfat";
    $dbpass = "test";
    $db = "labfat";

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}
 
function CloseCon($conn)
{
    $conn -> close();
}

$conn = OpenCon();


$sql = "SELECT `Bill No.`, `Pencilstock`, `Pen in stock`, `Eraser in stock` FROM `database`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Bill No. " . $row["Bill No."]. " Pencilstock " . $row["Pencilstock"]. " Pen in stock " . $row["Pen in stock"]. " Eraser in stock " . $row["Eraser in stock"]. "<br>";
  }
} else {
  echo "0 results";
}

$billno = $_POST["billno"];
$pencilr = $_POST["pencil"];
$penr = $_POST["pen"];
$eraserr = $_POST["eraser"];


$sql = "INSERT INTO `database`(`Bill No.`, `Pencilstock`, `Pen in stock`, `Eraser in stock`) VALUES ($billno,$pencilr,$penr,$eraserr)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

CloseCon($conn);

//how to get last row?

?> 

</body>

</html>