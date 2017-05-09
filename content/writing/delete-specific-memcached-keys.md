+++
date = "2015-04-24T00:00:00+00:00"
draft = false
title = "Delete Specific Memcached Keys"
+++

Using in memory storage to cache data is very common, however the ability to delete keys is not easily possible from the command line. I would always end up restarting the memcached service, but this would of course delete all keys, which is not always desirable.

I built a simple command line application which can be installed globally on a system using Composer, this post will outline how to use the tool.

### Installation
To install the tool globally run:
```markup
composer global require joelvardy/memcachedtool
```
You will also need to ensure the Composer binary directory is included in your path, for example:
```markup
echo "PATH=\$PATH:\$HOME/.composer/vendor/bin" >> ~/.bashrc
source ~/.bashrc
```

### Commands

#### Stats
You can view several stats regarding the memcached server by running:
```markup
memcachedtool stats
```

#### View Keys
It is possible to show keys which are stored on the memcached server, for example:
```markup
# Show all keys
memcachedtool keys

# Show keys matching a regular expression
memcachetool keys --regex "/^jv_post_(.*)$/"
```

#### Delete Keys
Deleting keys was why I built this tool, you can delete keys in three different ways:
```markup
# Delete all keys
memcachedtool delete --all

# Delete specific key
memcachedtool delete --key jv_posts

# Delete keys matching a regular expression
memcachetool delete --regex "/^jv_post_(.*)$/"
```

### Source Code
For more information, and to see how I built this tool please have a look at the code <a href="https://github.com/joelvardy/memcachedtool" title="Open source repository" data-analytics="Memcached tool repo">available on GitHub</a>.
