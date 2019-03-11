<?php require_once 'bootstrap.php';?><!DOCTYPE html>
<html ng-app="flApp" ng-controller="TestController">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Fulllook</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome-4.6.3/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	
	<script>
		FL_API_URL = '<?php echo FL_API_URL?>';
		category_id = <?php echo intval(isset($_GET['category_id']) ? $_GET['category_id']: 0); ?>;
		test_id = '<?php echo intval($_GET['test_id']); ?>';
		serverTime = <?php echo time() ?>;
		
		sessionUserId = '<?php if(isset($_SESSION['userId'])) echo $_SESSION['userId']  ?>';
		sessionUsername = '<?php if(isset($_SESSION['username'])) echo $_SESSION['username']  ?>';
		sessionPhone = '<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone']  ?>';
		sessionEmail = '<?php if(isset($_SESSION['email'])) echo $_SESSION['email']  ?>';
		checkPayment = '<?php if(isset($_SESSION['checkPayment'])) echo $_SESSION["checkPayment"] ?>';
		paymentDate = '<?php if(isset($_SESSION['paymentDate'])) echo $_SESSION["paymentDate"] ?>';
		expiredDate = '<?php if(isset($_SESSION['expiredDate'])) echo $_SESSION["expiredDate"] ?>';

		setInterval(function() {
			serverTime++;
		}, 1000);
	</script>
</head>
<body>
	<?php include('common/header.php'); ?>
	<?php include('test/test.php'); ?>
	<?php include('common/footer.php'); ?>
	<script src="/assets/angular/test.js?t=<?php echo time(); ?>"></script>
</body>
</html>