<?php 

$searched_prods= null;
if ($_SERVER['REQUEST_METHOD'] === "GET") {
	if(isset($_GET['query'])){
		$query = htmlspecialchars($_GET['query']);
		$query = "%" . $query ."%";
		$pdo = new PDO('mysql:host=localhost;port=3306;dbname=my-php-site-store;','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$qState = $pdo->prepare("SELECT * FROM products WHERE title LIKE :q OR the_desc LIKE :q OR author LIKE :q OR date LIKE :q OR price LIKE :q");
		$qState->bindvalue(':q',$query);
		$qState->execute();
		$searched_prods = $qState->fetchAll(PDO::FETCH_ASSOC);
	}


}
?>






<?php if (!is_null($searched_prods)): ?>
	

	<?php 
	// init session
	session_start();

	$_SESSION['title'] = "searched";


	// header
	require './temp/header.php';
	 ?>

	<?php 
	if ($_SERVER["REQUEST_METHOD"] ==='GET') {
		if (isset($_GET['deleted'])) {
			if ($_GET['deleted']==="1") {
				// deleted
				echo "<h4 class='error'>Product deleted</h4>";
			}

			if ($_GET['deleted']==="0") {
				// Not deleted
				echo "<h4 class='error'>Product deleted <span>×</span></h4>";
			}
		}
	}?>

	<!-- main -->
	<main>
		<?php require './temp/product-grid.php' ?>
	</main>


	<!-- footer -->
	<?php 
	require './temp/footer.php'
	?>

	</body>
	</html>



<?php endif ?>
