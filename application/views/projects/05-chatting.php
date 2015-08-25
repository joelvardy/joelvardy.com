<div id="chatting" class="project">

	<img class="header" alt="Chatting" src="/assets/img/projects/chatting.jpg" />

	<div class="inner">

		<h2>Chatting</h2>

		<ul class="details">
			<li><strong>Project Type:</strong> Side Project</li>
			<li><strong>Website:</strong> <a href="https://chatting.im/" title="Chatting" data-analytics="Chatting">chatting.im</a></li>
			<li><strong>Date:</strong> April 2013 (major refactor in March 2015)</li>
		</ul>

		<p>As one of the first things I built with node.js I kept it simple, but added a twist to the standard "messaging system" by encrypting all messages locally in the users browser. The encryption key is stored in the URL hash so by sharing the URL with friends you can securely send messages, but the encryption key is never sent to the server / seen by the network.</p>
        <p>I have refactored this project several times:</p>
		<ul>
			<li>I moved from EJS templates to <strong>{{ mustache }}</strong> and from my own custom routing to using <strong>page.js</strong>.</li>
			<li>I decided to try <strong>ES6</strong> modules / classes and use <strong>Ractive</strong> for templating.</li>
		</ul>
		<p>If you would like to see how I have built the website, please review the <a href="https://github.com/joelvardy/chatting.im" title="Open source repository" data-analytics="chatting.im repo">the source code</a> on GitHub.</p>

	</div>

</div>
