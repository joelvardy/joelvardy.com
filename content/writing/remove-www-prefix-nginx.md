+++
date = "2014-06-04T00:00:00+00:00"
draft = false
title = "Remove WWW Prefix Nginx"
+++

Some people like domains to have a www. prefix, I don't I find it an unnecessary relic of the *old web*. It's also bad practice to be serving the same content over both www.domain.tld and domain.tld

I'm going to show you how to write one rule which will redirect all www. prefixed domains to the plain domain. I am using nginx as my web server, I don't think this is as easy with Apache (however this is probably possible with a default vhost and some rewrites.)

### New Virtual Host
The following will listen for all requests which start with www. and are not matched by other virtual hosts. It will then redirect them to the domain (including the URI) without the www. prefix.
```markup
server {
    listen 80;
    listen 443 ssl;
    server_name ~^(www\.)?(?&lt;domain&gt;.+)$;
    return 301 $scheme://$domain$request_uri;
}
```
**Note:** Nginx will give direct server name matches a higher priority than wildcard or regex matches.

### Usage
Now simply point your www.domain.tld DNS records to your server domains, and the redirections will be run.
