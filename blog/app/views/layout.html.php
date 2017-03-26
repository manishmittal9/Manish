<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) : config('blog.title') ?></title>

	<meta charset="utf-8" />
        <link rel="shortcut icon" href="favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Manish Mittal">
	<meta name="description" content="<?php echo config('blog.description')?>">

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title')?>  Feed" href="<?php echo site_url()?>rss" />
        
        <link type="text/css" href="<?php echo site_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo site_url() ?>assets/css/style.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&subset=latin,cyrillic-ext" rel="stylesheet" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body>

	<aside>

		<h1><a href="<?php echo site_url() ?>"><?php echo config('blog.title') ?></a></h1>

		<p class="description"><?php echo config('blog.description')?></p>
                
                <a href="../../carparklane/" class="btn btn-dark btn-lg" style="text-decoration:none; color:white;">Back to Home</a>

		<p class="author"><?php echo config('blog.authorbio') ?></p>

	</aside>

	<section id="content">

		<?php echo content()?>

	</section>

</body>
</html>
