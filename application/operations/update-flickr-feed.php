<?php

// Include the initialisation file
require(realpath(dirname(__FILE__)).'/../../initialisation.php');

// Remove time limit
set_time_limit(0);

use Joelvardy\Flickr;

// Initialise classes
$flickr = new Flickr();

print("\n\n".'Update Flickr feed'."\n\n");

$flickr->updateSet('72157633145964383');