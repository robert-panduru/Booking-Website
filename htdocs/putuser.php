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

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


mysqli_close($con);
?>