<?php 


$mtitle=$_SESSION['title'];

?>

<footer >
	<div>
		<img src="img/logo.png" class="logo-img">
		<p>CopyRight Reserved @2022</p>
	</div>

</footer>

<?php if ($mtitle === "create product") {
// <!-- js -->
	echo "<script type='text/javascript' src='js/form-inputs.js'></script>";
} ?>

<?php if ($mtitle === "edit product") {
// <!-- js -->
	echo "<script type='text/javascript' src='js/form-inputs.js'></script>";
} ?>

<script type='text/javascript' src='js/error.js'></script>
