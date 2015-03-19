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
		<meta name="description" content="<?php echo $description; ?>" />
		<link async rel="stylesheet" href="/assets/minified/design.css" />
		<link rel="publisher" href="https://plus.google.com/+JoelVardyDeveloper" />
		<script async src="/assets/minified/app.js"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-27602018-2', 'joelvardy.com');
			ga('send', 'pageview');
		</script>
	</head>
	<body template="default">

		<?php echo $page_view; ?>

	</body>
</html>
