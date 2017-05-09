+++
date = "2015-10-05T00:00:00+00:00"
draft = false
title = "When Do Your Domains SSL Certificates Expire"
+++

Keeping track of when domains (and often forgotten about SSL certificates) expire can be a tiresome task. This post shows how I built a simple command line tool which checks the expiration date of of domains and SSL certificates.

### Domain Expiry
I am using the <a href="https://github.com/koroban/WhoisParser" data-analytics="WhoisParser on GitHub">Novutec WhoisParser</a> library to get the domain expiration date parsed from the WHOIS data. I wrapped this in a library of my own to ensure it is formatted and cached as I want. Below is an excerpt from that library:
```php
$data = $this->parser->lookup($domain);

return (object) [
    'checked' => time(),
    'domain' => (object) [
        'created' => strtotime($data->created),
        'updated' => strtotime($data->changed),
        'expires' => strtotime($data->expires)
    ]
];
```

### SSL Expiry
I could not find a library which would check the expiration date of a ssl certificate, so I decided to roll my own, it does feel a little hacky, but it gets the job done.

The first thing to do is download the certificate from the server, the only way I could find to do this was to use the <code class="language-bash">openssl</code> command directly, and save the output to a local file. How I did this is shown below:
```php
$certFilepath = $this->cacheDir . '/' . md5($domain) . '.crt';
`echo -n | openssl s_client -servername $domain -connect $domain:443 2>&1 | sed -ne '/-BEGIN CERTIFICATE-/,/-END CERTIFICATE-/p' > $certFilepath`;
```
You can then use the <code class="language-php">openssl_x509_parse</code> PHP function to get the data from the certificate:
```php
$data = openssl_x509_parse(file_get_contents($certFilepath));
```

### Using my Code
I've released a simple command line application which should be easy to modify to suit your needs, to get started follow the steps below:

 1. <a href="https://github.com/joelvardy/expires" data-analytics="Expires project on GitHub">Download the code from GitHub</a>
 2. Install dependencies by running <code class="language-bash">composer install</code>
 3. Update the array of domains in the <code class="language-bash">./config.php</code> file
 4. Run the command to check the domains: <code class="language-bash">php -f ./check.php</code>

Depending on how many domains you have added you will have to wait for the tasks to complete (there is a rudimentary progress bar) - but you will hopefully see a table of your domains like the photo below:

<img alt="Command line view of expired domains" src="/images/writing/when-do-your-domains-ssl-certificates-expire/command-line-interface.jpg">

**Note:** The dates in yellow are within 1 month - and the dates in red are within 1 week of the current day.

As explained on the <a href="https://github.com/joelvardy/expires#notes" data-analytics="Expires project on GitHub">GitHub repo</a> there are a few things to note regarding having OpenSSL installed.

### Building Upon This
I have worked with companies which own hundreds of domains. The table above wouldn't work very well in that case, but there are several things you could do to improve upon this:

 * Store domains in a database, and assign a user to email when the domain is nearing expiration.
 * Integrate the statistics into a company dashboard.
 * Use your domain registrars API to load the list of domains automatically.
 * Generate a list of domains which have SSL certificates based on server configuration.
