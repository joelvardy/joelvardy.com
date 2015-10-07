<div class="post">

    <h2>Delete Specific Memcached Keys</h2>
    <h4 class="date">Posted: <date>24nd April 2015</date></h4>

    <p>Using in memory storage to cache data is very common, however the ability to delete keys is not easily possible from the command line. I would always end up restarting the memcached service, but this would of course delete all keys, which is not always desirable.</p>
    <p>I built a simple command line application which can be installed globally on a system using Composer, this post will outline how to use the tool.</p>

    <h3>Installation</h3>
    <p>To install the tool globally run:</p>
    <pre><code class="language-markup">composer global require joelvardy/memcachedtool</code></pre>
    <p>You will also need to ensure the Composer binary directory is included in your path, for example:</p>
    <pre><code class="language-markup">echo "PATH=\$PATH:\$HOME/.composer/vendor/bin" >> ~/.bashrc
source ~/.bashrc</code></pre>

    <h3>Commands</h3>

    <h4>Stats</h4>
    <p>You can view several stats regarding the memcached server by running:</p>
    <pre><code class="language-markup">memcachedtool stats</code></pre>

    <h4>View Keys</h4>
    <p>It is possible to show keys which are stored on the memcached server, for example:</p>
    <pre><code class="language-markup"># Show all keys
memcachedtool keys

# Show keys matching a regular expression
memcachetool keys --regex "/^jv_post_(.*)$/"</code></pre>

    <h4>Delete Keys</h4>
    <p>Deleting keys was why I built this tool, you can delete keys in three different ways:</p>
    <pre><code class="language-markup"># Delete all keys
memcachedtool delete --all

# Delete specific key
memcachedtool delete --key jv_posts

# Delete keys matching a regular expression
memcachetool delete --regex "/^jv_post_(.*)$/"</code></pre>

    <h3>Source Code</h3>
    <p>For more infomation, and to see how I built this tool please have a look at the code <a href="https://github.com/joelvardy/memcachedtool" title="Open source repository" data-analytics="Memcached tool repo">available on GitHub</a>.</p>

</div>
