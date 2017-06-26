<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Menu page';
  	echo $title;
  }
?>
<?php require_once "phpfun/connectdb.php"; ?>
<?php require_once "phpfun/showmenu.php"; ?>
<?php require_once "phpfun/acctlogout.php" ?>
<?php require_once "phpfun/_acct_update.php" ?>
<?php require_once "phpfun/_acct_delete.php" ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head -->

	<title><?php get_title() ?></title>

	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font_declarations.css">

    <!-- Formatting -->
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

</head>
<body>

	<!-- Header Partial -->
	<?php 
  require_once "partials/_header.php";
   ?>

	<div class="container-fluid" id="welcomebox">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<h1> Everyone loves to eat </h1>
				<?php showmenu('display'); ?>
			</div>

			<!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
			</div> -->
    </div>
	</div>

	<!-- Update modal partial -->
  	<?php require_once "partials/_modal_update.php"; ?> 	 	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), 
    or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>  

     <!-- Javascript for menu modals (delete/update) -->
    <script src="js/menu_modals.js"></script>

</body>
</html>



