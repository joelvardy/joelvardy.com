<!--

	The source code for this website is publically available at:
	https://github.com/joelvardy/joelvardy.com

	If you want to hire me, get in touch: info@joelvardy.com

-->
<!DOCTYPE html>
<html lang="en-GB" manifest="/manifest">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php echo $template->title; ?></title>
		<meta name="description" content="<?php echo $template->description; ?>" />
		<link rel="stylesheet" href="/assets/css/design.css" />
		<?php foreach($template->stylesheets as $stylesheet) : ?>
			<link rel="stylesheet" href="<?php echo $stylesheet; ?>" />
		<?php endforeach; ?>
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
	<body id="<?php echo $template->slug; ?>">

		<header>
			<a href="/" title="About Joel Vardy"><img alt="My beautiful face" src="/assets/img/joel-vardy-square.jpg" /></a>
			<hgroup>
				<h1><a href="/" title="About Joel Vardy">Joel Vardy</a></h1>
				<h4>Contract Web Developer</h4>
			</hgroup>
			<nav>
				<a <?php echo ($template->slug == 'about' ? 'class="active"' : ''); ?> href="/" title="About Joel Vardy">About</a>
				<a <?php echo ($template->slug == 'projects' ? 'class="active"' : ''); ?> href="/projects" title="Projects I've been involved in">Projects</a>
				<a <?php echo (strpos($template->slug, 'writing') === 0 ? 'class="active"' : ''); ?> href="/writing" title="Joel's Ramblings">Writing</a>
			</nav>
		</header>

		<?php echo $page_html; ?>

		<script src="/assets/js/main.min.js"></script>
		<?php foreach($template->scripts as $script) : ?>
			<script src="<?php echo $script; ?>"></script>
		<?php endforeach; ?>
	</body>
</html>
