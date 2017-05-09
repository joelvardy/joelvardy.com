+++
date = "2013-09-27T00:00:00+00:00"
draft = false
title = "Permission Based Authentication Library"
+++

I can't count the number of authentication libraries I have written since I started building websites, often I would simply iterate on the previous library each time I wrote one.

Last year, while I was working on several CodeIgniter projects I wrote (and released) an authentication library. This served it's purpose however it did not have any permissions, and of course, was limited to being used within CodeIgniter projects. I needed an authentication library in a current project, so decided to write a new <a href="https://github.com/joelvardy/authentication" title="Open source repository" data-analytics="Authentication Library repo">authentication library</a> which I've released as a Composer package. In this post I'm going to explain how the permission control works.

### Previously
Most of my previous authentication libraries had rudimentary access controls, for example:
```php
if ($user->is_admin() || $user->is_mod() || $user->is_super_admin()) {
    // This user can moderate comments
}

if ($user_level == 1 || $user_level == 2 || $user_level == 0) {
    // This user can moderate comments
}
```
Both of these examples will soon result in code which is hard to maintain. It is also easy to accidentally grant permission to the wrong type of user.

### Much Better
Before I started writing the library I wrote the code below:
```php
if ($auth->permission('moderate-comments')) {
    // This user can moderate comments
}
```
As you can see this code is quiet succinct, the rule doesn't need changing if a new type of user is added, and it is self-descriptive.

### The Tables
Like most developers, as soon as I had written the three lines above, I was already thinking about the database schema. There are three tables, which are described below:

 * **permission** - this table holds each possible permission, in the example above this would be <code>moderate-comments</code>.
 * **group** - each user is assigned to a group, the groups are listed in this table, for example **admin**.
 * **group_permission** - This is the <a href="http://en.wikipedia.org/wiki/Junction_table" data-analytics="link table on Wikipedia">link table</a> between the group and the permissions which apply to that group.

### Database Connection
I have wanted to write a Composer authentication package ever since I **saw the light** (realised how amazing Composer was) - the problem, not everyone connects to their database in the same way. I thought long and hard about how to accommodate everyone.

In the end I decided to just make it work for me, and get a version out there, because I can always refactor the library so it uses the Doctrine DBAL at a later point.

### Links
You can view the authentication library <a href="https://github.com/joelvardy/authentication" title="Open source repository" data-analytics="Authentication Library repo">source code</a>, or view the library on <a href="https://packagist.org/packages/joelvardy/authentication" title="Authentication package" data-analytics="Authentication Library package">Packagist.org</a>.

In case you are interested here is a link to the <a href="https://github.com/joelvardy/Basic-CodeIgniter-Authentication" title="Open source repository" data-analytics="CodeIgniter Authentication repo">CodeIgniter authentication library</a> I wrote.
