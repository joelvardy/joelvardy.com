<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>TODO</title>
		<meta name="description" content="TODO" />
		<link rel="stylesheet" href="/assets/css/reset.css" />
		<link rel="stylesheet" href="/assets/css/design.css" />
	</head>
	<body id="projects">

		<header>
			<a href="/" title="TODO"><img src="/assets/img/joel-vardy-square.jpg" /></a>
			<hgroup>
				<h1><a href="/" title="TODO">Joel Vardy</a></h1>
				<h4>Contract Web Developer</h4>
			</hgroup>
			<nav>
				<a href="/" title="TODO">About Me</a>
				<a class="active" href="/projects" title="TODO">My Projects</a>
			</nav>
		</header>

		<?php

			foreach ($projects as $project) {
				echo $project;
			}

		?>

		<footer>
			//footer//
		</footer>

	</body>
</html>