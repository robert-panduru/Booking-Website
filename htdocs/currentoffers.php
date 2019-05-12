<?php
$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$id = $_GET['idOfertant'];

mysqli_select_db($con, "anunt");
$sql = "SELECT ID_anunt, Titlu, Adresa, Pret, Inceput, Final, ID_ofertant
FROM anunt
WHERE ID_ofertant = " . $id;

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
<body>
";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\" style=\"margin-top:10px;\">ID anunt: " . $row["ID_anunt"] . "</li>
            <li class=\"list-group-item\" style=\"margin-top:10px;\">Titlu:  " . $row["Titlu"] . "</li>
            <li class=\"list-group-item\" style=\"margin-top:10px;\">Adresa:  " . $row["Adresa"] . "</li>
            <li class=\"list-group-item\" style=\"margin-top:10px;\">Pret:  " . $row["Pret"] . "</li>
            <li class=\"list-group-item\" style=\"margin-top:10px;\">Incepe la data de:  " . $row["Inceput"] . "</li>
            <li class=\"list-group-item\" style=\"margin-top:10px;\">Se termina la data de:  " . $row["Final"] . "</li>
    </ul><br>";
    }
}

echo "</body>
    </html>";

mysqli_close($con);
?>
