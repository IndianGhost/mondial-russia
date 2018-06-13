<?php
	session_start();
	require_once 'config.php';
	require_once 'handler/dbConnection.php';
	require_once 'handler/helpers.php';
	require_once 'handler/routes.php';
	require_once 'handler/question.php';
	require_once 'handler/choice.php';
	require_once 'model/Choice.class.php';
	require_once 'model/Question.class.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<?php include_once 'includes/head_content.php'; ?>
</head>
<body>
	<!-- preloader -->
	<div class="spinner"></div>
	
	<?php include_once 'includes/header.php'; ?>
	<?php include_once 'view/'.$view.'.php'; ?>
	<?php include_once 'includes/footer.php'; ?>

	<script type="text/javascript" src="assets/js/preloader.js"></script>
	<script type="text/javascript">
		$(document).load( preload(750) );
	</script>
<?php if($view=='qcm'){ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			var questions = <?php echo $_SESSION['questions']; ?>;
			console.log(questions);
		});
	</script>
<?php }		?>
</body>
</html>