


<?php 
$id = '';
if ($_SERVER["REQUEST_METHOD"] ==='GET') {
	if (isset($_GET['sure'])) {
		if ($_GET['sure']==="1") {
			// delete\
			if (isset($_GET["id"])) {
				$id= (int)htmlspecialchars($_GET["id"]);
				echo "1";
				echo "$id";
				$pdo = new PDO('mysql:host=localhost;port=3306;dbname=my-php-site-store;','root','');
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$qState = $pdo->prepare("DELETE FROM products WHERE products.id = :id");
				$qState->bindvalue(":id",$id);
				$qState->execute();
				header("Location:index.php?deleted=1");
			}

			
		}elseif ($_GET['sure']==="0") {
			// No
			echo "1";
			header("Location:index.php?deleted=0");

			
		}
	}

	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
	}
}

?>


<?php 
// init session
session_start();
$_SESSION['title'] = "delete";
// header
require './temp/header.php';
?>



<div class="delete-content">
 	<p>Are you sure?</p>
 	<a href="delete-product.php?sure=1&id=<?php echo "$id"; ?>" class="btn btn-delete">Yes, Delete</a>
 	<a href="delete-product.php?sure=0&id=<?php echo "$id"; ?>" class="btn">No!</a>
</div>


<?php 
require './temp/footer.php';
?>

</body>
</html>