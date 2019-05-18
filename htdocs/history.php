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


echo "<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=yes\">
    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
    <style type=\"text/css\">
        /*// Small devices (landscape phones, 576px and up)*/
        @media (min-width: 576px) { ... }
        /*// Medium devices (tablets, 768px and up)*/
        @media (min-width: 768px) { ... }
        /*// Large devices (desktops, 992px and up)*/
        @media (min-width: 992px) { ... }
        /*// Extra large devices (large desktops, 1200px and up)*/
        @media (min-width: 1200px) { ... }
        /*// No media query necessary for xs breakpoint as it's effectively `@media (min-width: 0) { ... }`*/
        @include media-breakpoint-up(sm) { ... }
        @include media-breakpoint-up(md) { ... }
        @include media-breakpoint-up(lg) { ... }
        @include media-breakpoint-up(xl) { ... }
        /*// Example: Hide starting at `min-width: 0`, and then show at the `sm` breakpoint*/
        .custom-class {
          display: none;
        }
        @include media-breakpoint-up(sm) {
          .custom-class {
            display: block;
          }
        .info_panel {
            position: absolute;
            width: 40%;
            left: 10%;
            top: 5%;
        }
    </style>
    </div>
</head>
<body background=\"http://bramptonist.com/wp-content/uploads/2017/03/sports-field.jpg\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
";

$review_number = 0;
if ($result->num_rows > 0) {
	echo "<table class=\"table table-hover\" style=\"position:absolute; TOP:20%; LEFT:10%; WIDTH:80%\">
          <thead class=\"thead-dark\">
            <tr>
              <th scope=\"col\">#</th>
              <th scope=\"col\">Titlu anunt</th>
              <th scope=\"col\">Nume</th>
              <th scope=\"col\">Prenume</th>
              <th scope=\"col\">Recenzie</th>
            </tr>
          </thead>
          <tbody>";
	while($row = $result->fetch_assoc()) {
		        echo "<tr class=\"table-primary\">
		              <th scope=\"row\">$review_number</th>
		              <td>" . $row["Titlu"] . "</td>
		              <td>" . $row["Nume"] . "</td>
		              <td>" . $row["Prenume"] . "</td>
		              <td>" . $row["Comm"] . "</td>
		              </tr>";
        $review_number++;
	}
	echo "</tbody>
          </table>";

}
else {
	echo "<div class=\"alert alert-danger\" role=\"alert\"  style=\"position:absolute; TOP:40%; LEFT:33%; WIDTH:34%;\">
      There are no reviews to be shown.
      </div>";
}

mysqli_close($con);
?>
