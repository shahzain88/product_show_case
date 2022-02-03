

<?php 

?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION["title"]; ?></title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/res-header.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" type="text/css" href="css/product-grid.css">
	<link rel="stylesheet" type="text/css" href="css/res-product-grid.css">

	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/form-inputs.css">
	<link rel="stylesheet" type="text/css" href="css/res-form-inputs.css">

	<link rel="stylesheet" type="text/css" href="css/error.css">
	<link rel="stylesheet" type="text/css" href="css/show-product.css">
	<link rel="stylesheet" type="text/css" href="css/res-show-product.css">

	<link rel="stylesheet" type="text/css" href="css/scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/delete-product.css">
	
	<link rel="icon" type="image/x-icon" href="img/zain.ico">
	




</head>

<body>


<nav class="navbar">
	<a class = "btn"href="form-inputs.php">Create Product</a>
	<a href="index.php" class="img-link"><img src="img/logo.png" class="logo-img"></a>
	

	<form action="search.php" method="GET" class="search-form">
		<input type="text" name="query" placeholder="search">
		<a type= "submit" onclick="document.querySelector('.search-form').submit();">
			<img class = "search-logo"src="img/search-logo.png">
		</a>
	</form>
</nav>

