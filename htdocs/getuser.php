<?php
session_start();
$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ofertanti");
$sql="SELECT Username, Password, Nume, Prenume, Email, Nr_telefon, Scor, ID_ofertant FROM ofertanti where Username = ? and Password = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $_GET['uname'], $_GET['psw']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $pass, $nume, $prenume, $email, $nr_telefon, $scor, $id);
$stmt->fetch();
$stmt->close();

if (!isset($name) || trim($name) === '') {
    echo "<!DOCTYPE html>
	<head>
		<!-- Required meta tags -->
    	<meta charset=\"utf-\">
    	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

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
				width: 40%;
				position: absolute;
				left: 30%;
				top: 50%;
			}
			.login_button {
				margin-left: 45%;
				margin-width: 10%;
			}

			#login {
				color: red;
			}
    	</style>
	</head>
	<body background=\"http://bramptonist.com/wp-content/uploads/2017/03/sports-field.jpg\">
		<img src=\"/img/logo.png\" style=\"position:absolute; TOP:20%; LEFT:36%; border:0\" >
		<div id = \"login\">Invalid username/password</div>
		<form action=\"/getuser.php\">
			<div class=\"login_panel\">
				<div class=\"form-group\">
		    		<!-- <label class=\"col-sm-1 col-form-label\">Username</label> -->
		   			<div class=\"col\">
		     			<input type=\"text\" class=\"form-control\" placeholder=\"Enter Username\" name=\"uname\" required=\"\">
		    		</div>
		  		</div>
				<div class=\"form-group\">
				    <!-- <label class=\"col-sm-1 col-form-label\">Password</label> -->
				    <div class=\"col\">
				    	<input type=\"password\" class=\"form-control\" placeholder=\"Password\" name=\"psw\" required=\"\">
				    </div>
				</div>
				
				<button type=\"submit\" class=\"btn btn-primary login_button\">Login</button>
			</div>
		</form>
		<div style=\"position:absolute; TOP:70%; LEFT:45%; border:0; color:red\"><a href=\"signup.html\">Sign up</a></div>
	<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
	<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
	<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
	</body>
</html>";
}
else {
	echo "
    <!DOCTYPE html>
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


    <div class=\"jumbotron\" style=\"position: absolute; width: 40%; height: 85%; left: 7%; top:8%;\">
      <h1 class=\"display-3\">Profile</h1>
      <p class=\"lead\">The following information is publicly displayed for all potential clients and
      it will be used as primary mean of contact for the users.</p>
      <hr class=\"my-4\">
        <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\" style=\"margin-top:10px;\">Company Name: $nume</li>
                <li class=\"list-group-item\" style=\"margin-top:10px;\">Adress: $prenume</li>
                <li class=\"list-group-item\" style=\"margin-top:10px;\">Phone no: $nr_telefon</li>
                <li class=\"list-group-item\" style=\"margin-top:10px;\">Email: $email</li>
                <li class=\"list-group-item\" style=\"margin-top:10px;\">Score: $scor</li>
            <!-- </div> -->
        </ul>
    <a href=\"#todo\" class=\"btn btn-primary\" role=\"button\"style=\"margin-top:25px; height:30px; margin-left:85%; width: 15%\" aria-pressed=\"true\">Edit</a>
    </div>

    <div class=\"card\" style=\"position: absolute; width:30%; height:25%; top:8%; left:60%;\">
        <!-- <img src=\"...\" class=\"card-img-top\" alt=\"...\"> -->
        <div class=\"card-body\">
            <h5 class=\"card-title\">Current offers</h5>
            <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href=\"currentoffers.php?idOfertant=";

            echo $id;

            echo "\" class=\"btn btn-primary\" >Go somewhere</a>
        </div>
    </div>
    <div class=\"card\" style=\"position: absolute; width:30%; height:25%; top:38%; left:60%\">
        <!-- <img src=\"...\" class=\"card-img-top\" alt=\"...\"> -->
        <div class=\"card-body\">
            <h5 class=\"card-title\">Active contracts</h5>
            <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href=\"#\" class=\"btn btn-primary\">Go somewhere</a>
        </div>
    </div>
    <div class=\"card\" style=\"position: absolute; width:30%; height:25%; top:68%; left:60%\">
        <!-- <img src=\"/img/history.png\" class=\"card-img-top\" alt=\"...\"> -->
        <div class=\"card-body\">
            <h5 class=\"card-title\">History</h5>
            <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href=\"#\" class=\"btn btn-primary\">Go somewhere</a>
        </div>
    </div>


    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
    </body>
</html>";
}

mysqli_close($con);
?>