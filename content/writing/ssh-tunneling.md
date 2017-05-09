+++
date = "2014-05-15T00:00:00+00:00"
draft = false
title = "SSH Tunneling"
+++

Tunneling your network traffic through an SSH connection can be useful if you want to encrypt all outbound traffic, get around a corporate firewall, or make connections from a white listed static IP address.

The way I had previously done this was to run a command in the terminal to open up a SOCKS proxy, then change the Google Chrome network settings to route all requests through the tunnel. However I am going to show you how I have SSH tunnels set up on my Mac.

### SSH Proxy
After trying several utilities which had terrible UIs, or lacking features, I found <a href="https://itunes.apple.com/gb/app/ssh-proxy/id597790822" title="SSH Proxy on the Mac app store" data-analytics="SSH Proxy App">SSH Proxy</a>. While it will set you back &pound;1.49 I think after you've seen how easy it makes opening SSH tunnels, you will agree that is a small price to pay!

Once you've installed the SSH Proxy utility, go to preferences and ensure 

**Listening port** is set to 7070
**Turn on proxy when started** checkbox is ticked.
**Launch when logged in** checkbox is ticked.

<img src="/images/writing/ssh-tunneling/ssh-proxy-preferences-general.jpg" width="500">

Then add a server under the **Servers** tab, simply setting the details to login to the server over SSH. You can then close the preferences window. Select **Turn proxy on** from the utility menu in the status bar.

<img src="/images/writing/ssh-tunneling/ssh-proxy-turn-on.jpg" width="300">

### System Level Proxy
The next step is to make the operating system (OSX) use the SOCKS proxy for all network connections, do do this navigate to: **System Preferences** > **Network** > **Advanced** > **Proxies** > **SOCKS Proxy**. Then set the host to 127.0.0.1 and the port to 7070, as shown below:

<img src="/images/writing/ssh-tunneling/osx-socks.jpg" width="500">

### Workflow
The SSH Proxy app has an option called **Direct internet connection (no proxy)** this is very useful because it means so long as the utility is running you can use no proxy, or route all network traffic through a proxy, without having to do anything but two clicks.

### /etc/hosts
When your traffic is being tunneled through a SSH tunnel your hosts file will not be used to resolve hostnames. If you are doing local development you will want to add exceptions to the network proxies preferences, see <a href="http://apple.stackexchange.com/a/95198" title="Read more at StackExchange" data-analytics="SSH tunneling  with local hosts on StackExchange">this answer on StackExchange</a>. If you have a better solution to this, please get in touch.
