<?php
	// init session;
	session_start();

	$_SESSION['title'] = "edit product";
	$today = date("Y/n/j");
	require './temp/header.php';

$id='';
$price= '';
$title= '';
$the_desc= '';
$author= '';
$the_date= $today;
$img='';

 ?>



<?php 
if ($_SERVER["REQUEST_METHOD"]==="POST") {
	if (isset($_POST["submit"])) {
		$price= (int)htmlspecialchars($_POST['price']);
		$title= htmlspecialchars($_POST['title']);
		$the_desc= htmlspecialchars($_POST['desc']);
		$author= htmlspecialchars($_POST['author']);
		$id= $_SESSION['id'];
		$img= $_SESSION['img'];

		// $the_date= htmlspecialchars($_POST['mydate']);


		// get img and save

		// if (!empty($img)) {

		// }

		

		// echo $img."<br>". $price ."<br>".$title ."<br>". $desc ."<br>".$author."<br>". $desc ."<br>".$date; 

		// errors
		$errors = [];

		if (empty($_SESSION['img'])) {
			if (!$_FILES || !str_contains($_FILES["imgInp"]["type"], "image")) {
				$errors[]="<h4 class='error'> Add img ! </h4>";
			}
		}

	    if (!$price) {
			$errors[]="<h4 class='error'> Add price !</h4>";
		}
		if (!$title) {
			$errors[]="<h4 class='error'> Add title !</h4>";
    	}
		if (!$author) {
			$errors[]="<h4 class='error'> Add your name !</h4>";
		}


		// echo "<pre>";
		// $s= str_contains($_FILES["imgInp"]["type"],"image");
		// echo $s ."<br>" ;
		// echo  $_FILES["imgInp"]["type"];
		// echo "</pre>";

		if (empty($errors)) {
			if (!empty($_FILES)) {

				$fileTmpName = $_FILES['imgInp']['tmp_name']; 

				if (str_contains($_FILES["imgInp"]["type"], "image")) {
					if ($_FILES['imgInp']['error'] === 0) {
						$fileExt = explode(".", $_FILES['imgInp']['name']);
						$fileExt = strtolower(end($fileExt));
						$newFileName = uniqid('',true).".".$fileExt;
						if (!file_exists("uploads/")) {
							mkdir("uploads/");
							echo "uploads folder made";
						}
						if (!file_exists("uploads/". $author ."/")) {
							$url = "uploads/". $author ."/";					
							mkdir($url);
							echo "$author folder is made";

						}

						if (file_exists("uploads/". $author ."/")) {
							$newFileUrl = "uploads/". $author ."/" . $newFileName;
							move_uploaded_file($fileTmpName, $newFileUrl);
							$img = $newFileUrl;
						}else {
							$errors[]="<h4 class='error'>Could not upload the file !</h4>";
						}
						

						
					}
					
				}

			}
		
		}
		

		if (empty($errors)) {
			$pdo = new PDO('mysql:host=localhost;port=3306;dbname=my-php-site-store;','root','');
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$qState = $pdo->prepare("UPDATE products SET price=:price,img=:img, title=:title , the_desc=:the_desc, author=:author, date=:the_date WHERE products.id = :id");
			$qState->bindvalue(":title",$title);
			$qState->bindvalue(":img",$img); 
			$qState->bindvalue(":price",$price); 
			$qState->bindvalue(":the_desc",$the_desc); 
			$qState->bindvalue(":author",$author);
			$qState->bindvalue(":the_date",$the_date);
			$qState->bindvalue(":id",$id); 
			$qState->execute();
			header("Location: show-product.php?id=$id");
		} 

		

	} 
}

if ($_SERVER['REQUEST_METHOD']==="GET") {
	if (isset($_GET['id'])||isset($_GET['title'])||isset($_GET['price'])||isset($_GET['the_desc'])||isset($_GET['author'])||isset($_GET['img'])) {
		$id= (int)htmlspecialchars($_GET['id']);
		$title = htmlspecialchars($_GET['title']);
		$price = htmlspecialchars($_GET['price']);
		$the_desc = htmlspecialchars($_GET['the_desc']);
		$author = htmlspecialchars($_GET['author']);
		$img = htmlspecialchars($_GET['img']);
		$_SESSION['img']=$img;
		$_SESSION['id']=$id;



	}
}

?>

<div class="create">
	<?php if (!empty($errors)): ?>
		<div class="allerr">
				<?php foreach ($errors as $error) {
					echo $error;
				} ?>
		</div>
	<?php endif ?>
	<h1 class="form-title">Edit</h1>
	<form action="edit-product.php" method="POST" enctype="multipart/form-data">
		<img id="imgTag" src="<?php echo($img) ?>" alt="Img not selected">
		<label for="imgInp" class="imgLab">+</label>
		<input type="file" name="imgInp" id="imgInp" value="<?php echo($img) ?>">
		<input type="number" name="price" placeholder="price" value="<?php echo($price)?>">
		<input type="text" name="title" id="title" placeholder="title" value="<?php echo($title) ?>" >
		<textarea name="desc" id="desc" placeholder="descripton for product"><?php echo "$the_desc"; ?></textarea>
		<input type="text" name="author" id="author" placeholder="name" value="<?php echo($author) ?>">
		<!-- <input type="hidden" name="mydate" value="<?php echo($today) ?>"> -->
		<input type="submit" name="submit" value="submit" class="btn-delete">

	</form>
</div>


<?php require 'temp/footer.php'; ?>