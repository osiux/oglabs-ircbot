OGLabs IRC Bot
==============

So I was bored an talking with some friends on IRC when I thought on doing an IRC
bot with some simple commands to make our life easier. This is the result.

Thanks to [Philip](https://github.com/epochblue/philip) it was very easy to do
something quick.

To start, just clone the repository, run `composer install`, copy config.example.php
to config.production.php and run it with `php bot.php`

The enviroment can be configured to test locally by running `php bot.php --env=local`
and creating a config.local.php file.