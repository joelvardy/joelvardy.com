<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Workspace of a PHP Developer</title>
		<meta name="description" content="An overview of my lifehacker-featured workspace." />
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
	<body id="workspace">

		<header>
			<a href="/" title="About Joel Vardy"><img alt="My beautiful face" src="/assets/img/joel-vardy-square.jpg" /></a>
			<hgroup>
				<h1><a href="/" title="About Joel Vardy">Joel Vardy</a></h1>
				<h4>Contract Web Developer</h4>
			</hgroup>
			<nav>
				<a href="/" title="About Joel Vardy">About</a>
				<a href="/projects" title="Projects I've been involved in">Projects</a>
				<a href="/writing" title="TODO">Writing</a>
			</nav>
		</header>

		<h2>Workspace</h2>

		<p>I think most people like to have a desk which they've made their own. In December 2009 I created my workspace as part of my bedroom, shortly after, my workspace was featured on <a href="http://lifehacker.com/5551260/the-luxury-loft-desk" title="The Luxury Loft Desk" data-analytics="Lifehacker workspace">lifehacker</a>.</p>

		<h3>Ideas</h3>

		<p>I wanted a big desk, so I could have my computer setup, and still have enough space to spread out papers and notes. I also wanted a double bed, yeah a lot to ask in a room with only 8 square metres of floor space.</p>
		<p>The only realistic option was to build vertically, I didn't want to just buy a loft bed, I wanted a desk which was made for the space, something which didn't have gaps between it and the wall, something which wouldn't rattle, the only solution was to make a custom desk and bed.</p>

		<h3>Development</h3>

		<p>The platform for my bed is 2 x 1.4 metres, the same width and just longer than a double mattress. I would support the platform with three pieces of 4 x 4. And it would be secured into the wall on the left and back and the wardrobe on the right.</p>
		<p>Two of the supports would be used as a ladder; this meant my desk couldn't be quite as deep as the platform so it would be possible to put your feet on the rungs.</p>
		<p>I decided to build some speakers and lighting into the platform, I used LED lighting so there was no fire hazard.</p>

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

		<h3>Final Details</h3>

		<p>I placed some holes for wires in the top and bottom left, centre, and top right - giving me plenty of flexibility for peripherals.</p>
		<p>I wanted a room which was light and airy, I chose white for the walls, the woodwork is off white and the carpet is cream. There is a splash of colour so the wall opposite the desk is a bright green.</p>
		<p>So many people want to know about the chair, it's a <strong>Kawasaki Paddock Chair</strong>.</p>

		<h3>Frequently Asked Questions</h3>

		<p><strong>Why haven't you mounted the monitors on the wall?</strong><br />
		Sadly the monitors [LG W2261VP 22"] do not have a VESA MIS bracket so I can only use the supplied bases.</p>

		<p><strong>You must hit your head on the ceiling?</strong><br />
		No, it's never really been a problem.</p>

		<p><strong>What's with all the relentless cans?</strong><br />
		I love the designs on the cans and they add a bit of colour to my desk... And when I get bored I can rearrange them =)</p>

		<p><strong>How much did this cost?</strong><br />
		The total cost came to just over £900</p>

		<script src="//cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js"></script>
		<script src="/assets/js/main.js"></script>
	</body>
</html>