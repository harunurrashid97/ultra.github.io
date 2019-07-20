<?php include('signlog.html')

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "codefix";

$conn =  mysqli_connect($servername, $username, $password, $dbname);


if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$password = $_POST["password"];
$salt = "codefix";
$password_encrypted = sha1($password.$salt);


$sql = mysqli_query($conn, "SELECT count(*) as total from signup WHERE email = '".$email."' and
	password = '".$password_encrypted."'");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	?>
	<script>
		alert('Login successful');
	</script>

	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}








?>
