<?php 
	require('./bootstrap.php');
	$username= '12131413132';
	$name = 'Kiều Nghĩa';
	$password = '123456';
	$email ='kieunghia.cntt@gmail.com';	
	

	
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
 <script>
$.post("<?php echo FL_API_URL ?>/login/fbGLogin", {name: "<?php echo $name ?>", username: "<?php echo $username ?>", email: "<?php echo $email ?>", url: "<?php echo FL_URL ?>" }, function(resp) {			
			if(resp.success) {
				window.location = resp.url;
			}
		});
</script>
	