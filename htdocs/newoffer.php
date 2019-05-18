<?php
$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$id = $_GET['idOfertant'];
mysqli_select_db($con, "anunt");
// $sql = "INSERT INTO anunt(Titlu, Adresa, ID_ofertant, Pret) VALUES ('Sefie', 'Barosaneala', 1, 500);";
// $result = mysqli_query($con, $sql);
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
            }
            .login_panel {
                position: absolute;
                width: 40%;
                left: 30%;
                top: 35%;
            }
            .create_acc {
                position: absolute;
                top: 105%;
                left: 35%;
                width: 30%;
            }
        </style>
    </head>
<body background=\"http://bramptonist.com/wp-content/uploads/2017/03/sports-field.jpg\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
        <form action=\"addoffer.php\" method=\"post\" style=\"position:absolute; TOP:20%; LEFT:25%; WIDTH:50%\">
 
            <div class=\"form-group\">
                <input type=\"text\" class=\"form-control\" name=\"title\" placeholder=\"Nume anunt\">
            </div>
            <div class=\"form-group\">
                <input type=\"number\" class=\"form-control\" name=\"price\" placeholder=\"Pret\">
            </div>
            <div class=\"form-group\">
                <input type=\"date\" class=\"form-control\" name=\"start_date\" placeholder=\"Data inceput\">
            </div>
            <div class=\"form-group\">
                <input type=\"date\" class=\"form-control\" name=\"end_date\" placeholder=\"Data final\">
            </div>
            <div class=\"form-group\">
                <input type=\"text\" class=\"form-control\" name=\"adress\" placeholder=\"Locatie\">
            </div>
            <div class=\"form-group\">
                <input type=\"hidden\" class=\"form-control\" name=\"idOfertant\" value=\"" . $id . "\">
            </div>
          
            <button type=\"submit\" class=\"btn btn-primary\">Create new offer</button>
        
        </form>
    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
    </body>
</html>";
mysqli_close($con);
?>