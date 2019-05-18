<?php

$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$id = $_GET['id'];

$sql = "SELECT C.Titlu as Titlu, D.Nume AS Nume, D.Prenume AS Prenume, A.Comentariu AS Comm
FROM comentarii A, ofertanti B, anunt C, clienti D
WHERE A.ID_anunt = C.ID_anunt AND C.ID_ofertant = B.ID_ofertant AND A.ID_client = D.ID_client
AND B.ID_ofertant = " .$id;

$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo $row["Titlu"] . " " . $row["Nume"] . " " . $row["Prenume"] . " " . $row["Comm"] . "<br>";
	}

}
else {
	echo "Nu a fost listat nimic";
}

mysqli_close($con);
?>