<?php
$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$uname = $_POST['uname'];
$psw = $_POST['psw'];
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$sql = "INSERT INTO ofertanti (Username, Password, Nume, Prenume, Email, Nr_telefon)
VALUES ('$uname', '$psw', '$nume', '$prenume', '$email', '$tel')";

$check = "SELECT * from ofertanti where Username = '$uname'";
$exists = mysqli_query($con, $check);

if ($exists->num_rows  == 0) {
	if (mysqli_query($con, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}
else {
	echo "Username already in use";
}


mysqli_close($con);
?>