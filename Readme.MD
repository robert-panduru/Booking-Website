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

$sql = "UPDATE ofertanti
SET Username = '$uname', Password = '$psw', Nume = '$nume',
Prenume = '$prenume', Email = '$email', Nr_telefon = '$tel'
WHERE

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


mysqli_close($con);
?>
