<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'root', 'Info');

	// initialize variables
	$id = "";
	//$id = "";
	$name = "";
	$surname = "";
	$email = "";
	$update = false;

	if (isset($_POST['save'])) {
	    $id = $_POST['ID'];
		$name = $_POST['NAME'];
		$surname = $_POST['SURNAME'];
		$email = $_POST['EMAIL'];

		mysqli_query($db, "INSERT INTO USER (ID,NAME,SURNAME,EMAIL) VALUES ('$id','$name', '$surname', '$email')"); 
		$_SESSION['message'] = "Saved"; 
		header('location: index.php');
	}
	if (isset($_POST['update'])) {
	$id = $_POST['ID'];
	$name = $_POST['NAME'];
	$surname = $_POST['SURNAME'];
	$email = $_POST['EMAIL'];

	mysqli_query($db, "UPDATE USER SET NAME='$name', SURNAME='$surname', EMAIL = '$email' WHERE ID=$id");
	$_SESSION['message'] = "Updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM USER WHERE ID =$id");
	$_SESSION['message'] = "Deleted!"; 
	header('location: index.php');
}
//mysqli_close($db);

?>
