<div id="uptime-monitoring" class="project">

	<img class="header" alt="Request" src="/assets/img/projects/uptime-monitoring.jpg" />

	<div class="inner">

		<h2>Uptime Monitor</h2>

		<ul class="details">
			<li><strong>Project Type:</strong> Side Project</li>
			<li><strong>Website:</strong> <a href="https://request.mx/" title="Request" data-analytics="Request">request.mx</a></li>
			<li><strong>Date:</strong> August 2014</li>
		</ul>

		<p>I've had the idea to roll my own uptime monitoring for a while, this summer I decided I would give it a go.<p>
		<p>There is one central server with an API, and several worker servers, around the world, which collect data and send it back to the central server (queuing data if the server is not available.)</p>

		<p>Each worker checks several things including:</p>
		<ul>
			<li>Domain ICMP response</li>
			<li>HTTP load time / status code</li>
			<li>SSL Certificate expiration</li>
			<li>DNS records</li>
			<li>Whois records</li>
		</ul>

		<p>The central API is built using PHP, and each worker uses node.js to run tests. I use Twilio to send SMS notifications.</p>

	</div>

</div>
