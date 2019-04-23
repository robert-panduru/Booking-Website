<?php
session_start();
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
    echo "<!DOCTYPE html>
    <head>
        <script>
            function logIn() {
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject(\"Microsoft.XMLHTTP\");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(\"txtHint\").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open(\"GET\",\"getuser.php?uname=\" +
                    name +
                    \"&psw=\" +
                    pass);
                xmlhttp.send();
            }
            
            function changeName(str) {
                if (str)
                    name = str;
            }

            function changePass(str) {
                if (str)
                    pass = str;
            }
        </script>
    </head>
    <body>

       <!--  <form onSubmit=\"logIn()\" action=\"\"> -->
        <form action=\"/getuser.php\">
            <div class=\"container\">
                <label for=\"uname\"><b>Username</b></label>
                <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>

                <label for=\"psw\"><b>Password</b></label>
                <input type=\"text\" placeholder=\"Enter Password\" name=\"psw\" required>

                <button type=\"submit\">Login</button>
            </div>
        </form>

        <div id=\"txtHint\"><b>Nebunie</b></div>

    </body>
</html>";
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