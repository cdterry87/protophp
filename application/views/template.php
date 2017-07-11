<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta lang="en" />
		<title>ProtoPHP - A simple way to prototype websites</title>
		<style>
			body{font-family: verdana; font-size: 12px; color: #333;}
			footer{padding-top: 25px;}
			a{color: inherit; text-decoration: none;}
			hr{border-color: #999; color: #999;}
			h1, h4{margin-top: 5px; margin-bottom: 5px;}
			.container{margin: 0 auto; width: 300px;}
			.center{text-align: center;}
		</style>
	</head>
	<body>
		<header class="container center">
			<h1><?php echo $this->anchor('','ProtoPHP'); ?></h1>
			<h4>A simple way to prototype websites</h4>
			<hr/>
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