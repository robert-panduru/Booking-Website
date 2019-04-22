<?php

$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ofertanti");
$sql="SELECT Username, Password FROM ofertanti where Username = ? and Password = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $_GET['uname'], $_GET['psw']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $pass);
$stmt->fetch();
$stmt->close();

if (!isset($name) || trim($name) === '') {
    echo "Invalid username/password";
}
else {
    echo "<table>";
    echo "<tr>";
    echo "<th>Username</th>";
    echo "<td>" . $name . "</td>";
    echo "<th>Password</th>";
    echo "<td>" . $pass . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "Logged in succesfully";
}

mysqli_close($con);
?>