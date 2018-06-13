<?php
	session_start();
	require_once 'handler/dbConnection.php';
	require_once 'handler/helpers.php';
	if( isset($_GET['view']) ){
		//Available views
		$views = [
			'home',
			'qcm',
			'thanks'
		];

		$view = is_in_array($views, $_GET['view'])? $_GET['view'] : 'home';
	}
	else{
		$view = 'home';
	}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<?php include_once 'includes/head_content.php'; ?>
</head>
<body>
	<pre>
		<?php var_dump($_SESSION['user_id']); ?>
		<?php var_dump($_SESSION['question1']); ?>
	</pre>
	<?php include_once 'includes/preloader.php'; ?>
	<?php include_once 'includes/header.php'; ?>
	<?php include_once 'view/'.$view.'.php'; ?>
	<?php include_once 'includes/footer.php'; ?>

	<script type="text/javascript" src="assets/js/preloader.js"></script>
	<script type="text/javascript">
		$(document).load( preload(1750) );
	</script>
</body>
</html>