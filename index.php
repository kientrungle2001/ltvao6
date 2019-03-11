<?php require_once 'bootstrap.php';?><!DOCTYPE html>
<html ng-app="flApp" ng-controller="HomeController">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{title}}</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome-4.6.3/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<!--
		Tết
	<link rel="stylesheet" type="text/css" href="assets/css/tet.css?t=<?php echo time(); ?>" />
	-->
	<!--8/3-->
	<link rel="stylesheet" type="text/css" href="assets/css/8-3.css?t=<?php echo time(); ?>" />
	
	<script>
		FL_API_URL = '<?php echo FL_API_URL?>';
	</script>
</head>
<body class="homepage-body">
	<?php include('common/header.php'); ?>
	<?php 
	include('common/slider.php');
	//include('common/slidertet.php'); 
	?>
	<?php include('home/index-8-3.php'); ?>
	<?php include('common/footer.php'); ?>
	<script src="/assets/angular/home.js?t=<?php echo time(); ?>"></script>
	<?php if(0):?>
	<script src="/assets/js/snowfall.js"></script>
	<embed src="/assets/audio/Ode_to_Joy.ogg" autostart="true" loop="true"
width="2" height="0" />
	<?php endif;?>
</body>
</html>
