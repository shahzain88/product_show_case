
<?php 
// init session
session_start();

$_SESSION['title'] = "product's";


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
			echo "<h4 class='error'>deleted Canceld</h4>";
		}
	}
}?>

<?php $searched_prods=null; ?>
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


