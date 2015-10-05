<!--

	The source code for this website is publicly available at:
	https://github.com/joelvardy/joelvardy.com

	If you want to hire me, get in touch: info@joelvardy.com

-->
<!DOCTYPE html>
<html lang="en-GB" manifest="/manifest">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>" />
		<link async rel="stylesheet" href="/assets/minified/design.css" />
        <meta name="theme-color" content="#cc6d00" />
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-27602018-2', 'joelvardy.com');
			ga('send', 'pageview');
		</script>
		<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"@type": "Person",
				"name": "Joel Vardy",
				"email": "info@joelvardy.com",
				"image": "/assets/img/joel-vardy.jpg",
				"jobTitle": "Web Developer",
				"url": "https://joelvardy.com",
				"description": "A contract web developer.",
				"gender": "male",
				"address": {
					"@type": "PostalAddress",
					"addressCountry": "GB"
				},
				"sameAs" : [
					"https://www.linkedin.com/in/joelvardy",
					"https://twitter.com/joelvardy",
					"https://plus.google.com/+JoelVardyDeveloper"
				]
			}
		</script>
		<?php if (isset($openGraph)) : ?>
			<meta property="og:url" content="https://joelvardy.com<?php echo $openGraph->url; ?>">
			<meta property="og:title" content="<?php echo $title; ?>">
			<meta property="og:type" content="<?php echo $openGraph->type; ?>">
			<meta property="og:image" content="https://joelvardy.com/assets/img/joel-vardy.jpg">
			<meta property="og:description" content="<?php echo $description; ?>">
			<meta property="og:site_name" content="Joel Vardy">
		<?php endif; ?>
	</head>
	<body template="default">

		<?php echo $page_view; ?>

		<script src="/assets/minified/app.js"></script>
	</body>
</html>
