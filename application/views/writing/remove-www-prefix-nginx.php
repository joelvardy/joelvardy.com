<div class="post">

    <h2>Remove WWW Prefix (nginx)</h2>
    <h4 class="date">Posted: <date>12th June 2014</date></h4>

    <p>Some people like domains to have a www. prefix, I don't I find it an unnecessary relic of the <em>old web</em>. It's also bad practice to be serving the same content over both www.domain.tld and domain.tld</p>
    <p>I'm going to show you how to write one rule which will redirect all www. prefixed domains to the plain domain. I am using nginx as my web server, I don't think this is as easy with Apache (however this is probably possible with a default vhost and some rewrites.)</p>

    <h3>New Virtual Host</h3>
    <p>The following will listen for all requests which start with www. and are not matched by other virtual hosts. It will then redirect them to the domain (including the URI) without the www. prefix.</p>
<pre><code class="language-markup">server {
    listen 80;
    listen 443 ssl;
    server_name ~^(www\.)?(?&lt;domain&gt;.+)$;
    return 301 $scheme://$domain$request_uri;
}</code></pre>
    <p><strong>Note:</strong> Nginx will give direct server name matches a higher priority than wildcard or regex matches.</p>

    <h3>Usage</h3>
    <p>Now simply point your www.domain.tld DNS records to your server domains, and the redirections will be run.</p>

</div>
