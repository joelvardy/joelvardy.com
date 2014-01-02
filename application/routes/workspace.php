<?php

use Joelvardy\Template;

$routes->get('/workspace', function () {

	echo Template::build('workspace');

});
