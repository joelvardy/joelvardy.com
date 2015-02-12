<div class="post">

	<h2>Secure Staging</h2>
	<h4>Posted: <date>27th July 2014</date></h4>

	<p>When developing websites you often have to setup one or multiple staging areas, these are often used for showing a client the progress, testing the website works on a production environment, and gaining final sign off from the client. It's important that these staging areas are secured.</p>
	<ul>
		<li>Websites on a staging area are often unfinished, and may have security vulnerabilities which are yet to be patched.</li>
		<li>You do not want search engines to index a staging website, this will introduce several issues, as highlighted in the quote below.</li>
	</ul>

	<blockquote>
		<p>First is duplicate content - any time content is replicated somewhere else on the web, the original may be overlooked in favour of the other copies. Google can have a hard time deciding who is the original author so if your staging site gets indexed, it increases the chances that Google will not favour the copy on the production website.</p>
		<p>If you're building a new website with new content then Google can see it on the staging first, then when the new site goes live, the new site may not be recognised as the "original".</p>
		<p>Finally, if Google decides to rank the staging content then you may lose out on natural links and social shares, which otherwise may have driven traffic to your production website.</p>
		<cite>&#8212; <a href="https://twitter.com/eda49" title="Ed Baxter on Twitter" data-analytics="Ed Baxter on Twitter">Ed Baxter</a></cite>
	</blockquote>

	<h3>The Solution</h3>
	<p><em>I am going to assume your 'staging area' is a a subdomain of your production website - however it is possible to apply the methods discussed below to a subdirectory.</em></p>
	<p>In my opinion the easiest way to protect yourself from the risks highlighted above is to force the use of HTTP Basic Auth for all requests to the staging subdomain. When you try to open the staging site you will be asked to enter a username and password as shown below:</p>
	<div class="photo">
		<img src="/assets/writing/secure-staging/http-basic-auth.jpg" width="450" />
	</div>
	<p>There are two parts to adding HTTP Basic Auth on your staging domain:</p>
	<ol>
		<li>Create a <code class="language-markup">.htpasswd</code> file to store the username and passwords.</li>
		<li>Add a rule which tells the web server to only grant access to people who have the correct username / password.</li>
	</ol>
	<p>There are several tools online which will generate an entry to place in a <code class="language-markup">.htpasswd</code> file. For example, if I use <a href="http://www.htaccesstools.com/htpasswd-generator/" data-analytics=".htaccess generator">this tool</a> it will return something which looks like:</p>
	<pre><code class="language-markup">joelvardy:$apr1$iPG0JX.1$XfhtsOcdLImrYxF6xr9z./</code></pre>
	<p>Create a <code class="language-markup">.htpasswd</code> file on your system, it shouldn't be in a public directory, and it should be readable by your web server, for our example I will assume you have created it at <code class="language-markup">/var/www/.htpasswd</code> then add each of your users on a new line inside the file.</p>

	<h3>Apache</h3>
	<p>There are two methods of telling Apache to implement HTTP Basic Auth, the first, is adding some rules to your virtual host configuration. The second method is adding the rules to a .htaccess file inside the root of the website.</p>
	<p>The advantage of adding the rules to your virtual host, is that it is independent of your websites codebase. If you have to modify your .htaccess file to enable HTTP Basic Auth, then the file could easily get overwritten when pushing new code.</p>
	<p>The rules:</p>
	<pre><code class="language-markup">AuthUserFile /var/www/.htpasswd
AuthType Basic
AuthName "Protected Area"
Require valid-user</code></pre>
	<p>If defining this in your virtual host configuration, ensure the rules are included within a directory block, for example:</p>
	<pre><code class="language-markup">&lt;Directory /var/www/vhosts/DOMAIN/httpdocs&gt;
	# RULES HERE
&lt;/Directory&gt;</code></pre>

	<h3>Nginx</h3>
	<p>If you're using Nginx I expect you know how to do this / how to Google for a more succinct answer (such as the <a href="http://nginx.org/en/docs/http/ngx_http_auth_basic_module.html" data-analytics="Nginx documentation">official documentation</a>) but here it is for completeness:</p>
	<pre><code class="language-markup">location / {
	auth_basic "Protected Area";
	auth_basic_user_file /var/www/.htpasswd;
}</code></pre>

	<h3>Security</h3>
	<p>As is true with any login form on the web, unless you are using HTTPS the username and password will be sent in plain text. For securing a staging area however, I don't think this is a major issue.</p>

	<h3>Robots Exclusion Standard</h3>
	<p>If you are unable to protect the staging area as explained above, you should ensure you use the <a href="http://en.wikipedia.org/wiki/Robots_exclusion_standard" title="Robots exclusion standard on Wikipedia" data-analytics="robots.txt on Wikipedia">robots exclusion standard</a> to inform search engines that they should not index the website.</p>
	<p>The easiest way of doing this is placing a robots.txt file in the root of the domain, with the required rules.</p>

</div>
