<?php
session_start();
$con = mysqli_connect('localhost','barosan','barosan','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ofertanti");
$sql="SELECT Username, Password, Nume, Prenume, Email, Nr_telefon, Scor FROM ofertanti where Username = ? and Password = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $_GET['uname'], $_GET['psw']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $pass, $nume, $prenume, $email, $nr_telefon, $scor);
$stmt->fetch();
$stmt->close();

if (!isset($name) || trim($name) === '') {
    echo "Invalid username/password";
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
    	</style>
	</head>
	<body background=\"http://bramptonist.com/wp-content/uploads/2017/03/sports-field.jpg\">
		<img src=\"/img/logo.png\" style=\"position:absolute; TOP:20%; LEFT:36%; border:0\" >
		
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
	<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
	<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
	<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
	</body>
</html>";
}
else {
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

			td {
				z-index: 100;
				color: red;
			}

			th {
				z-index: 100;
				color: red;
			}
    	</style>
	</head>
	<body background=\"http://bramptonist.com/wp-content/uploads/2017/03/sports-field.jpg\">
		<img src=\"/img/logo.png\" style=\"position:absolute; TOP:20%; LEFT:36%; border:0\" >";
    echo "<table>";
    echo "<tr><th>Username</th></tr>";
    echo "<td>" . $name . "</td></tr>";
    echo "<tr><th>Password</th></tr>";
    echo "<td>" . $pass . "</td></tr>";
    echo "<tr><th>Nume</th></tr>";
    echo "<td>" . $nume . "</td></tr>";
    echo "<tr><th>Prenume</th></tr>";
    echo "<td>" . $prenume . "</td></tr>";
    echo "<tr><th>Email</th></tr>";
    echo "<td>" . $email . "</td></tr>";
    echo "<tr><th>Numar telefon</th></tr>";
    echo "<td>" . $nr_telefon . "</td></tr>";
    echo "<tr><th>Scor</th></tr>";
    echo "<td>" . $scor . "</td></tr>";

    echo "</table>";
    echo "Logged in succesfully";
    echo "<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
	<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
	<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
	</body>
</html>";
}

mysqli_close($con);
?>