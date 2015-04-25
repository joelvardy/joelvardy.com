<div class="post">

	<h2>SSH Tunneling</h2>
	<h4 class="date">Posted: <date>15th May 2014</date></h4>

	<p>Tunneling your network traffic through an SSH connection can be useful if you want to encrypt all outbound traffic, get around a corporate firewall, or make connections from a white listed static IP address.</p>
	<p>The way I had previously done this was to run a command in the terminal to open up a SOCKS proxy, then change the Google Chrome network settings to route all requests through the tunnel. However I am going to show you how I have SSH tunnels set up on my Mac.</p>

	<h3>SSH Proxy</h3>
	<p>After trying several utilities which had terrible UIs, or lacking features, I found <a href="https://itunes.apple.com/gb/app/ssh-proxy/id597790822" title="SSH Proxy on the Mac app store" data-analytics="SSH Proxy App">SSH Proxy</a>. While it will set you back &pound;1.49 I think after you've seen how easy it makes opening SSH tunnels, you will agree that is a small price to pay!</p>
	<p>Once you've installed the SSH Proxy utility, go to preferences and ensure the:
	<ul>
		<li><strong>Listening port</strong> is set to 7070</li>
		<li><strong>Turn on proxy when started</strong> checkbox is ticked.</li>
		<li><strong>Launch when logged in</strong> checkbox is ticked.</li>
	</ul>
	<div class="photo">
		<img src="/assets/img/writing/ssh-tunneling/ssh-proxy-preferences-general.jpg" width="500" />
	</div>
	<p>Then add a server under the <strong>Servers</strong> tab, simply setting the details to login to the server over SSH. You can then close the preferences window. Select <strong>Turn proxy on</strong> from the utility menu in the status bar.</p>
	<div class="photo">
		<img src="/assets/img/writing/ssh-tunneling/ssh-proxy-turn-on.jpg" width="300" />
	</div>

	<h3>System Level Proxy</h3>
	<p>The next step is to make the operating system (OSX) use the SOCKS proxy for all network connections, do do this navigate to: <strong>System Preferences</strong> > <strong>Network</strong> > <strong>Advanced</strong> > <strong>Proxies</strong> > <strong>SOCKS Proxy</strong>. Then set the host to 127.0.0.1 and the port to 7070, as shown below:</p>
	<div class="photo">
		<img src="/assets/img/writing/ssh-tunneling/osx-socks.jpg" width="500" />
	</div>

	<h3>Workflow</h3>
	<p>The SSH Proxy app has an option called <strong>Direct internet connection (no proxy)</strong> this is very useful because it means so long as the utility is running you can use no proxy, or route all network traffic through a proxy, without having to do anything but two clicks.</p>

	<h3>/etc/hosts</h3>
	<p>When your traffic is being tunneled through a SSH tunnel your hosts file will not be used to resolve hostnames. If you are doing local development you will want to add exceptions to the network proxies preferences, see <a href="http://apple.stackexchange.com/a/95198" title="Read more at StackExchange" data-analytics="SSH tunneling  with local hosts on StackExchange">this answer on StackExchange</a>. If you have a better solution to this, please get in touch.</p>

</div>
