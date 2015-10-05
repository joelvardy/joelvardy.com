<div class="post">

    <h2>When Do Your Domains & SSL Certificates Expire?</h2>
    <h4 class="date">Posted: <date>5th October 2015</date></h4>

    <p>Keeping track of when domains (and often forgotten about SSL certificates) expire can be a tiresome task, I wanted to simplify that!</p>
    <p>This is a project I've been playing with on-and-off for a few years. It started with me building a distributed uptime monitor (requests.mx) - after getting bored of that I decided to build a specific SaaS product (whendotheyexpire.com) however having built all of the VAT MOS and payment functionality (using Stripe) I decided to mothball that project also.</p>
    <p>Finally I decided to just release a simple command line program (in PHP) aimed at developers allowing them to check the expiration dates of a list of domains, no fancy interfaces or billing. This is what you can find by reading on..</p>

    <h3>Running a Check</h3>
    <p>Run through the stages below:</p>
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
