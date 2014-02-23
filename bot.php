<?php
require __DIR__ . '/vendor/autoload.php';

use Philip\Philip as Philip,
    Philip\IRC\Response as Response,
    Philip\IRC\Request as Request,
    Philip\IRC\Event;

/**
 * Loads configuration of enviroment.
 */
$options = getopt('e:', array('env::'));

$environment = 'production';

foreach ($options as $opt => $value) switch ($opt) {
    case 'e': case 'env':
        $environment = $value;
    break;
}

$config = require_once __DIR__ . sprintf('/config.%s.php', $environment);

/**
 * Our bot!
 */
$bot = new Philip($config);

/**
 * Plugins
 */
$bot->loadPlugin(new \Osiux\PhilipPlugin\MediaInfo($bot));
$bot->loadPlugin(new \Osiux\PhilipPlugin\GoogleSearch($bot, $config['GoogleSearch']));
$bot->loadPlugin(new \Osiux\PhilipPlugin\Nutella($bot));
$bot->loadPlugin(new \Osiux\PhilipPlugin\YoutubeSearch($bot, $config['YoutubeSearch']));
$bot->loadPlugin(new \Philip\Plugin\AnsweringMachinePlugin($bot));
$bot->loadPlugin(new \Philip\Plugin\ImageMePlugin($bot));

/**
 * Joins a channel when invited if it's in the channel list
 */
$bot->onInvite(function($event) use ($bot, $config) {
    $channel = $event->getRequest()->getMessage();
    $user = $event->getRequest()->getSendingUser();

    if ( in_array($channel, $config['channels']) ) {
        $event->addResponse(Response::join($channel));
    } else {
        $event->addResponse(Response::msg($user, 'Channel not authorized.'));
    }
});

$bot->run();