<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>The Writings of a PHP Developer</title>
		<meta name="description" content="Articles, tutorials, and opinions written by Joel Vardy about various web development topics." />
		<link rel="stylesheet" href="/assets/css/reset.css" />
		<link rel="stylesheet" href="/assets/css/design.css" />
		<link rel="author" href="https://plus.google.com/102110732747129499789" />
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-27602018-2', 'joelvardy.com');
			ga('send', 'pageview');
		</script>
	</head>
	<body id="writing-list">

		<header>
			<a href="/" title="About Joel Vardy"><img alt="My beautiful face" src="/assets/img/joel-vardy-square.jpg" /></a>
			<hgroup>
				<h1><a href="/" title="About Joel Vardy">Joel Vardy</a></h1>
				<h4>Contract Web Developer</h4>
			</hgroup>
			<nav>
				<a href="/" title="About Joel Vardy">About</a>
				<a href="/projects" title="Projects I've been involved in">Projects</a>
				<a class="active" href="/writing" title="Joel's Ramblings">Writing</a>
			</nav>
		</header>

		<?php foreach ($posts as $post) : ?>
			<a class="post" href="/writing/<?php echo $post->slug; ?>" title="<?php echo $post->title; ?>">
				<h2><?php echo $post->title; ?></h2>
				<p><?php echo $post->intro; ?></p>
				<p class="posted">Posted: <strong><?php echo date('jS F Y', $post->posted); ?></string></p>
			</a>
		<?php endforeach; ?>

		<script src="/assets/js/zepto.min.js"></script>
		<script src="/assets/js/main.js"></script>
	</body>
</html>