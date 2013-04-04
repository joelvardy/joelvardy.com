<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>TODO</title>
		<meta name="description" content="TODO" />
		<link rel="stylesheet" href="/assets/css/reset.css" />
		<link rel="stylesheet" href="/assets/css/design.css" />
		<link rel="stylesheet" href="/assets/css/print.css" media="print" />
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-27602018-2', 'joelvardy.com');
			ga('send', 'pageview');
		</script>
	</head>
	<body id="about">

		<header>
			<a href="/" title="About Joel Vardy"><img alt="My beautiful face" src="/assets/img/joel-vardy-square.jpg" /></a>
			<hgroup>
				<h1><a href="/" title="About Joel Vardy">Joel Vardy</a></h1>
				<h4>Contract Web Developer</h4>
			</hgroup>
			<nav>
				<a class="active" href="/" title="About Joel Vardy">About Me</a>
				<a href="/projects" title="Projects I've been involved in">My Projects</a>
			</nav>
		</header>

		<?php if ($photos) : ?>

			<h3>Photos</h3>

			<?php

				foreach ($photos as $photo) {
					echo '	<h6>'.$photo->title.'</h6>
							<img src="'.$photo->url->medium.'" />';
				}

			?>

		<?php endif; ?>

		<script src="//cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js"></script>
		<script src="/assets/js/main.js"></script>
	</body>
</html>