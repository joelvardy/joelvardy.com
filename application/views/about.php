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

		<div id="biography">

			<p>I'm a contract PHP developer working in the UK (although I'm interested in working abroad.) You can see my skills at the bottom of this page, or view <a href="/projects" title="Projects I've been involved in">my projects and work</a>.</p>
			<p>When I'm not sat in front of Sublime Text:</p>
			<ul>
				<li>I might be <strong>skiing</strong> or <strong>snowboarding</strong>, both I've been doing for years.</li>
				<li>I could be in the countryside <strong>mountain biking</strong>, I've attended the annual Fort William World Cup since 2010.</li>
				<li>While doing these things it's likely I'll be also indulging in my love for  <strong>photography</strong>.</li>
			</ul>
			<?php if ($photos) : ?>
				<p>Some of my photography is shown below:</p>
			<?php endif; ?>

		</div>

		<?php if ($photos) : ?>

			<div id="photowall">
				<div class="inner">

				<?php

					shuffle($photos);
					foreach ($photos as $photo) {
						echo '<img alt="'.$photo->title.'" src="'.$photo->url->small.'" />';
					}

				?>

				</div>
			</div>

		<?php endif; ?>

		<div id="skills">

			<h2>Skills</h2>

			<h4>Server Administration</h4>
			<ul>
				<li>Linux server setup, specifically <strong>Ubuntu</strong>, also usage of <strong>CentOS 5</strong>.</li>
				<li>Knowledge of installation, configuration and usage of: <strong>Apache 2</strong>, <strong>Nginx</strong>, <strong>MySQL</strong>, <strong>APC</strong>, and <strong>Memcached</strong>.</li>
			</ul>

			<h4>Version Control</h4>
			<ul>
				<li>On my personal projects I use <strong>Git</strong>, my open source work can be found on my <a href="https://github.com/joelvardy" title="My GitHub Profile" data-analytics="GitHub Profile">GitHub profile</a>.</li>
				<li>I have also used <strong>Subversion</strong> and <strong>Perforce</strong>.</li>
			</ul>

			<h4>Programming</h4>
			<ul>
				<li>Several years usage and good understanding of object oriented <strong>PHP5</strong>.</li>
				<li>Working knowledge of several frameworks:
					<ul>
						<li><strong>CodeIgniter</strong> version 2.1</li>
						<li><strong>Laravel</strong> version 3 and 4</li>
						<li><strong>Slim</strong> version 2</li>
					</ul>
				</li>
				<li>Solid usage of <strong>Composer</strong> and writing PSR compliant code.</li>
				<li>Ability to write efficient code, and ability to utilise caching mechanisms.</li>
				<li>Commercial experience writing <strong>object oriented javascript</strong>.</li>
			</ul>

			<h4>Web Technologies</h4>
			<ul>
				<li>I write semantic markup and have a good understanding of <strong>HTML5</strong> elements.</li>
				<li>I believe in progressive enhancement, using <strong>CSS3</strong> where possible.</li>
				<li>Experience of developing <strong>responsive designs</strong>.</li>
				<li>A good knowledge of <strong>jQuery</strong>.</li>
			</ul>

		</div>

		<div id="contact">

			<h2>Contact Me</h2>

			<p>Please use the methods below to contact me:</p>
			<ul>
				<li>For general enquiries, send me a Tweet, <a href="https://twitter.com/joelvardy" title="My Twitter profile" data-analytics="Twitter profile">@joelvardy</a>.</li>
				<li>For contract or freelance enquiries, <a href="http://uk.linkedin.com/in/joelvardy" title="My Linkedin profile" data-analytics="Linkedin profile">my Linkedin profile</a>.</li>
			</ul>

		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js"></script>
		<script src="/assets/js/main.js"></script>
	</body>
</html>