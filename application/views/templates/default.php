<!--

	The source code for this website is publically available at:
	https://github.com/joelvardy/joelvardy.com

	If you want to hire me, get in touch: info@joelvardy.com

-->
<!DOCTYPE html>
<html lang="en-GB" manifest="/manifest">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php echo $title; ?></title>
		<script src="https://testing.joelvardy.com/_a"></script>
		<meta name="description" content="<?php echo $description; ?>" />
		<link rel="stylesheet" href="/assets/minified/design.css" />
		<link rel="publisher" href="https://plus.google.com/+JoelVardyDeveloper" />
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-27602018-2', 'joelvardy.com');
			ga('send', 'pageview');
		</script>
	</head>
	<body template="default">

		<header class="primary" itemscope itemtype="http://schema.org/Person">
			<a class="photo" href="/" title="About Joel Vardy">
				<img itemprop="image" alt="Joel Vardy while working" src="/assets/img/joel-vardy.jpg" />
			</a>
			<hgroup>
				<h1><a itemprop="name" href="/" title="About Joel Vardy">Joel Vardy</a></h1>
				<h4 itemprop="jobTitle">Contract Software Engineer</h4>
			</hgroup>
			<nav>
				<a <?php echo ($slug == 'about' ? 'class="active"' : ''); ?> href="/" title="About Joel Vardy">About</a>
				<a <?php echo ($slug == 'projects' ? 'class="active"' : ''); ?> href="/projects" title="Projects I've been involved in">Projects</a>
				<a <?php echo (strpos($slug, 'writing') === 0 ? 'class="active"' : ''); ?> href="/writing" title="Joel's Ramblings">Writing</a>
			</nav>
		</header>

		<?php echo $page_view; ?>

		<script src="/assets/minified/app.js"></script>
	</body>
</html>
