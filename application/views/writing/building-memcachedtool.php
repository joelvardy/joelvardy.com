<div class="post">

    <h2>Building Memcached Tool</h2>
    <h4>Posted: <date>24nd April 2015</date></h4>

    <p>Using in memory storage to cache data is very common, however the ability to delete keys is not easily possible from the command line. I would always end up restarting the memcached service, but this would of course delete all keys, which is not always desirable.</p>
    <p>So this post is going to overview how I built a simple command line application which allows you to view and delete memcached keys.</p>

    <h3>Composer Package</h3>
    <p>The only important thing to define in the <code>composer.json</code> is an array of files which should be treated as binaries, eg: <code class="language-json">"bin": ["memcachedtool"]</code> when you install the package globally these files will be available system wide.</p>

    <h3>Symfony Console</h3>
    <p>I decided to use the console component from Symfony, which is the de-facto library to help you create usable command line applications.</p>
    <p>The file <code>memcachedtool</code> which I listed as a binary looks like this:</p>
    <pre><code class="language-php">#!/usr/bin/env php
&lt;?php

$app = new Symfony\Component\Console\Application('memcachedtool', '1.0.0');

$app-&gt;add(new Joelvardy\Memcached\Console\Stats);
$app-&gt;add(new Joelvardy\Memcached\Console\Keys);
$app-&gt;add(new Joelvardy\Memcached\Console\Delete);

$app-&gt;run();</code></pre>
    <p>As you can see I defined the application and added several commands, which is described below:</p>

    <h3>Commands</h3>

    <p><strong>Stats</strong><br />By running <code class="language-markup">memcachedtool stats</code> it will show several stats regarding the memcached server.</p>

    <p><strong>Keys</strong><br />This command <code class="language-markup">memcachedtool keys</code> will list all keys on the memcached server.</p>
    <p>You can also specify a regular expression and only keys matching that expression will be listed, for example: <code class="language-markup">memcachetool keys --regex "/^jv_post_(.*)$/"</code></p>

    <p><strong>Delete</strong><br />There are several ways to delete keys from the memcached server:</p>
    <ul>
        <li><code class="language-markup">memcachedtool delete --all</code> Will delete all keys, effectively the same as restarting the server.</li>
        <li><code class="language-markup">memcachedtool delete --key jv_posts</code> Will delete a specific key.</li>
        <li><code class="language-markup">memcachedtool delete --regex "/^jv_post_(.*)$/"</code> Will delete all keys beginning with jv_post_</li>
    </ul>

    <h3>Selector</h3>
    <p>If you look at the code / the help commands you will see as well as passing a <code>--regex</code> attribute you can pass a <code>--selector</code> attribute, this means you can write the above regular expression as: <code class="language-markup">memcachetool keys --selector jv_post_*</code> which I think is much easier to use.</p>

    <h3>Installation / Source Code</h3>
    <p>If you want to have a look at the code it is <a href="https://github.com/joelvardy/memcachedtool" title="Open source repository" data-analytics="Memcached tool repo">available on GitHub</a>. You can install the tool globally by running:</p>
    <pre><code class="language-markup">composer global require joelvardy/memcachedtool</code></pre>

</div>
