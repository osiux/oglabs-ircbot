<?php
return array(
    'server'        =>  'irc.server.com',
    'port'          =>  6667,
    'ssl'           =>  false,
    'username'      =>  'User',
    'realname'      =>  'Real Name',
    'nick'          =>  'Nickname',
    'channels'      =>  array('#channel'),
    'unflood'       =>  500,
    'debug'         =>  true,
    'log'           =>  __DIR__ . '/bot.log',
    'GoogleSearch'  =>  array(
        'prefix'    =>  'mx',
    ),
    'YoutubeSearch' =>  array(
        'result_limit'  =>  3,
        'api_key'       =>  '<your api key>',
    ),
);