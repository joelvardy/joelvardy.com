<div class="post">

	<h2>Account Security</h2>
	<h4>Posted: <date>2nd May 2013</date></h4>

	<p>This subject has been covered so many times, but it amazes me how some of the basic steps to secure your users accounts and therefore your application are not taken.</p>
	<p>I'm even more amazed that large companies which <a href="http://www.bbc.co.uk/news/technology-19316825" title="BBC artcile talking about the insecurities of plain text password storage">know plain text password storage is bad</a>, will still store passwords in plain text.</p>

	<h3>BBC Careers</h3>
	<p>I was applying for a job at the BBC, I needed to login but had forgotten my password, alarm bells were first set off when what I expected to be a "reset my password" link actually read <strong>Please email my password to me</strong> - not to worry I'm sure they were actually going to send me a reset link.</p>
	<p>After entering my email address and looking in my inbox, I see:<br />
	<strong>Your password is 06Hkx5a9O4.</strong></p>
	<p>I'm sure you don't need to be told why this is bad, but a few reasons are listed below:</p>
	<ul>
		<li>Anyone with access to where these passwords are stored can read your password.</li>
		<li>Anyone with access to your email address can read your password.</li>
		<li>The line above has a full stop at the end, assuming you have used a secure password, how do you know whether that is part of the password.</li>
	</ul>

	<h3>Take Home</h3>
	<p>My first reaction was shock, maybe it shouldn't be, I've seen this happen a few times. Envato lost all of the love I had for it when it was <a href="http://notes.envato.com/general/tuts-premium-security/" title="Envato used a plugin which stores passwords in cleartext">announced they stored passwords in plain text</a>, for their Tuts+ premium blogs.</p>
	<p>I confess I have used the same password on multiple sites, which makes me an easy target in the event of a hacker getting my password in plain text. I am tempted to invest in some password manager, and ensure I use a different password for every website.</p>

	<h3>Another Issue</h3>
	<p>Just this morning I <a href="https://twitter.com/joelvardy/status/329874463036407810" title="Joel complaning on Twitter">tweeted my annoyance</a> about websites who do not use HTTPS when sending passwords or other sensitive data to a page. In short, if the password is not sent over SSL then someone can "sniff packets" and read your password before it even reaches the servers of the website.</p>

</div>