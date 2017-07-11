<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta lang="en" />
		<title>ProtoPHP - A simple way to prototype websitse.</title>
		<style>
			body{font-family: verdana; font-size: 12px; color: #333;}
			footer{padding-top: 25px;}
			a{color: inherit; text-decoration: none;}
			.container{margin: 0 auto; width: 300px;}
			.center{text-align: center;}
		</style>
	</head>
	<body>
		<header class="container center">
			<h1><a href="<?php echo $this->config('base_url'); ?>">Welcome to ProtoPHP!</a></h1>
		</header>
		
		<section class="container">
			<?php $this->view($page); ?>
		</section>
		
		<footer class="container center">
			<hr/>
			&copy; Chase Terry <?php echo date('Y'); ?>
		</footer>
	</body>
</html>