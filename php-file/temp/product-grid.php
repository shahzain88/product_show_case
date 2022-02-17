<?php 
$prods=null;
require_once "../db.php";

if (is_null($searched_prods)) {
	// grt product data from db 
	// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=my-php-site-store;','root','');
	$db = new DB();
	$pdo = $db->connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$qState = $pdo->prepare("SELECT * FROM products");
	$qState->execute();
	$prods = $qState->fetchAll(PDO::FETCH_ASSOC);

}
if (!is_null($searched_prods)) {
	$prods = $searched_prods;
}


?>


<div class="main">
		<div class="products">
			<?php foreach ($prods as $prod) {?>

				<a class="product" href="show-product.php?id=<?php echo($prod["id"]) ?>">
					<div >
						<div class="imgOut">
							<img src="<?php echo($prod['img']) ?>">
						</div>
						<h2><?php echo $prod['title']; ?></h2>
						<h3><?php echo $prod['price']; ?></h3>
						

						<?php  $tiny_desc = substr($prod['the_desc'], 0, 20) ."..." ; ?>
						<h4><?php echo $tiny_desc; ?></h4>
						<p class="author"><?php echo $prod['author']; ?></p>
						<p class="date"><?php echo $prod['date']; ?></p>

					</div>
				</a>

			<?php } ?>
		</div>
		

</div>
