<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  
</head>
<body>
<h1>Hello Testing Zone</h1>
<p>This is the simple testing</p>

    <form action="emailsubmit.php" method="post">
    <input type="text" placeholder="Name" name="name"><br>
    <input type="email" placeholder="Email" name="email"><br>
    <input type="submit" placeholder="submit" name="submit">
    </form>

<script src="https://code.jquery.com/jquery-3.7.1.mini.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

var messageText="<?= $_SESSION['status'] ?? ''; ?>";
if(messageText !=''){
Swal.fire({
	  title: "Thank you!",
	  text: messageText,
	  icon: "success"
	});
<?php unset($_SESSION['status']); ?>

}
else{
}

</script>


</body>
</html>
