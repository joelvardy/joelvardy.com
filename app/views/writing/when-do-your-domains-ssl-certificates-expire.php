<div class="post">

    <h2>When Do Your Domains & SSL Certificates Expire?</h2>
    <h4 class="date">Posted: <date>5th October 2015</date></h4>

    <p>Keeping track of when domains (and often forgotten about SSL certificates) expire can be a tiresome task. This post shows how I built a simple command line tool which checks the expiration date of of domains and SSL certificates.</p>

    <h3>Domain Expiry</h3>
    <p>I am using the <a href="https://github.com/koroban/WhoisParser" data-analytics="WhoisParser on GitHub">Novutec WhoisParser</a> library to get the domain expiration date parsed from the WHOIS data. I wrapped this in a library of my own to ensure it is formatted and cached as I want. Below is an excerpt from that library:</p>
    <pre><code class="language-php">$data = $this->parser->lookup($domain);

return (object) [
    'checked' => time(),
    'domain' => (object) [
        'created' => strtotime($data->created),
        'updated' => strtotime($data->changed),
        'expires' => strtotime($data->expires)
    ]
];</code></pre>

    <h3>SSL Expiry</h3>
    <p>I could not find a library which would check the expiration date of a ssl certificate, so I decided to roll my own, it does feel a little hacky, but it gets the job done.</p>
    <p>The first thing to do is download the certificate from the server, the only way I could find to do this was to use the <code class="language-bash">openssl</code> command directly, and save the output to a local file. How I did this is shown below:</p>
    <pre><code class="language-php">$certFilepath = $this->cacheDir . '/' . md5($domain) . '.crt';
`echo -n | openssl s_client -servername $domain -connect $domain:443 2>&1 | sed -ne '/-BEGIN CERTIFICATE-/,/-END CERTIFICATE-/p' > $certFilepath`;</code></pre>
    <p>You can then use the <code class="language-php">openssl_x509_parse</code> PHP function to get the data from the certificate:</p>
    <pre><code class="language-php">$data = openssl_x509_parse(file_get_contents($certFilepath));</code></pre>

    <h3>Using my Code</h3>
    <p>I've released a simple command line application which should be easy to modify to suit your needs, to get started follow the steps below:</p>
    <ol>
        <li><a href="https://github.com/joelvardy/expires" data-analytics="Expires project on GitHub">Download the code from GitHub</a></li>
        <li>Install dependencies by running <code class="language-bash">composer install</code></li>
        <li>Update the array of domains in the <code class="language-bash">./config.php</code> file</li>
        <li>Run the command to check the domains: <code class="language-bash">php -f ./check.php</code></li>
    </ol>

    <p>Depending on how many domains you have added you will have to wait for the tasks to complete (there is a rudimentary progress bar) - but you will hopefully see a table of your domains like the photo below:</p>

    <div class="photo">
        <img alt="Command line view of expired domains" src="/assets/img/writing/when-do-your-domains-ssl-certificates-expire/command-line-interface.jpg">
    </div>

    <p><strong>Note:</strong> The dates in yellow are within 1 month - and the dates in red are within 1 week of the current day.</p>
    <p>As explained on the <a href="https://github.com/joelvardy/expires#notes" data-analytics="Expires project on GitHub">GitHub repo</a> there are a few things to note regarding having OpenSSL installed.</p>

    <h3>Building Upon This</h3>
    <p>I have worked with companies which own hundreds of domains. The table above wouldn't work very well in that case, but there are several things you could do to improve upon this:</p>
    <ul>
        <li>Store domains in a database, and assign a user to email when the domain is nearing expiration.</li>
        <li>Integrate the statistics into a company dashboard.</li>
        <li>Use your domain registrars API to load the list of domains automatically.</li>
        <li>Generate a list of domains which have SSL certificates based on server configuration.</li>
    </ul>

</div>
