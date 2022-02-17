<?php 
// grt product data from db 

session_start();

require_once "../db.php";


$prod = '';
if ($_SERVER["REQUEST_METHOD"] ==='GET') {
	if (isset($_GET['id'])) {
		$id= (int)$_GET['id'];
		// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=my-php-site-store;','root','');
		$db = new DB();
		$pdo = $db->connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$qState = $pdo->prepare("SELECT id, img, title, price, the_desc, author, date FROM products WHERE id = :id");
		$qState->bindvalue(":id",$id);
		$qState->execute();
		$prod = $qState->fetch(PDO::FETCH_ASSOC);


	}
	
} 

$_SESSION['title'] = "{$prod["title"]}";


require './temp/header.php';



?>

<?php if (empty($prod)): ?>
	<?php header("Location:404.php"); ?>
<?php endif ?>

<?php if (!empty($prod)): ?>


<div class="show-product">
			<div class="product">
				<div class="imgOut">
					<img src="<?php echo($prod['img']) ?>">
				</div>
				<h2><?php echo $prod['title']; ?></h2>
				<h3><?php echo $prod['price']; ?></h3>
				<h4><?php echo $prod['the_desc']; ?></h4>
				<div>
					<p class="author"><?php echo $prod['author']; ?></p>
					<p class="date"><?php echo $prod['date']; ?></p>

					<a href="edit-product.php?id=<?php echo "{$prod['id']}"; ?>&title=<?php echo($prod['title']) ?>&price=<?php echo($prod['price'])?>&the_desc=<?php echo($prod['the_desc']) ?>&author=<?php echo($prod['author']) ?>&img=<?php echo($prod['img']) ?>" class="btn" >Edit</a>
					<a href="delete-product.php?id=<?php echo "{$prod['id']}" ?>" class="btn btn-delete" >Delete</a>

				</div>


			</div>
</div>


<?php endif ?>


<!-- footer -->
<?php 
require './temp/footer.php'
?>
