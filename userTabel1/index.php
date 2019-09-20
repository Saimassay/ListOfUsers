<?php  include('phpCode.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM USER WHERE ID=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			 $id = $n['ID'];
			$name = $n['NAME'];
			$surname = $n['SURNAME'];
			$email = $n['EMAIL'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>USER</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
    <?php endif ?>

    <?php $results = mysqli_query($db, "SELECT * FROM USER"); ?>

<table>
	<thead>
		<tr>
			 <th>ID</th>
			<th>NAME</th>
			<th>SURNAME</th>
			<th>EMAIL</th>
			<th colspan="2">ACTION</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['ID']; ?></td>
			<td><?php echo $row['NAME']; ?></td>
			<td><?php echo $row['SURNAME']; ?></td>
			<td><?php echo $row['EMAIL']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Update</a>
			</td>
			<td>
				<a href="phpCode.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="phpCode.php" >
		<!-- <input type="hidden" name="ID" value="<?php echo $id; ?>"> -->
		<div class="input-group">
			<label>ID</label>
			<input type="number" name="ID" value="<?php echo $id;?>">
		</div>
		<div class="input-group">
			<label>NAME</label>
			<input type="text" name="NAME" value="<?php echo $name;?>">
		</div>
		<div class="input-group">
			<label>SURNAME</label>
			<input type="text" name="SURNAME" value="<?php echo $surname;?>">
		</div>
		<div class="input-group">
			<label>EMAIL</label>
			<input type="text" name="EMAIL" value="<?php echo $email;?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	            <button class="btn" type="submit" name="update" style="background: #59d4ce;" >Update</button>
            <?php else: ?>
	            <button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>

		</div>
	</form>
</body>
</html>